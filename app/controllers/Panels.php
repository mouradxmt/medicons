<?php
class Panels extends Controller
{
  public function __construct()
  {
    if (!isLoggedIn())
      notAuthorized();
    $user = [
      'id'    =>  $_SESSION['userId'],
      'type'  =>  $_SESSION['userType'],
      'email' => $_SESSION['userMail'],
      'state' => $_SESSION['userState']
    ];
    $this->panelModel = $this->model('Panel');
    $this->activeUser = $this->panelModel->getPorMById($user);
  }
  public function index()
  { }
  public function patient($page="home")
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        // parametres utilisees pour les sous panneau
        'params' => $page,
        'patient' => $this->activeUser
      ];

      $this->view('panels/home', $data);
    }
  }
  public function medecin($page = 'home')
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        // parametres utilisees pour les sous panneau
        'params' => $page,
        'medecin' => $this->activeUser
      ];

      $this->view('panels/home', $data);
    }
  }
  public function admin()
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      // panel de l'admin
    }
  }
  public function profile()
  {
    if ($_SESSION['userType'] != 'medecin' && $_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $activeUser = $this->activeUser;
      $this->view('panels/profile', $activeUser);
    }
  }
  public function consultations($filter = "only", $etat = "")
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consul' => $this->panelModel->medConsulterAll($filter, $etat),
        'medecin' => $this->activeUser
      ];

      $this->view('panels/consultation', $data);
    }
  }
  public function editCons($id)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consultation' => $this->panelModel->medConsulter($id),
        'medecin' => $this->activeUser,
        'id' => $id
      ];
      $this->view('panels/editCons', $data);
    }
  }
  public function deleteCons($id)
  {
    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consultation' => $this->panelModel->medConsulter($id),
        'medecin' => $this->activeUser,
        'id' => $id
      ];
      if ($data['consultation']->codeMedecin == $data['medecin']->codeMedecin) {
        if ($this->panelModel->deleteCons($id)) {
          flash('EtatPostEditCons', "La consultation a été supprimé avec succes!", 'alert alert-success');
        }
      }
        flash('EtatPostEditCons', "Vous n'avez pas le droit de supprimer une consultation d'autre medecin", 'alert alert-danger');
    }
    echo flash('EtatPostEditCons');
  }
  public function editConsAction($id)
  {

    if ($_SESSION['userType'] != 'medecin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consultation' => $this->panelModel->medConsulter($id),
        'medecin' => $this->activeUser,
        'id' => $id
      ];
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['etatConsultation']) && isset($_POST['dateConsultation']) && isset($_POST['journalClinique']) && $data['medecin']->codeMedecin == $data['consultation']->codeMedecin) {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $newData = [
            'numeroConsutlation' => $id,
            'etatConsultation' => trim($_POST['etatConsultation']),
            'dateConsultation' => trim($_POST['dateConsultation']),
            'journalClinique' => trim($_POST['journalClinique'])
          ];
          if ($this->panelModel->updateConsultation($newData)) {
            flash('EtatPostEditCons', "La consultation a été modifié avec succes!", 'alert alert-success');
          } else {
            flash('EtatPostEditCons', "Quelque chose qui ne va pas correctement!", 'alert alert-danger');
          }
          redirect('panels/medecin');
        } else {
          flash('EtatPostEditCons', "Vous n'avez pas le droit de modifier une consultation d'autre medecin", 'alert alert-danger');
          redirect('panels/medecin');
        }
      } else {
        flash('EtatPostEditCons', "Veuiller entrer tous les valeurs correctement", 'alert alert-danger');
        redirect('panels/medecin');
      }
    }
  }
  public function askConsult()
  {
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'patient' => $this->activeUser,
        'userId' => $_SESSION['userId'],
        'medecins' => $this->panelModel->listeMedecins()
      ];
    $this->view('panels/askConsult',$data);
    }
  }
  public function askConsultAction($id){
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['dateConsultation']) && isset($_POST['codeMedecin'])) {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'IP' => $id,
            'codeMedecin' => $_POST['codeMedecin'],
            'dateConsultation' => $_POST['dateConsultation']
          ];
          if ($this->panelModel->askConsult($data)) {
            flash('EtatPostEditCons', "La consultation a été crée avec succes!", 'alert alert-success');
          } else {
            flash('EtatPostEditCons', "Quelque chose qui ne va pas correctement!", 'alert alert-danger');
          }
        } else {
          flash('EtatPostEditCons', "Veuillez entrer tout les valeurs correctement!", 'alert alert-danger');
        }
      }
    }
    redirect('panels/patient');
  }
  public function mesConsultations($etat=''){
    if ($_SESSION['userType'] != 'patient') {
      notAuthorized();
    } else {
      $data = [
        'consul' => $this->panelModel->mesConsultations($etat),
        'patient' => $this->activeUser
      ];
      $this->view('panels/mesConsultations', $data);
    }

  }
}