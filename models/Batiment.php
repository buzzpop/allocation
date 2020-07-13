<?php
class Batiment  implements IEtudiant {
  public  $numBatiment;

    public function __construct($tab=null){
        if($tab!= null){
            $this->initialize($tab);
        }
    }
    public function initialize($tab){
        $this->numBatiment= $tab['numBatiment'];



    }

}