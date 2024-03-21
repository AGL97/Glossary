<?php
session_start();
require '../app/app.php';
ensure_user_is_authenticated();

if (is_get()) {
    $key = sanitize($_GET['key']);
    if(empty($key)) 
    {
        view('not_found');
        die();
    }

    $term = Data::get_term($key);
    if($term===false)
    {
        view('not_found');
        die();
    }

    view('admin/edit',$term);
}


if (is_post()) {
    if (isset($_POST['sendTerm'])) {
        $term = sanitize($_POST['term']);
        $definition = sanitize($_POST['definition']);
        $original_term = sanitize($_POST['original-term']);

        if (empty($term)||empty($definition)||empty($original_term)){
           //TODO: display message
           echo"Muestra vacia";
        }
        else
        {
            Data::update_terms($original_term,$term,$definition);
            redirect('index.php');
        }

    }
}



