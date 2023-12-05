<?php

namespace controllers;

use Config\ConfigUtils;
use Http;
use Models\Stock;
use services\LivraisonServices;
use services\StockServices;

ConfigUtils::verifyToken();
class ControllerStock
{

    private $stockService = null;
    private $livraisonService = null;

    public function __construct()
    {
        $this->stockService = new StockServices();
        $this->livraisonService = new LivraisonServices();;
    }

    public function index()
    {
        $title = "Artistes";
        \Renderer::render("artiste/home", compact("title"));
    }

    public function entree()
    {
        $title = "Entrees";
        $findAllStocks = $this->stockService->findAllEntree();
        $marchandises = $this->stockService->findAllMarchandises();
        $fournisseurs = $this->stockService->findAllFournisseurs();
        $magasins = $this->stockService->findAllMagasins();
        $machandiseApprovissionner = $this->stockService->findMarchandiseApprovissionner();

        \Renderer::render("appro/home", compact("title", "findAllStocks", "fournisseurs", "marchandises", "magasins", "machandiseApprovissionner"));
    }

    public function create()
    {
        if ($this->stockService->saveEntree($_POST) == 1) {
            ConfigUtils::message("L'opération d'approvissionnement effectuée avec succès", "success");
            Http::redirect("stock&task=entree");
        } else {
            Http::redirect("stock&task=entree");
        }
    }



    public function createLivraison()
    {
        if (ConfigUtils::postMapping()) {
            if ($this->livraisonService->saveLivraison($_POST) == 1) {
                ConfigUtils::message("", "");
                Http::redirect("stock&task=entree");
            } else {
                ConfigUtils::message("L'opération n'a pas été éffectuée.", "warning");
                Http::redirect("stock&task=entree");
            }
        } else {
            ConfigUtils::message("L'opération n'a pas été éffectuée.", "info");
            Http::redirect("stock&task=entree");
        }
    }

    public function delete()
    {
        if (ConfigUtils::getMapping()) {
            $this->stockService->deleteApprovissionnement($_GET);
            Http::redirect("stock&task=entree");
        }
    }
}
