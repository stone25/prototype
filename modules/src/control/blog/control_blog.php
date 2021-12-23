<?php
session_start();
include('../../entity/Article.php');
include_once('../../entity/Connexion.php'); 

if(isset($_POST['articleadd']))
{
    $article = new Article();
    $connexion = new Connexion();

    $query = "SHOW TABLE STATUS FROM jecci1157367 LIKE 'article' ";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $row=mysqli_fetch_assoc($result);
    $idarticle = $row['Auto_increment'];
    $name1 = 'defaut.png';
    $name2 = 'defaut.png';

    if($_FILES["photo1"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo1"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name1 = 'blog'.$row['Auto_increment'].'-cover.'. $extension;
            $location = '../../../../img/blog-img/' . $name1;  
            move_uploaded_file($_FILES["photo1"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo2"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo2"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name2 = 'blog'.$row['Auto_increment'].'-illus.'. $extension;
            $location = '../../../../img/blog-img/' . $name2;  
            move_uploaded_file($_FILES["photo2"]["tmp_name"], $location);
        }
    }

    $article->setTitre(str_replace("'","''",$_POST["titre"]));
    $article->setContenu1(str_replace("'","''",$_POST["contenu1"]));
    $article->setContenu2(str_replace("'","''",$_POST["contenu2"]));
    $article->setCitation(str_replace("'","''",$_POST["citation"]));
    $article->setAuteur(str_replace("'","''",$_POST["auteur"]));
    $article->setPhoto1($name1);
    $article->setPhoto2($name2);
    $article->setRedacteur($_SESSION["user"]["id"]);

    $article->creerArticle();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/new_article.php'>";
}

if(isset($_POST['articleedit']))
{
    $article = new Article();
    $name1 = 'defaut.png';
    $name2 = 'defaut.png';

    if($_FILES["photo1"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo1"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name1 = 'blog'.$row['Auto_increment'].'-cover.'. $extension;
            $location = '../../../../img/blog-img/' . $name1;  
            move_uploaded_file($_FILES["photo1"]["tmp_name"], $location);
        }
    }

    if($_FILES["photo2"]["name"] != '')
    {
        $photo = explode('.', $_FILES["photo2"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name2 = 'blog'.$row['Auto_increment'].'-illus.'. $extension;
            $location = '../../../../img/blog-img/' . $name2;  
            move_uploaded_file($_FILES["photo2"]["tmp_name"], $location);
        }
    }

    $article->setId($_GET["edit"]);
    $article->setTitre(str_replace("'","''",$_POST["titre"]));
    $article->setContenu1(str_replace("'","''",$_POST["contenu1"]));
    $article->setContenu2(str_replace("'","''",$_POST["contenu2"]));
    $article->setCitation(str_replace("'","''",$_POST["citation"]));
    $article->setAuteur(str_replace("'","''",$_POST["auteur"]));
    $article->setPhoto1($name1);
    $article->setPhoto2($name2);
    $article->setRedacteur($_SESSION["user"]["id"]);

    $article->modifierArticle();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_article.php'>";
}


if(isset($_GET['status']) && isset($_GET['visibility']))
{
    $article = new Article();
    
    $article->setId($_GET["visibility"]);
    $article->setStatut($_GET["status"]);

    $article->changerVisibilite();

    
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../../blog/list_article.php'>";
}


if(isset($_GET['id']) && isset($_GET['finish']))
{
    $article = new Article();
    $attribuer = new Attribuer();

    $article->setId("$_GET[id]");
    if($_GET['finish']==1)
    {
        $article->setStatut('Terminée');
    }
    else
    {
        $article->setStatut('En cours');
    }
    
    $article->Terminerarticle();
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