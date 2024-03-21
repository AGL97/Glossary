<?php
session_start();
require('app/app.php');



$view_bag = ['title' => 'Glossary List',
'heading' => 'Glossary'];

  
  // if (isset($_POST['email'])) {
  // $email = $_POST['email'];
  // outuput($_POST);
  // SI SE TIENEN MUCHOS FORMULARIOS SE TIENE HACER DE ESTA MANERA
  // }

  if(is_user_authenticated())
  {
    redirect('admin/');
  }

  if (is_post()) {
     $email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);

    $password = sanitize($_POST['password']);//

    //compare whith database
    if (authenticate_user($email, $password)) {
      $_SESSION['email'] = $email;
      redirect('admin/');
      die();
    }
    else
    {
      $view_bag['status'] = "The provided credentials didn't not work";
    }
    
     if ($email==false) {
      $view_bag['status'] =  'Please enter a valid email';
    //  }
    //  SI SE TIENE UN SOLO FORMULARIO SE PUEDE HACER DE ESTA
  }
}

view('login');

 