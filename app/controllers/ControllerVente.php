<?php

namespace controllers;

class ControllerVente
{
    public function index()
    {
        $title = "Ventes";
        \Renderer::render("vente/home", compact("title"));
    }

    public function vente()
    {
        $title = "Ventes";
        \Renderer::render("vente/list", compact("title"));
    }
}
