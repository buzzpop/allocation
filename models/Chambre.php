<?php
class Chambre implements IEtudiant  {
  public  $numChambre;
  public  $typeChambre;
  public  $numBatiment;

  public function __construct($tab=null){
    if($tab!= null){
        $this->initialize($tab);
    }
}
    public function initialize($tab){
        $this->numChambre= $tab['numChambre'];
        $this->typeChambre= $tab['typeChambre'];
        $this->numBatiment= $tab['numBatiment'];
       
       
    }

}