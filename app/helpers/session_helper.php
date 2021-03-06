<?php
session_start();
// Flash message helper
// example - flash('register_success', 'you are now registred');
// display in view - echo flash(...)
function flash($name='', $message='',$class='alert alert-success'){
    if(!empty($name)){
        if(!empty($message) && empty($_SESSION[$name])){
        if(!empty($_SESSION[$name]))
            unset($_SESSION[$name]);
        if(!empty($_SESSION[$name. '_class']))
            unset($_SESSION[$name. '_class']);
            $_SESSION[$name]=$message;
            $_SESSION[$name. '_class']=$class;
        }elseif(empty($message) && !empty($_SESSION[$name])){
            $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name. '_class']);
        }
    }
}
function startUserSession($user){
    $_SESSION['userType']=$user->type;
    $_SESSION['userId']=$user->id;
    $_SESSION['userMail']=$user->email;
    $_SESSION['userState']=$user->state;
    redirect('panels/'.$user->type);
}
function endUserSession(){
    unset($_SESSION['userType']);
    unset($_SESSION['userId']);
    unset($_SESSION['userMail']);
    unset($_SESSION['userState']);
    session_destroy();
    redirect('pages/index');
}
function isLoggedIn(){
    return (isset($_SESSION['userId']));
}