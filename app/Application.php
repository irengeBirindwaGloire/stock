<?php

use Config\ConfigUtils;

session_start();

class Application
{
    public static function run()
    {
        $controllerName = "home";
        $task = "index";

        try {
            if (!empty($_GET['controller'])) {
                $controllerName = ucfirst($_GET['controller']);
            }
            if (!empty($_GET['task'])) {
                $task = $_GET['task'];
            }
            $controllerName = "controllers\\Controller" . $controllerName;
            $controller = new $controllerName();
            $controller->$task();
        } catch (Exception $ex) {
            $_SESSION['message'] = $ex->getMessage();
        }
    }
}
