<?php

    $destinataires = "badouaristide@gmail.com,support@jec-ci.com";
    $sujet = "$_POST[objet]";
    $entetes = "MIME-Version: 1.0\r\n";
    $entetes .= "From : $_POST[email]"."\n";
    $entetes .= 'Content-Type: text/html; charset ="utf-8"'."\n";
    $entetes .= 'Content-Transfer-Encoding: 8bit';

    $message = "<html>
                    <body>
						<div>
                        Message reçu de <br>
                        <b>$_POST[nom] $_POST[prenom]</b><br><br>
                        adresse: <b>$_POST[email]</b> contact: <b>$_POST[contact]</b><br><br>
                        Structure: <b>$_POST[structure]</b>
                            <p>
                                $_POST[message]
                            </p>
                        </div>
                    </body>
                </html>";
    
    mail($destinataires, $sujet, $message, $entetes);
    echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='index.php'>";
/*
$titre = 'Mail';
$page = 'JEC - Mail';


$destinataires = "badouaristide@gmail.com,bureaunational@jec-ci.com";
$sujet = "$_POST[objet]";
$entetes = "MIME-Version: 1.0\r\n";
$entetes .= "From : $_POST[email]"."\n";
$entetes .= 'Content-Type: text/html; charset ="utf-8"'."\n";
$entetes .= 'Content-Transfer-Encoding: 8bit';
$message = $_POST["message"];

$message = "<html>
                <body>
                    <div>
                        <p>
                            Nom et prénoms: <b>:$_POST[name]</b><br>
                            Contact <b>: $_POST[structure]</b><br>
                            Contact <b>: $_POST[contact]</b><br><br><br>
                            $_POST[message]
                        </p>
                    </div>
                </body>
            </html>";
// en-têtes expéditeur


// en-têtes adresse de retour
$entetes .= "Reply-to : $_POST[email]\n";

mail($destinataires, $sujet, $message, $entetes);
header('Location: index.php');
//echo "<META HTTP-EQUIV='Refresh' CONTENT= 1;URL='index.php'>";
*/
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Presentation JEC Côte d'Ivoire">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Title -->
        <title>JEC-CI - mail</title>

        <!-- Favicon -->
        <link rel="icon" href="./img/core-img/favicon.ico">

        <!-- Core Stylesheet -->
        <link rel="stylesheet" href="style.css">

    </head>
    <body>
        <div class="loader"></div>
    </body>
</html>