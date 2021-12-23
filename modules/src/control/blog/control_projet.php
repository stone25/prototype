<?php
session_start();
include('../../entity/Projet.php');
include_once('../../entity/Connexion.php'); 

if(isset($_POST['projetadd']))
{
    $projet = new Projet();
    $connexion = new Connexion();

    $query = "SHOW TABLE STATUS FROM kilis315_JEC LIKE 'projet' ";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $row=mysqli_fetch_assoc($result);
    $idprojet = $row['Auto_increment'];
    $name1 = 'defaut.png';
    $name2 = 'defaut.png';
    $name3 = 'defaut.png';
    $name4 = 'defaut.png';
    $name5 = 'defaut.png';

    if($_FILES["photo1"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo1"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name1 = 'projet'.$row['Auto_increment'].'-cover.'. $extension;
            $location = '../../../blog/img/projet/' . $name1;  
            move_uploaded_file($_FILES["photo1"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo2"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo2"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name2 = 'projet'.$row['Auto_increment'].'-illus1.'. $extension;
            $location = '../../../blog/img/projet/' . $name2;  
            move_uploaded_file($_FILES["photo2"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo3"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo3"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name3 = 'projet'.$row['Auto_increment'].'-illus2.'. $extension;
            $location = '../../../blog/img/projet/' . $name3;  
            move_uploaded_file($_FILES["photo3"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo4"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo4"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name4 = 'projet'.$row['Auto_increment'].'-illus3.'. $extension;
            $location = '../../../blog/img/projet/' . $name4;  
            move_uploaded_file($_FILES["photo4"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo5"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo5"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name5 = 'projet'.$row['Auto_increment'].'-illus4.'. $extension;
            $location = '../../../blog/img/projet/' . $name5;  
            move_uploaded_file($_FILES["photo5"]["tmp_name"], $location);
        }
    }

    $projet->setDenomination(str_replace("'","''",$_POST["denomination"]));
    $projet->setDescription(str_replace("'","''",$_POST["description"]));
    $projet->setCategorie(str_replace("'","''",$_POST["categorie"]));
    $projet->setLieu(str_replace("'","''",$_POST["lieu"]));
    $projet->setDebut($_POST["debut"]);
    $projet->setFin($_POST["fin"]);
    $projet->setPhoto1($name1);
    $projet->setPhoto2($name2);
    $projet->setPhoto3($name3);
    $projet->setPhoto4($name4);
    $projet->setPhoto5($name5);
    $projet->setResponsable(str_replace("'","''",$_POST["responsable"]));
    $projet->setClient(str_replace("'","''",$_POST["client"]));
    $projet->setAppreciation(str_replace("'","''",$_POST["appreciation"]));

    $projet->creerProjet();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../new_projet.php'>";
}


if(isset($_POST['projetedit']))
{
    $projet = new Projet();
    $connexion = new Connexion();

    $idprojet = $_GET["edit"];

    if($_FILES["photo1"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo1"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name1 = 'projet'.$idprojet.'-cover.'. $extension;
            $location = '../../../blog/img/projet/' . $name1;  
            move_uploaded_file($_FILES["photo1"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo2"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo2"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name2 = 'projet'.$idprojet.'-illus1.'. $extension;
            $location = '../../../blog/img/projet/' . $name2;  
            move_uploaded_file($_FILES["photo2"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo3"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo3"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name3 = 'projet'.$idprojet.'-illus2.'. $extension;
            $location = '../../../blog/img/projet/' . $name3;  
            move_uploaded_file($_FILES["photo3"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo4"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo4"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name4 = 'projet'.$idprojet.'-illus3.'. $extension;
            $location = '../../../blog/img/projet/' . $name4;  
            move_uploaded_file($_FILES["photo4"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo5"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo5"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name5 = 'projet'.$idprojet.'-illus4.'. $extension;
            $location = '../../../blog/img/projet/' . $name5;  
            move_uploaded_file($_FILES["photo5"]["tmp_name"], $location);
        }
    }

    $projet->setId($_GET["edit"]);
    $projet->setDenomination(str_replace("'","''",$_POST["denomination"]));
    $projet->setDescription(str_replace("'","''",$_POST["description"]));
    $projet->setCategorie(str_replace("'","''",$_POST["categorie"]));
    $projet->setLieu(str_replace("'","''",$_POST["lieu"]));
    $projet->setDebut($_POST["debut"]);
    $projet->setFin($_POST["fin"]);
    $projet->setResponsable(str_replace("'","''",$_POST["responsable"]));
    $projet->setClient(str_replace("'","''",$_POST["client"]));
    $projet->setAppreciation(str_replace("'","''",$_POST["appreciation"]));

    $projet->modifierProjet();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../list_projet.php'>";
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Traitement...</title>

        <!-- Favicon  -->
        <!--link rel="icon" href="img/core-img/favicon.ico"-->

        <!-- Custom CSS -->
        <link href="../style/style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="loader"></div>
    </body>
</html>