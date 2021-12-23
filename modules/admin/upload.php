<?php
//upload.php
session_start();
include_once('src/control/connexion.php'); 
if($connexion && isset($_GET['matricule']))
{
    $req = "select * from jeciste where matricule = '$_GET[matricule]'";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    $i = 0;
    $debut = 1;
    $fin = 4;
    $rows=mysqli_fetch_assoc($fic);

    
    if($rows['sexe'] == 'M' || $rows['sexe'] == 'G' || $rows['sexe'] == 'H')
    {
        $defaut = 'defaut-homme.jpg';
    }
    else
    {
        $defaut = 'defaut-femme.jpg';
    }

    $photo = $rows['photo'];
    if($photo == '' || $photo == 'defaut.jpg')
    {
        $photo = $defaut;
    }

    if(!isset($_FILES["file"]["name"]))
    {
        echo'<img  src="img/jeciste/'.$photo.'" alt="" />';
    }
    else
    {
        if($_FILES["file"]["name"] != '')
        {
            $test = explode('.', $_FILES["file"]["name"]);
            $ext = end($test);
            $name = $_GET['matricule'] .'.'. $ext;
            $location = 'img/jeciste/'.$name;  
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
            $matricule = $_GET['matricule'];
            $_SESSION["photo"]["$matricule"] = true;
            echo '<img src="'.$location.'" alt=""  />';
        }
    }
}

?>