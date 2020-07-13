<?php
class ChambreController extends Controller {
    public function  __construct(){
        $this->view="inscription";
        $this->folder="chambre";
        $this->validator= new Validator();
    }

    public function index(){
       $this->render();
    }
    public function room(){
        $this->view="lister";
        $this->render();
    }

    public function nbrRow(){
       $this->query= new ChambreDao();
      $nbr= $this->query->nbrow();
      echo $nbr;
}

    public function inscription()
    {
        extract($_POST);

        if(isset($_POST['btn'])){
            $this->validator->isVide(@$typeChambre,"typeC", "Veuillez selectionner le type de Chambre!");
            $this->validator->isVide(@$numBatiment,"numB", "Veuillez selectionner le numero de Batiment!");
            if($this->validator->isValid()){
                $this->query = new ChambreDao();
                $data=@$numChambre."','".$typeChambre."','".$numBatiment;
                    $row= $this->query->add($data);
                    if ($row){
                        $this->query_message['message']="Enregistrement réussi";
                        $this->index();
                    }
            }else{
                $this->query_message['error']=$this->validator->getErrors();
                $this->index();
            }

        }
    }
    public function lister(){
        extract($_POST);
        $this->query= new ChambreDao();
        $data=$this->query->listerAll($limit,$offset);
        $tab = json_decode(json_encode($data), true);
        echo json_encode($tab);
    }
    public function remove(){
        $this->query= new ChambreDao();
        $this->query->delete($_POST['num']);
        echo 'ok';
    }

    public function change(){
        $this->query= new ChambreDao();
        $this->query->update($_POST['ncham']);
        echo 'ok';
    }
}
