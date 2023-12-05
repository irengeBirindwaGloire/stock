<?php

namespace controllers;

use Config\ConfigUtils;
use Http;
use Renderer;
use services\LivraisonServices;

ConfigUtils::verifyToken();
class ControllerLivraison
{
    private $livraisonService = null;

    public function __construct()
    {
        $this->livraisonService = new LivraisonServices();
    }

    public function index()
    {
        $title = "Livraison";
        $magasins = $this->livraisonService->findAllMagasins();
        $machandiseApprovissionner = $this->livraisonService->findAllMarchandise();
        $machandiseAppr = $this->livraisonService->findAllApprovissionnement();
        Renderer::render("livraison/list", compact("title", "machandiseApprovissionner", "magasins", "machandiseAppr"));
    }

    public function create()
    {
        if (ConfigUtils::postMapping()) {
            $this->livraisonService->saveLivraison($_POST);
            Http::redirect("livraison");
        } else {
            Http::redirect("livraison");
        }
    }
}
