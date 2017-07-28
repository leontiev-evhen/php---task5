<?php
    session_start();
    require_once 'config.php'; 

    spl_autoload_register(function ($class_name) {
        require_once 'libs/'.$class_name . '.php';
    });

    try
    {
        $obj = new Cookie();
        $obj->saveData('myCookie', 'Create cookie');
        $cookie = $obj->getData('myCookie');

        $obj = new Cookie();
        $obj->saveData('mySessison', 'Create session');
        $session = $obj->getData('mySessison');

        $obj = new MySql();
        $obj->saveData('user11', 'test mysql');
        $mysql = $obj->getData('user11');

        $obj = new PostgreSql();
        $obj->saveData('user11', 'test postgresql');
        $postgresql = $obj->getData('user11');

    }
    catch (Exception $e)
    {
        $error =  $e->getMessage();
    }

    require_once 'templates/index.php';

?>
