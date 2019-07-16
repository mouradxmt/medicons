<?php 
class Users extends Controller{
    public function __construct(){
            $this->userModel = $this->model('User');
    }
    public function index(){
        $this->login();
    }
    
    public function register(){
        if(isLoggedIn()){
        notAuthorized();
        }else{
        // check for posts
        if($_SERVER['REQUEST_METHOD']=='POST'){
            // sanitizing the inputs (to avoid sql injection)
        $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

        // init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_pass' => trim($_POST['confirm_pass']),
                'type' => trim($_POST['type']),
                'email_err' => '',
                'password_err' => '',
                'confirm_pass_err' => '',
                'type_err' => ''
            ];
            if(empty($data['email'])){ // checking email in server side
                $data['email_err'] = 'Veuillez entrer votre adresse e-mail.';
            }else{
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email deja enregistré, veuillez vous connecter';
                }
            }
            if(!($data['type']=='medecin' || $data['type']=='patient')){
                $data['type_err'] = 'Veuiller confirmer si vous êtes patient ou médecin.';
            }
            if(empty($data['password'])){
                $data['password_err'] = 'Veuillez entrer votre mot de passe.';
            }elseif(strlen($data['password'])<6){
                $data['password_err'] .= 'Votre mot de passe doit être au moins 6 caracteres';
            }
            if(empty($data['confirm_pass'])){
                $data['confirm_pass_err'] = 'Veuillez entrer la confirmation de votre mot de passe.';
            }else{
                if($data['password']!=$data['confirm_pass'])
                $data['confirm_pass_err'] = 'Mot de passe et confirmer le mot de passe ne correspond pas';
            }

            if(empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_pass_err']) && empty($data['type_err'])){
                // hashing the password for security
                $data['password']=password_hash($data['password'],PASSWORD_DEFAULT);
                // register user
                if($this->userModel->register($data)){
                    flash('register_success','Vous êtes bien inscrit, Veuillez vous s\'authentifier');
                    redirect('users/login');
                }else{
                    die('Quelque chose qui ne va pas bien!');
                }
                // TODO: if medecin : formulaire medecin, if patient formulaire patient
                
            
            }else{
                
            $this->view('users/register',$data);
            }
        }else{
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'confirm_pass' => '',
                'type' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_pass_err' => '',
                'type_err' => ''
            ];
            
            // load form
            $this->view('users/register',$data);
        }
    }
    }
    public function login(){
        if(isLoggedIn())
        notAuthorized();
        else{
            if($_SERVER['REQUEST_METHOD']=='POST'){
                // sanitizing the inputs (to avoid sql injection)
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
            // init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];
                if(empty($data['email'])){ // checking email in server side
                    $data['email_err'] = 'Veuillez entrer votre adresse e-mail.';
                }elseif(!($this->userModel->findUserByEmail($data['email']))){
                    // if the email exists does not exist
                    $data['email_err'] = 'Cet adresse e-mail est introuvable.';
                }
                if(empty($data['password'])){
                    $data['password_err'] = 'Veuillez entrer votre mot de passe.';
                }
                if(empty($data['email_err']) && empty($data['password_err']) ){
                    // if no error
                  $loggedIn=$this->userModel->login($data['email'],$data['password']); // returns the row of the user if the password matches, else return false
                    if($loggedIn){
                        // if the email and the password matchs the row in DB
                       startUserSession($loggedIn);
                    }
                }else{  
                    $this->view('users/login',$data);
                }}else{
                    $data = [
                        'email' => '',
                        'password' => '',
                        'email_err' => '',
                        'password_err' => ''
                    ];
                $this->view('users/login',$data);
    }
    }}
public function logout(){
    endUserSession();
}

}