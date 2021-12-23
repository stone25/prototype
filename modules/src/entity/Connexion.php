<?php
class Connexion
{
/*------------------------------------------
Attributs de la classe ---------------------
-------------------------------------------*/

    //private $host = "91.216.107.219";
    private $host = "localhost";
    private $username = "jecci1157367";
    private $password = "tagi6bfz9e";
    private $database = "jecci1157367";
    public $connexion = false;
    
/*------------------------------------------
Constructeur de la classe ---------------------
-------------------------------------------*/

    function __construct()
    {
        $this->connexion = mysqli_connect($this->host, $this->username, $this->password);
        $database = mysqli_select_db($this->connexion, $this->database);
        header('content-type: text/html; charset=utf-8');
        mysqli_set_charset( $this->connexion , "utf8" );
    }

    public function connecter()
    {
        if($this->connexion)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function deconnecter()
    {
        mysqli_close($this->connexion);
    }
    
}
    
?>