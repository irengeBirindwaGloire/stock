<?php

spl_autoload_register(function ($className) {
    try {
        $className = str_replace("\\", "/", $className);
        require_once("app/" . $className . ".php");
    } catch (Exception $ex) {
        $_SESSION['message'] = $ex->getMessage();
    }
});
