<?php

    define('APP_PATH',dirname(__FILE__).'/../');
    
    global $view_bag;

    $view_bag = [
        'title'=> '',
        'heading'=> '',
    ];

    require 'config.php';
    require 'functions.php';    
    require 'data/data.class.php';

    require 'data/filedataprovider.class.php';
    require 'data/mysqldataprovider.class.php';
    //Data es una clase estatica que nos permite acceder a la clase file data provider sin tener una instancia fisica en ninguna parte del documento tambien se le conoce como capa de abstraccion
    Data::initialize(new MysqlDataProvider(CONFIG['db']));
 

    