<?php
class ChambreDao extends Main  {

    public function __construct(){
        $this->className="Chambre";
        $this->tableName=lcfirst($this->className);
    }

    public function add($data)
    {
        $req = "Insert into $this->tableName (numChambre,typeChambre,numBatiment) values ('".$data."')";
        return  $this->executeUpdate($req)==true ;

    }
    public function update($numChambre){
        $pdo= Main::con();
        $req=$pdo->prepare( "Update $this->tableName set 	typeChambre= '".$_POST['chambrep']."', numBatiment='".$_POST['batimentp']."' where numChambre= ? ");
        $req->execute([$numChambre]);
    }
    public function delete($numChambre){
        $pdo= Main::con();
        $req= $pdo->prepare("delete from $this->tableName where numChambre = ?");
         $req->execute([$numChambre]);

    }
    public function recoverAll(){
        $req= "Select * from $this->tableName";
    }

    public function find($type){
    $sql= "SELECT * from $this->tableName type = $type ";
    }

    //
    public function listerAll($limit,$offset){
        $req= "SELECT numChambre,typeChambre, numBatiment from $this->tableName order by numChambre LIMIT {$offset},{$limit} ";
        $data=$this->executeSelect($req);
        return $data;
    }
}

