<?php
class Panels extends Controller{
    public function __construct(){
      if(!isLoggedIn())
      notAuthorized();
        $this->panelModel=$this->model('Panel');
    }
    public function index(){

    }
    public function patient(){
        if($_SESSION['userType']!='patient'){
          notAuthorized();
        }else{
            // panel de patien
        }
      }
      public function medecin($page='home'){
        if($_SESSION['userType']!='medecin'){
          notAuthorized();
        }else{
          // panel de medecin
        $data=[
          // parametres utilisees pour les sous panneau
          'params' => $page,
          // resultats de consultation
          'consul' => $this->panelModel->medConsulterAll('only','Attente')
        ];
         
            $this->view('panels/consultation',$data);
        }
      }
      public function admin(){
        if($_SESSION['userType']!='admin'){
          notAuthorized();
        }else{
            // panel de l'admin
        }
      }
}