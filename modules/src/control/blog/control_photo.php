<?php
session_start();
include('../../entity/photo.php');
include_once('../../entity/connexion.php'); 

if(isset($_POST['photoadd']))
{
    $photo = new Photo();
    $connexion = new Connexion();

    $query = "SHOW TABLE STATUS FROM badou220_psy LIKE 'photo' ";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $row=mysqli_fetch_assoc($result);
    $idphoto = $row['Auto_increment'];
    $name = 'defaut.png';

    if($_FILES["photo"]["name"] != '')
    {
        $img = explode('.', $_FILES["photo"]["name"]);
        $extension = end($img);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name = 'photo-'.$row['Auto_increment'].'.'. $extension;
            $location = '../../../admin/img/galerie/' . $name;  
            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
        }
    }


    $photo->setTitre(str_replace("'","''",$_POST["titre"]));
    $photo->setNom($name);
    $photo->setDescription(str_replace("'","''",$_POST["description"]));
    $photo->setEtat(str_replace("'","''",$_POST["etat"]));
    $photo->setActivite(str_replace("'","''",$_POST["activite"]));
    

    $photo->ajouterPhoto();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/new_photo.php'>";
}

if(isset($_POST['photoedit']))
{
    $photo = new Photo();
    $connexion = new Connexion();

    if($connexion->connecter() && isset($_GET["edit"]))
    {
        $query = "SELECT * FROM photo WHERE id_photo = $_GET[edit]";
        $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
        $post = mysqli_fetch_assoc($result);
    }
    $name = $post['nom_photo'];

    if($_FILES["photo"]["name"] != '')
    {
        if(substr($name,0,1)=='p')
        {
            $i=1;
        }
        else
        {
            $i=substr($name,0,1)+1;
        }

        $img = explode('.', $_FILES["photo"]["name"]);
        $extension = end($img);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name = $i.'-photo-'.$_GET["edit"].'.'. $extension;
            $location = '../../../admin/img/galerie/' . $name;  
            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
        }
    }


    $photo->setId($_GET["edit"]);
    $photo->setTitre(str_replace("'","''",$_POST["titre"]));
    $photo->setNom($name);
    $photo->setDescription(str_replace("'","''",$_POST["description"]));
    $photo->setEtat(str_replace("'","''",$_POST["etat"]));
    $photo->setActivite(str_replace("'","''",$_POST["activite"]));

    $photo->modifierPhoto();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../admin/list_photo.php'>";
}

if(isset($_GET['status']) && isset($_GET['visibility']))
{
    $photo = new Photo();
    
    $photo->setId($_GET["visibility"]);
    $photo->setEtat($_GET["status"]);

    $photo->changerEtat();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_photo.php'>";
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