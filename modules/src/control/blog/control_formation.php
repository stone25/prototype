<?php
session_start();
include('../../entity/formation.php');
include_once('../../entity/Connexion.php'); 

if(isset($_POST['formationadd']))
{
    $formation = new Formation();
    $connexion = new Connexion();

    $query = "SHOW TABLE STATUS FROM jecci1157367 LIKE 'formation' ";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $row=mysqli_fetch_assoc($result);
    $idformation = $row['Auto_increment'];
    $name = 'formation-'.$idformation.'.pdf';
    $isUpload = false;

    if($_FILES["document"]["name"] != '')
    {
        $doc = explode('.', $_FILES["document"]["name"]);
        $extension = end($doc);

        if(strtolower($extension) == 'pdf')
        {
            $name = 'formation-'.$row['Auto_increment'].'.'.$extension;
            $location = '../../../blog/formation/'.$name;  
            $isUpload = move_uploaded_file($_FILES["document"]["tmp_name"], $location);
            //var_dump($isUpload); die;
        }
    }

    if($isUpload)
    {
        $formation->setTitre(str_replace("'","''",$_POST["titre"]));
        $formation->setDescription(str_replace("'","''",$_POST["description"]));
        $formation->setType(str_replace("'","''",$_POST["type"]));
        $formation->setDate(str_replace("'","''",date('Y-m-d')));
        $formation->setAuteur(str_replace("'","''",$_SESSION['user']['id']));
    
        $formation->creerFormation();
    
        
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/new_formation.php'>";
    }
    else
    {
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/new_formation.php?error'>";
    }
    
}

if(isset($_POST['formationedit']))
{
    $formation = new Formation();
    $connexion = new Connexion();
    $isUpload = true;

    if($_FILES["document"]["name"] != '')
    {
        $doc = explode('.', $_FILES["document"]["name"]);
        $extension = end($doc);

        if(strtolower($extension) == 'pdf')
        {
            $name = 'formation-'.$_GET['edit'].'.'.$extension;
            $location = '../../../blog/formation/'.$name;  
            $isUpload = move_uploaded_file($_FILES["document"]["tmp_name"], $location);
        }
        else
        {
            $isUpload = false;
        }
    }

    if($isUpload)
    {
        $formation->setId($_GET['edit']);
        $formation->setTitre(str_replace("'","''",$_POST["titre"]));
        $formation->setDescription(str_replace("'","''",$_POST["description"]));
        $formation->setType(str_replace("'","''",$_POST["type"]));
        $formation->setDate(str_replace("'","''",date('Y-m-d')));
        $formation->setAuteur(str_replace("'","''",$_SESSION['user']['id']));
    
        $formation->modifierFormation();
    
        
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_formation.php'>";
    }
    else
    {
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/new_formation.php?edit='".$_GET['edit'].">";
    }

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