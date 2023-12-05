<?php

namespace controllers;

use Renderer;
use Config\ConfigUtils;

ConfigUtils::verifyToken();
class ControllerGestionnaire
{

    public function index()
    {
        $title = "Gestionnaire";
        Renderer::render("gestionnaire/home", compact("title"));
    }
}
