<?php
class EtudiantController extends Controller {
    public function  __construct(){
        $this->view="inscription";
        $this->folder="etudiant";
        $this->validator= new Validator();
    }

    public function index(){
       $this->render();
    }
    public function lists(){
        $this->view="lister";
        $this->render();
    }

    public function nbrRow(){
        $this->query= new EtudiantDao();
        $nbr= $this->query->nbrow();
        echo $nbr;
    }
    public function inscription()
    {

        extract($_POST);

        if(isset($_POST['btn'])){
            $this->validator->isVide($prenom,"prenom", "Veuillez entrez votre prenom!");
            $this->validator->isVide($nom,"nom", "Veuillez entrez votre nom!");
            $this->validator->isVide($email,"email", "Veuillez entrez votre email!");
            $this->validator->isVide($tel,"tel", "Veuillez entrez votre numero de telephone!");
            $this->validator->isVide($date,"date", "Veuillez entrez votre date de naissance!");
            $this->validator->isVide($type,"type", "Veuillez choisir le type d'etudiant!");
            if (isset($adresse)){
                $this->validator->isVide($adresse,"adresse", "Veuillez entrez votre adresse!");
            }
            if($this->validator->isValid()){
                $this->query = new EtudiantDao();
                $data=$matricule."','".$nom."','".$prenom."','".$email."','".$tel."','".$date."','".@$adresse."','".$type;
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
        $this->query= new EtudiantDao();
        $data=$this->query->listerAll($limit,$offset);
        $tab = json_decode(json_encode($data), true);
        echo json_encode($tab);
    }
    public function remove(){
        $this->query= new EtudiantDao();
        $this->query->delete($_POST['matricule']);
        echo 'ok';
    }
    public function change(){
        $this->query= new EtudiantDao();
        $this->query->update($_POST['matricule']);
        echo 'ok';
    }

}
