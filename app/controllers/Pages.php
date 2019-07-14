<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'TraversyMVC',
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }
    public function error(){
      $data = [
        'message' => 'Vous n\'êtes pas autorisés d\'acceder à cette page. Veuillez s\'authentifier'
      ];

      $this->view('pages/error', $data);
    }
    
  }