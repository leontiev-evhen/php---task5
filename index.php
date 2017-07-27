<?php
     require_once 'config.php'; 

    spl_autoload_register(function ($class_name) {
        require_once 'libs/'.$class_name . '.php';
    });

    try
    {
        $obj = new MySql();
        $obj->saveData('user11 - 2', 'testing');
    }
    catch (Exception $e)
    {
        echo $e->getMessage();
    }

    ?>
