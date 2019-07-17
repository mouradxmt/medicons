<?php
class Panels extends Controller{
    public function __construct(){
      if(!isLoggedIn())
      notAuthorized();
      $user=[
        'id'    =>  $_SESSION['userId'],
        'type'  =>  $_SESSION['userType'],
         ];
        $this->panelModel=$this->model('Panel');
        $this->activeUser=$this->panelModel->getPorMById($user);
    }
    public function index(){

    }
    public function patient(){
        if($_SESSION['userType']!='patient'){
          notAuthorized();
        }else{

          
            // panel de patient
            


        }
      }
      public function medecin($page='home'){
        if($_SESSION['userType']!='medecin'){
          notAuthorized();
        }else{
          // panel de medecin
           $user=[
            'id'    =>  $_SESSION['userId'],
            'type'  =>  'medecin'
        ];
        $Medecin=$this->panelModel->getPorMById($user);
        $data=[
          // parametres utilisees pour les sous panneau
          'params' => $page,
          'medecin' => $Medecin
        ];
         
            $this->view('panels/home',$data);
        }
      }
      public function admin(){
        if($_SESSION['userType']!='admin'){
          notAuthorized();
        }else{
            // panel de l'admin
        }
      }
      public function consultations($filter="only"){
        if($_SESSION['userType']!='medecin'){
          notAuthorized();
        }else{
          // panel de medecin
           $user=[
            'id'    =>  $_SESSION['userId'],
            'type'  =>  'medecin'
        ];
        $Medecin=$this->panelModel->getPorMById($user);
        $data=[
          // resultats de consultation
          'consul' => $this->panelModel->medConsulterAll($filter,'Attente'),
          'medecin' => $Medecin
        ];
         
            $this->view('panels/consultation',$data);
        }
      }

      
}