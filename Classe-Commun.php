<?php

//session_start();

class Commun
{
    private $A;
    private $B;
    private $C;
    private $D;
    private $PDO;

    function __construct()
    {
        $args_num = func_num_args();

        switch ($args_num)
        {
            case 0:
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
            case 4:
                $args_list = func_get_args();
                $this->A = $args_list[0];
                $this->B = $args_list[1];
                $this->C = $args_list[2];
                $this->D = $args_list[3];
                $this->PDO = new PDO($_SESSION['driver'], $_SESSION['login'], $_SESSION['password']);
                break;
        }
    }

    public function getA(){return $this->A;}
    public function getB(){return $this->B;}
    public function getC(){return $this->C;}
    public function getD(){return $this->D;}

    public function setA($a){$this->A = $a;}
    public function setB($b){$this->B = $b;}
    public function setC($c){$this->C = $c;}
    public function setD($d){$this->D = $d;}

    function create()
    {
        $sqlenvoie= "INSERT INTO commun(ida, b, c, d) VALUES (:A, :B, :C, :D)";
        $STMT= $this->PDO->prepare($sqlenvoie);
        $STMT->bindParam(':A', $this->A);
        $STMT->bindParam(':B', $this->B);
        $STMT->bindParam(':C', $this->C);
        $STMT->bindParam(':D', $this->D);
        $STMT->execute();
    }

    function retrieve($A)
    {
        $req = "SELECT * FROM commun WHERE ida = :A";
        $stmt= $this->PDO->prepare($req);
        $stmt->bindParam(':A', $A);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function update()
    {
        $req = "UPDATE commun SET b = :B, c = :C, d = :D WHERE ida = :A";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':A', $this->A);
        $STMT->bindParam(':B', $this->B);
        $STMT->bindParam(':C', $this->C);
        $STMT->bindParam(':D', $this->D);
        $STMT->execute();
    }

    function delete()
    {
        $req = "DELETE FROM commun WHERE ida = :A";
        $STMT = $this->PDO->prepare($req);
        $STMT->bindParam(':A', $this->A);
        $STMT->execute();
    }

    function findAll()
    {
        $req = "SELECT * FROM commun ORDER BY ida DESC";
        $STMT = $this->PDO->prepare($req);
        $STMT->execute();
        $result = $STMT->fetchAll();
        $_SESSION['findAll'] = $result;
        return $result;
    }
}
?>