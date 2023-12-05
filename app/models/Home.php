<?php

namespace Models;

use Config\ConfigUtils;
use Exception;
use PSpell\Config;

class Home extends Model
{
    protected $table = "Eleves";
    private $query = null;
    private $resultats = null;

    public function findUserByNameAndPassword(string $email, $password): bool
    {
        try {
            $this->query = $this->pdo->prepare("SELECT * from users where emailUser=? OR nomUser=?");
            $this->query->execute([$email, $email]);
            $this->resultats = $this->query->fetch();

            if ($this->resultats && password_verify($password, $this->resultats->motdepasse)) {
                $_SESSION['authenticated'] = ConfigUtils::token_crf() . $this->resultats->codeUser;
                $_SESSION['role'] =  $this->resultats->rolesUser;
                return true;
            } else {
                return false;
            }
        } catch (Exception $exception) {
            $_SESSION['message'] = $exception->getMessage();
        }
    }


    public function countClass()
    {
        return $this->countData("SELECT * FROM classes");
    }
}
