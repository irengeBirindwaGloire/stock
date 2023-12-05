<?php

namespace controllers;

use Config\ConfigUtils;
use Http;
use Models\Home;
use Renderer;

class ControllerHome
{

    protected $modelName;

    public function __construct()
    {
        $this->modelName = new Home;
    }

    public function index()
    {
        $title = "Home";
        \Renderer::render("home/login", compact('title'));
    }

    public function login()
    {
        // var_dump($_SERVER);die;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            extract(($_POST));
            if ($this->modelName->findUserByNameAndPassword($userName, $motdepasse) == true) {
                switch ($_SESSION['role']) {
                    case 'admin':
                        Http::redirect("Admin");
                        break;
                    case 'comptable':
                        Http::redirect("Comptable");
                        break;
                    case 'gestionnaire':
                        Http::redirect("Gestionnaire");
                        break;
                    default:
                        Http::redirect("home");
                        break;
                }
            } else {
                ConfigUtils::message("Echec d'authentification", "warning");
                $this->index();
                echo password_hash("gloire", PASSWORD_DEFAULT);
            }
        } else {
            http::redirect("home");
        }
    }

    public function logout()
    {
    }
}
