<?php

class UserDAO extends Mysql {

    public function __construct() {
        parent::__construct();
    }
    
    public function hydrate($ligne) {
        return new User($ligne->ID_USER, $ligne->MDP, $ligne->NOM, $ligne->PRENOM, $ligne->MAIL, $ligne->DATE_NAISS, $ligne->NIVEAU);
    }
    
    public function get_user_by_mail($mail) {
        $S_req = "SELECT * FROM USERS WHERE mail = '" . $mail . "';";
        $resultats = $this->PDO->query($S_req);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $ligne = $resultats->fetch();
        return $this->hydrate($ligne);
    }
    
    public function get_user() {
        return $this;
    }
    
    public function get_all_users() {
        $S_req = "SELECT * FROM USERS;";
        $resultats = $this->PDO->query($S_req);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $A_Users = Array();
        
        while($ligne = $resultats->fetch()) {
            array_push($A_Users, $this->hydrate($ligne));
        }
        return $A_Users;
    }
    
}

?>