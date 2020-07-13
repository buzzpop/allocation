<?php
class Etudiant implements IEtudiant {
    public $matricule;
    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $datNaiss;
    public $adresse;
    public $typeBourse;


    public function __construct($tab=null){
        if($tab!= null){
            $this->initialize($tab);
        }
    }
        public function initialize($tab){
            $this->matricule= $tab['matricule'];
            $this->nom= $tab['nom'];
            $this->prenom= $tab['prenom'];
            $this->email= $tab['email'];
            $this->tel= $tab['tel'];
            $this->datNaiss= $tab['datNaiss'];
            $this->adresse= $tab['adresse'];
            $this->typeBourse= $tab['typeBourse'];

        }
        public function getMatricule(){
        return $this->matricule;
        }
}