<?php
class EtudiantBoursier extends Etudiant {
    private $typeBourse;

    public function __contruct($tab=null){
        if($tab!= null){
            $this->initialize($tab);
        }
    }

    public function initialize($tab){
        $this->typeBourse= $tab['typeBourse'];
         
    }
}