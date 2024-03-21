<?php

function redirect($url)
{
    header('Location: '.$url );
    die();
}

function view($name,$model='')
{
    global $view_bag;
    require APP_PATH . "views/layout.view.php";
};

function is_post()
{
    return  
    $_SERVER['REQUEST_METHOD'] ==='POST';
};

function is_get()
{
    return  
    $_SERVER['REQUEST_METHOD'] ==='GET';
};

function sanitize($value)
{
    $temp = filter_var(trim($value),513);//COMO FILTER_SANITIZE_STRING esta deprecated en la version 8.1 puse el valor de la constante que es 513 hasta encontrar mejor solucion
    

    if($temp===false)
    {
        return '';
    }
    else
    {
        return $temp;
    }        
}

function authenticate_user($email, $password) {
    $users = CONFIG['users'];

    if(!isset($users[$email])) {
        return false;
    }
    else{
        $user_password = $users[$email];
    }
    return $password == $user_password;
}

function is_user_authenticated()
{
    return isset($_SESSION['email']);
}

function ensure_user_is_authenticated() {
    if (!(is_user_authenticated())) {
        redirect('../login.php');
        die();
    }
}