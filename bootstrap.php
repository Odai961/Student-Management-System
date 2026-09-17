<?php

use Core\App;
use Core\Database;

$container= new Core\Container();

$container->bind(Core\Database::class,function (){
    $config= require base_path('config.php');

    return new Database($config['database'],'root','12345');
});

App::setContainer($container);