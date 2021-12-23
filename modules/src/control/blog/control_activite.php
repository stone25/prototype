<?php
session_start();
include('../../entity/activite.php');
include_once('../../entity/connexion.php'); 

if(isset($_POST['activiteadd']))
{
    $activite = new Activite();
    $connexion = new Connexion();

    $query = "SHOW TABLE STATUS FROM badou220_psy LIKE 'activite' ";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $row=mysqli_fetch_assoc($result);
    $idactivite = $row['Auto_increment'];
    $name = 'defaut.png';

    if($_FILES["photo"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name = 'event-'.$row['Auto_increment'].'-cover.'. $extension;
            $location = '../../../admin/img/activite/' . $name;  
            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
        }
    }

    
    $activite->setDenomination(str_replace("'","''",$_POST["denomination"]));
    $activite->setDescription(str_replace("'","''",$_POST["description"]));
    $activite->setDate(str_replace("'","''",$_POST["date"]));
    $activite->setLieu(str_replace("'","''",$_POST["lieu"]));
    $activite->setPhoto($name);

    $activite->creerActivite();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/new_activite.php'>";
}

if(isset($_POST['activiteedit']))
{
    $activite = new Activite();
    $connexion = new Connexion();

    if($connexion->connecter() && isset($_GET["edit"]))
    {
        $query = "SELECT * FROM activite WHERE id_act = $_GET[edit]";
        $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
        $post = mysqli_fetch_assoc($result);
    }
    $name = $post['photo_act'];

    if($_FILES["photo"]["name"] != '')
    {
        if(substr($name,0,1)=='e')
        {
            $i=1;
        }
        else
        {
            $i=substr($name,0,1)+1;
        }

        $photo = explode('.', $_FILES["photo"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name = $i.'-event-'.$_GET['edit'].'-cover.'. $extension;
            $location = '../../../admin/img/activite/' . $name;  
            move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
        }
    }

    $activite->setId($_GET['edit']);
    $activite->setDenomination(str_replace("'","''",$_POST["denomination"]));
    $activite->setDescription(str_replace("'","''",$_POST["description"]));
    $activite->setDate(str_replace("'","''",$_POST["date"]));
    $activite->setLieu(str_replace("'","''",$_POST["lieu"]));
    $activite->setPhoto($name);

    $activite->modifierActivite();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_activite.php'>";
}


if(isset($_GET['status']) && isset($_GET['visibility']))
{
    $activite = new Activite();
    
    $activite->setId($_GET["visibility"]);
    $activite->setStatut($_GET["status"]);

    $activite->changerVisibilite();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_activite.php'>";
}


if(isset($_GET['id']) && isset($_GET['finish']))
{
    $activite = new Activite();
    $attribuer = new Attribuer();

    $activite->setId("$_GET[id]");
    if($_GET['finish']==1)
    {
        $activite->setStatut('Terminée');
    }
    else
    {
        $activite->setStatut('En cours');
    }
    
    $activite->TerminerActivite();
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_task.php'>";
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