<?php

namespace controllers;

use Config\ConfigUtils;
use Renderer;

ConfigUtils::verifyToken();

class ControllerAdmin
{

    public function index()
    {
        $title = "Admin";
        // $magasins = $this->stockService->findAllMagasins();
        // $machandiseApprovissionner = $this->stockService->findMarchandiseApprovissionner();

        Renderer::render("home/home", compact("title"));
    }
}
