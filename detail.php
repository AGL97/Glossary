<?php

require('./app/app.php');


if (!isset($_GET['term'])) {
    redirect('index.php');
}


//Se declara term y view bag al principio pq si no se pueden obtener los datos del json significa que la solicitud GET que se esta haciendo no es valida por tanto no se puede mandar nada desde el modelo a la vista ya que en la vista se espera un elemento perteneciente a una matriz asociativa que se llena luego de que se obtienen los datos exitosamente.

$data = Data::get_term($_GET['term']);
//TODO:validate input

if ($data==false) {
    view('not_found');
    die();
}

$term = $data->term;

$view_bag['title'] = 'Details for '.$term;


view('detail',$data);



