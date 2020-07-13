<?php

class BatimentDao extends Main{

    public function __construct()
    {
        $this->className = "Batiment";
        $this->tableName = lcfirst($this->className);
    }

    public function add($obj)
    {
        $req = "Insert into $this->tableName(numBatiment) values ($obj)";
        return  $this->executeUpdate($req)!=0 ;

    }
    public function findById($id)
    {
        $req = "Select * from $this->tableName where numBatiment= $id";
        return  $this->executeUpdate($req) ;

    }

    public function update($obj)
    {
        $req = "Update $this->tableName set ";

    }

    public function delete($numBatiment)
    {
        $req = "delete $this->tableName where numBatiment = $numBatiment";

    }

    public function recoverAll()
    {
        $req = "Select * from $this->tableName";
    }

    public function find($type)
    {
        $sql = "SELECT * from $this->tableName type = $type ";
    }
    public function numBatiment(){
        $req= "Select numBatiment from $this->tableName";
         $data=$this->executeSelect($req);
        return $data;
    }
}
