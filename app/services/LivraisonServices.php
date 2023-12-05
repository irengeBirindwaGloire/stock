<?php

namespace services;

use Config\ValidationLivraison;
use PDOException;
use repository\LivraisonRepository;

class LivraisonServices extends LivraisonRepository
{
    private $query = null;

    public function findAllMagasins()
    {
        return $this->findByQuery("magasins");
    }

    public function findAllMarchandise()
    {
        return $this->findByQuery("approvissionnement");
    }

    public function findAllApprovissionnement()
    {
        return $this->findByQuery("findmarchandiseapprovissionner");
    }

    public function saveLivraison($data): int
    {
        try {
            extract($data);
            $erreurs = ValidationLivraison::validate($data);
            if ($erreurs != null) {
                $_SESSION['messageList'] = $erreurs;
                return 0;
            } else {
                $this->query = $this->pdo->prepare("INSERT INTO livraison(codeMagasin,codeMarchandise,quantite,prixUnitaire,devise)VALUES(:codeMagasin,:codeMarchandise,:quantite,:prixUnitaire,:devise)");
                $this->query->bindValue(":codeMagasin", $magasin);
                $this->query->bindValue(":codeMarchandise", $marchand);
                $this->query->bindValue(":quantite", $quantite);
                $this->query->bindValue(":prixUnitaire", $prixUnitaire);
                $this->query->bindValue(":devise", $devise);
                return $this->query->execute();
            }
        } catch (PDOException $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
        return 0;
    }
}
