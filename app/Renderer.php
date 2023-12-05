<?php

class Renderer
{
    private $container;

    public static function render(string $path, array $variables = [])
    {
        extract($variables);
        ob_start();
        try {
            $file = "views/" . $path . '.html.php';
            require_once($file);
        } catch (Exception $ex) {
            $_SESSION["message"] = ($ex->getMessage());
        }

        $container = ob_get_clean();
        require_once("views/layout.html.php");
    }
}
