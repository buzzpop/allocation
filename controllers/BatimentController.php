<?php
class BatimentController extends Controller {
    public function __construct()
    {
        $this->view = "inscription";
        $this->folder = "batiment";
        $this->validator= new Validator();
    }

    public function index()
    {

        $this->render();
    }

    public function inscription()
    {
        extract($_POST);
        if(isset($_POST['btn_submit'])){
            $this->validator->isVide($numbatiment,"numB", "Numero Batiment Vide");
            $this->validator->isLenght($numbatiment,"numB", "Le numero du Batiment ne doit pas depasser 3 chiffres");
            $this->validator->isNumeric($numbatiment,"numB", "Veuillez Entrer un numero svp!");
            if($this->validator->isValid()){
                $this->query = new BatimentDao();
               $id= $this->query->findById($numbatiment);
               if ($id==0){
                   $row= $this->query->add($numbatiment);
                   if ($row ){
                       $this->query_message['message']="Enregistrement réussi";
                       $this->index();

                   }
               }

                   else{
                       $this->query_message['message']="Numero existe deja!";
                       $this->index();
                   }

            }else{
                $this->query_message['error']=$this->validator->getErrors();
                $this->index();
            }

        }

    }
    public function recupNumBatiment()
    {
        $this->query= new BatimentDao();
       $data=$this->query->numBatiment();

        $tab = json_decode(json_encode($data), true);
        echo json_encode($tab);
    }


    public function supprimer()
    {

    }

    public function modifier()
    {

    }
}



