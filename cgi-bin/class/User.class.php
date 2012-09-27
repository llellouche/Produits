<?php

class User {

    private $id_user;
    private $mdp;
    private $nom;
    private $prenom;
    private $mail;
    private $date_naiss;
    private $niveau;

    public function __construct($id_user, $mdp, $nom, $prenom, $mail, $date_naiss, $niveau) {
        if(func_num_args() == 0) {
            $this->id_user = 0;
            $this->mdp = "";
            $this->nom = "";
            $this->prenom = "";
            $this->mail = "";
            $this->date_naiss = "";
            $this->niveau = "";
        } else {
            $this->id_user = $id_user;
            $this->mdp = $mdp;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->mail = $mail;
            $this->date_naiss = $date_naiss;
            $this->niveau = $niveau;
        }
        
    }
    
    public function get_id() {
        return $this->id_user;
    }
    
    public function get_mail() {
        return $this->mail;
    }
    
    public function get_nom() {
        return mb_strtoupper($this->nom);
    }
    
    public function get_prenom() {
        return ucfirst(mb_strtolower($this->prenom));
    }
    
    public function get_niveau() {
        return $this->niveau;
    }
}

?>