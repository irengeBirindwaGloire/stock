<?php

namespace services;

use Config\ValidationEntreer;
use PDOException;
use repository\StockRepository;

class StockServices extends StockRepository
{
    private $result = null;
    private $query = null;

    public function findAllEntree()
    {
        try {
            $this->query = $this->getPdo()->prepare("SELECT * FROM findAllEnter order by codeMarchandise desc");
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (PDOException $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }

    public function findAllMarchandises()
    {
        $this->query = $this->getPdo()->prepare("SELECT * FROM marchandises");
        $this->query->execute();
        return $this->query->fetchAll();
    }

    public function findMarchandiseApprovissionner()
    {
        try {
            $this->query = $this->getPdo()->prepare("SELECT * FROM findMarchandiseApprovissionner");
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (PDOException $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }

    public function findAllFournisseurs()
    {
        try {
            $this->query = $this->getPdo()->prepare("SELECT * FROM fournisseurs");
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (PDOException $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }

    public function findAllMagasins()
    {
        try {
            $this->query = $this->getPdo()->prepare("SELECT * FROM magasins");
            $this->query->execute();
            return $this->query->fetchAll();
        } catch (PDOException $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }

    /**
     * 
     *
     * @param [type] $data
     * @return integer
     */
    public function saveEntree($data): int
    {
        try {
            extract($data);
            $erreurs = ValidationEntreer::validate($data);
            if ($erreurs != null) {
                $_SESSION['messageList'] = $erreurs;
                return 0;
            } else {
                $this->query = $this->getPdo()->prepare("INSERT INTO approvissionner(codeFourn,codeMarch,quantite,prixUnitaire,devise,typeOperation)VALUES(:codeFourn,:codeMarch,:quantite,:prixUnitaire,:devise,:typeOperation)");
                $this->query->bindValue(":codeFourn", $fournisseur);
                $this->query->bindValue(":codeMarch", $marchandise);
                $this->query->bindValue(":quantite", $quantite);
                $this->query->bindValue(":prixUnitaire", $prixUnitaire);
                $this->query->bindValue(":devise", $devise);
                $this->query->bindValue(":typeOperation", "entree");
                return $this->query->execute();
            }
        } catch (PDOException $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }

    public function deleteApprovissionnement($code): int
    {
        try {
            $this->query = $this->getPdo()->prepare("DELETE FROM livraison WHERE codeMarchandise=:codeMarchandise");
            $this->query->bindValue(":codeMarchandise", $code);
            return $this->query->execute();
        } catch (\Throwable $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }
}
