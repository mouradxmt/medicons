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
    if($_SESSION['userType']=='patient' || $_SESSION['userType']=='medecin')
    $this->activeUser = $this->panelModel->getPorMById($user);
  }
  public function index()
  { 
  }
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
      if($_SESSION['userState']=='incomplet')
      $this->view('panels/initialForm', $data);
      else
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
        'medecin' => $this->activeUser,
        'services' => $this->panelModel->listeServices()
      ];
      if($_SESSION['userState']=='incomplet')
      $this->view('panels/initialForm', $data);
      else
      $this->view('panels/home', $data);
    }
  }
  public function admin($page='home')
  {
    if ($_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        // parametres utilisees pour les sous panneau
        'params' => $page,
      ];
    
      $this->view('panels/home', $data);
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
    if ($_SESSION['userType'] != 'medecin' && $_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consul' => $this->panelModel->medConsulterAll($filter, $etat),
        'medecin' => ($_SESSION['userType'] == 'medecin') ? $this->activeUser : null
      ];

      $this->view('panels/consultation', $data);
    }
  }
  public function editCons($id)
  {
    if ($_SESSION['userType'] != 'medecin' && $_SESSION['userType'] != 'admin' ) {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consultation' => $this->panelModel->medConsulter($id),
        'medecin' => ($_SESSION['userType'] == 'medecin') ? $this->activeUser : null,
        'id' => $id
      ];
      $this->view('panels/editCons', $data);
    }
  }
  public function deleteCons($id)
  {
    if ($_SESSION['userType'] != 'medecin' && $_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consultation' => $this->panelModel->medConsulter($id),
        'medecin' => ($_SESSION['userType'] == 'medecin') ? $this->activeUser : null,
        'id' => $id
      ];
      if($_SESSION['userType'] == 'admin' || (($_SESSION['userType'] == 'medecin') ? ($data['consultation']->codeMedecin == $data['medecin']->codeMedecin):false )) {
        if ($this->panelModel->deleteCons($id)) {
          flash('EtatPostEditCons', "Suppression réussie!", 'alert alert-success');
        }
      }
        flash('EtatPostEditCons', "Autorisation refusée", 'alert alert-danger');
    }
    echo flash('EtatPostEditCons');
  }
  public function editConsAction($id)
  {

    if ($_SESSION['userType'] != 'medecin' && $_SESSION['userType'] != 'admin') {
      notAuthorized();
    } else {
      $data = [
        // resultats de consultation
        'consultation' => $this->panelModel->medConsulter($id),
        'medecin' => ($_SESSION['userType'] == 'medecin') ? $this->activeUser : null,
        'id' => $id
      ];
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['etatConsultation']) && !empty($_POST['dateConsultation']) && isset($_POST['journalClinique']) && ($data['medecin']->codeMedecin == $data['consultation']->codeMedecin || $_SESSION['userType'] == 'admin')) {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $newData = [
            'numeroConsutlation' => $id,
            'etatConsultation' => trim($_POST['etatConsultation']),
            'dateConsultation' => trim($_POST['dateConsultation']),
            'journalClinique' => trim($_POST['journalClinique'])
          ];
          if ($this->panelModel->updateConsultation($newData)) {
            flash('EtatPostEditCons', "Modification effectuée!", 'alert alert-success');
          } else {
            flash('EtatPostEditCons', "oops! erreur inattendue!", 'alert alert-danger');
          }
          redirect('panels/'.$_SESSION['userType']);
        } else {
          flash('EtatPostEditCons', "Autorisation refusée", 'alert alert-danger');
          redirect('panels/'.$_SESSION['userType']);
        }
      } else {
        flash('EtatPostEditCons', "Veuiller remplir tous les champs requis!", 'alert alert-danger');
        redirect('panels/'.$_SESSION['userType']);
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
        if (!empty($_POST['dateConsultation']) && isset($_POST['codeMedecin'])) {
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          $data = [
            'IP' => $id,
            'codeMedecin' => $_POST['codeMedecin'],
            'dateConsultation' => $_POST['dateConsultation']
          ];
          if ($this->panelModel->askConsult($data)) {
            flash('EtatPostEditCons', "Votre rendez-vous a été crée avec succés!", 'alert alert-success');
          } else {
            flash('EtatPostEditCons', "oops! erreur inattendue!", 'alert alert-danger');
          }
        } else {
          flash('EtatPostEditCons', "Veuiller remplir tous les champs requis!", 'alert alert-danger');
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
  public function createProfile(){
    if(isLoggedIn() && $_SESSION['userState']=='incomplet' ){
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data=[
          'nom' => $_POST['nom'],
          'prenom' => $_POST['prenom'],
          'dateNaissance' => $_POST['dateNaissance'],
          'sexe' => $_POST['sexe'],
          'adresse' => $_POST['adresse']
        ];
        if($_SESSION['userType']=='medecin'){
          $med=[
            'codeService' => $_POST['codeService']
          ];
          $data=array_merge($data,$med);
        }
        if(!$this->panelModel->createProfile($data)){
          flash('ErrorProfileCreate','Erreur de création du profile!','alert alert-danger');
        }
    }else {
      flash('ErrorProfileCreate','Erreur de création du profile!','alert alert-danger');
    }
    redirect('panels/'.$_SESSION['userType']);
  }
}