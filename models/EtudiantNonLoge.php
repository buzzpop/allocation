<?php
class EtudiantNonLoge extends EtudiantBoursier {
    private $adresse;

    public function __contruct($tab=null){
        if($tab!= null){
            $this->initialize($tab);
        }
    }

    public function initialize($tab){
        $this->adresse= $tab['adresse'];
         
    }
}
