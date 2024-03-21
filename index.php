<?php

require('app/app.php');


$view_bag = ['title' => 'Glossary List',
'heading' => 'Glossary'];


if (isset($_GET['search'])) {
    $items = Data::search_terms($_GET['search']);

    $view_bag['heading']= 'Search for '.$_GET['search'];
}
else
{
    $items = Data::get_terms();
}


view(
    name:'index',
    model:$items
);
//los argumentos nombrados solo son para darle claridad al codigo, da la ventaja de poder usar los parametros sin un posicionamiento fijo como se definio inicialmente y ademas te permite saltar parametros opcionales, o sea que ya vengan con un valor por defecto. Cuando se usa un argumento nombrado hay que nombrar el resto de los argumentos que utilicemos


