<?php
session_start();
include('../entity/blogueur.php');
include_once('../entity/connexion.php'); 


if(isset($_POST['useradd']))
{
    $user = new Blogueur();

    $connexion = new Connexion();
    $query = "SHOW TABLE STATUS FROM kilis315_JEC LIKE 'blogueur' ";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $row=mysqli_fetch_assoc($result);
    $name = 'defaut.png';

    if($_FILES["file"]["name"] != '')
    {
        $photo = explode('.', $_FILES["file"]["name"]);
        $extension = end($photo);

        if(strtolower($extension) == 'jpg' || strtolower($extension) == 'png' || strtolower($extension) == 'jpeg')
        {
            $name = 'user'.$row['Auto_increment'].'.'. $extension;
            $location = '../../img/photo/' . $name;  
            move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        }
    }

    $user->setNom("$_POST[nom]");
    $user->setPrenom("$_POST[prenom]");
    $user->setDate("$_POST[date]");
    $user->setLieu($_POST["lieu"]);
    $user->setContact($_POST["contact"]);
    $user->setEmail($_POST["email"]);
    $user->setFonction($_POST["fonction"]);
    $user->setPhoto($name);
    $user->setLogin($_POST["login"]);
    $user->setPassword($_POST["password"]);

    $user->creerUser();
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../new_user.php'>";

    /*echo $user->getId();
    echo $user->getNom();
    echo $user->getPrenom();
    echo $user->getDate();
    echo $user->getLieu();
    echo $user->getContact();
    echo $user->getEmail();
    echo $user->getFonction();
    echo $user->getLogin();
    echo $user->getPassword();
    echo $user->getEntreprise();
    echo $user->getService();
    echo $user->getProfil();*/
}

if(isset($_POST['useredit']))
{
    $user = new Blogueur();

    $user->setId("$_POST[useredit]");
    $user->setNom(str_replace("'","''",$_POST["nom"]));
    $user->setPrenom(str_replace("'","''",$_POST["prenom"]));
    $user->setDate("$_POST[date]");
    $user->setLieu(str_replace("'","''",$_POST["lieu"]));
    $user->setContact($_POST["contact"]);
    $user->setEmail(str_replace("'","''",$_POST["email"]));
    $user->setFonction(str_replace("'","''",$_POST["fonction"]));
    //$user->setPhoto($name);
    $user->setLogin(str_replace("'","''",$_POST["login"]));
    $user->setPassword(str_replace("'","''",$_POST["password"]));
    $user->setEntreprise(str_replace("'","''",$_POST["entreprise"]));
    $user->setService(str_replace("'","''",$_POST["service"]));
    $user->setProfil(str_replace("'","''",$_POST["profil"]));

    $user->modifierUser();
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../list_user.php'>";

    /*echo $user->getId();
    echo $user->getNom();
    echo $user->getPrenom();
    echo $user->getDate();
    echo $user->getLieu();
    echo $user->getContact();
    echo $user->getEmail();
    echo $user->getFonction();
    echo $user->getLogin();
    echo $user->getPassword();
    echo $user->getEntreprise();
    echo $user->getService();
    echo $user->getProfil();*/
}


if(isset($_POST['authenticate']))
{
    $user = new Blogueur();
    $connexion = new Connexion();
    $user->setLogin(str_replace("'","''",$_POST["username"]));
    $user->setPassword(str_replace("'","''",$_POST["password"]));
     
    if($user->authentifier())
    {
        $query = "SELECT * FROM blogueur WHERE login_user = '$_POST[username]' AND pwd_user = '$_POST[password]'";
        $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user'] = array();
        $_SESSION['user']['id'] = $user['id_user'];
        $_SESSION['user']['nom'] = $user['nom_user'];
        $_SESSION['user']['prenom'] = $user['pren_user'];
        $_SESSION['user']['date'] = $user['date_user'];
        $_SESSION['user']['lieu'] = $user['lieu_user'];
        $_SESSION['user']['contact'] = $user['cont_user'];
        $_SESSION['user']['email'] = $user['email_user'];
        $_SESSION['user']['fonction'] = $user['fonc_user'];
        $_SESSION['user']['photo'] = $user['photo_user'];
        $_SESSION['user']['login'] = $user['login_user'];
        $_SESSION['user']['password'] = $user['pwd_user'];

        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../home.php'>";
    }
    else
    {
        echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php?error=1'>";
    }
}

if(isset($_GET['logout']) && $_GET['logout']==1)
{
    unset($_SESSION['user']);
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='../../index.php'>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Traitement...</title>

        <!-- Favicon  -->
        <!--link rel="icon" href="img/core-img/favicon.ico"-->

        <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
        
    </head>
    <body>
        <div class="loader"></div>
    </body>
</html>