<?php

class Mysql {

    protected $serveur = '';
    protected $bdd = '';
    protected $login = '';
    protected $mdp = '';
    protected $PDO = '';

    public function __construct() {
        $this->serveur = 'localhost';
        $this->bdd = 'produits';
        $this->login = 'root';
        $this->mdp = 'root';

        try {
            $this->PDO = new PDO('mysql:host=' . $this->serveur . ';dbname=' . $this->bdd, $this->login, $this->mdp);
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage() . '<br />';
            echo 'N° : ' . $e->getCode();
        }
    }

// Fonction retournant l'objet PDO
    public function PDO() {
        return $this->PDO;
    }

    public function exec($S_req) {  //fonction à appeler lors d'INSERT UPDATE ou DELETE
        //echo $S_req;
        $req = $this->PDO->prepare($S_req);
        $req->execute();
        
        $iLastInsertId = $this->PDO->lastInsertId();
        
        if ($iLastInsertId == 0) {
            $iLastInsertId = false;
        }
        
        // renvoie le nombre d'enregistrement modifié
        return $iLastInsertId;
    }

}

?>
