<?php
class Panel extends Controller{
    public function __construct(){

    }
    public function index(){

    }
    public function patient(){
        if(!$_SESSION['loggedIn'] || $_SESSION['userType']!='patient'){
          notAuthorized();
        }else{
            // panel de patien
        }
      }
      public function medecin(){
        if(!$_SESSION['loggedIn'] || $_SESSION['userType']!='medecin'){
          notAuthorized();
        }else{
            // panel de medecin
        }
      }
      public function admin(){
        if(!$_SESSION['loggedIn'] || $_SESSION['userType']!='admin'){
          notAuthorized();
        }else{
            // panel de l'admin
        }
      }
}