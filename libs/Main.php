<?php
abstract class Main implements IDao
{
    static $ras;
    private $pdo= null ;
    protected $className;
    protected $tableName;

    // BD connection method
    public function getConnexion()
    {

                $this->pdo = new PDO ("mysql: host=localhost; dbname=room-management", "root", "");
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    static function con()
    {


            try {
                self::$ras = new PDO ("mysql: host=localhost; dbname=room-management", "root", "");
                self::$ras->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                    return self::$ras;
            } catch (PDOException $e) {
                die("Erreur de Connexion" . $e->getMessage());
            }

    }


    // close connection method
    private function closeConnexion()
    {
        if ($this->pdo != null) {
            $this->pdo = null;
        }
    }

    // for select queries
    public function executeSelect($req)
    {

        $this->getConnexion();
        $result = $this->pdo->query($req);
        $tab = [];
        foreach ($result as $value) {
            $tab[] = new $this->className($value);
        }
        return $tab;
        $this->closeConnexion();
    }

    // For Update queries
    public function executeUpdate($req)
    {
        $this->getConnexion();
        $row = $this->pdo->query($req);
        $this->closeConnexion();
        return $row->rowCount();
    }

    public function nbrow()
    {

        $this->getConnexion();
        $req = $this->pdo->prepare("SELECT  *   from $this->tableName");
        $req->execute();
        return count($req->fetchAll());
    }
}