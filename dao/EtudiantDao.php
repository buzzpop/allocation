<?php
class EtudiantDao extends Main  {

    public function __construct(){
        $this->className="Etudiant";
        $this->tableName=lcfirst($this->className);
    }

    public function add($data)
    {
        $req = "Insert into $this->tableName (matricule,nom,	prenom,	email,	tel,	datNaiss,	adresse,
                   typeBourse) values ('".$data."')";
        return  $this->executeUpdate($req)==true ;

    }
    public function update($matricule){
        $pdo= Main::con();
        $req=$pdo->prepare( "Update $this->tableName set nom='".$_POST['nom']."',prenom= '".$_POST['prenom']."', email='".$_POST['email']."',tel= '".$_POST['tel']."', datNaiss='".$_POST['date']."', adresse='".@$_POST['adresse']."', typeBourse='".$_POST['etudiantT']."' where matricule= ? ");
        $req->execute([$matricule]);
    }

    public function recoverAll(){
        $req= "Select * from $this->tableName";
    }
    public function listerAll($limit,$offset){
        $req= "SELECT* from $this->tableName order by matricule LIMIT {$offset},{$limit} ";
        $data=$this->executeSelect($req);
        return $data;
    }

    public function find($type){
    $sql= "SELECT * from $this->tableName type = $type ";
    }
    public function delete($matricule){
        $pdo= Main::con();
        $req= $pdo->prepare("delete from $this->tableName where matricule = ?");
        $req->execute([$matricule]);

    }


}

