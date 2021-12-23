<?php
session_start();
include_once('modules/src/entity/Connexion.php'); 
$menu_selected = array();
$menu_selected['presentation'] = 'class="current-item"';
$connexion = new Connexion();

if(!isset($_SESSION['visite']))
{
    if($connexion->connecter())
    {
        $req = "update visite set nombre = nombre + 1 where page ='Visite'";
        $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
        $_SESSION['visite'] = true;
    }
}

if($connexion->connecter())
{
    $req = "update visite set nombre = nombre + 1 where page ='Présentation'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $_SESSION['visite'] = true;
}

if($connexion->connecter())
{
    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut like '%Membre%'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $jeciste=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut not like '%Membre%'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $respo=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut like 'Enc%' or statut like 'A%'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $aine=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from instance";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $instance=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from abonnement";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $followers=mysqli_fetch_assoc($fic);

    $req = "select page, count(*) as cpt from visite group by page";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $visite=mysqli_fetch_assoc($fic);

    $req = "select page, nombre as cpt from visite where page <> 'Visite' order by cpt desc limit 1";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $max=mysqli_fetch_assoc($fic);

    $req = "select page, nombre as cpt from visite where page <> 'Visite' order by cpt asc limit 1";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $min=mysqli_fetch_assoc($fic);
}
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Presentation JEC Côte d'Ivoire">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>JEC-CI - Présentation</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <?php include_once('include/menu.php'); ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Breadcrumb Area Start ***** -->
    <div class="breadcrumb-area">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcumb--con">
                        <h2 class="title">Présentation</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Présentation</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- Background Curve -->
        <div class="breadcrumb-bg-curve">
            <img src="./img/core-img/curve-5.png" alt="">
        </div>
    </div>
    <!-- ***** Breadcrumb Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
    <section class="uza-about-us-area section-padding-80">
        <div class="container">
            <div class="row align-items-center">
                <!-- About Thumbnail -->
                <div class="col-12 col-lg-6">
                    <div class="about-us-thumbnail mb-80">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Video Area -->
                        <div class="uza-video-area hi-icon-effect-8">
                            <a href="https://www.youtube.com/watch?v=sSakBz_eYzQ" class="hi-icon video-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- About Us Content -->
                <div class="col-12 col-lg-6">
                    <div class="section-heading mb-5">
                        <h2>Qui sommes-nous ?</h2>
                    </div>

                    <div class="about-us-content mb-80">
                        <div class="about-tab-area">
                            <ul class="nav nav-tabs mb-50" id="mona_modelTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">CREATION</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false"> HISTORIQUE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">STRUCTURE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">MISSION</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Mona Tab Content -->
                        <div class="about-tab-content">
                            <div class="tab-content" id="mona_modelTabContent">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
                                    <!-- Tab Content Text -->
                                    <div class="tab-content-text">
                                        <p>Créée en 1928 en Belgique par le Père Joseph Cardjin et introduite en Côte d’Ivoire en 1949 par les soins du père André Lombardet, prêtre de la société des Missions africaines de Lyon.</p>
                                        <p>la Jeunesse Etudiante Catholique de Côte d’Ivoire est régie par la loi N° 60-315 du 21 septembre 1960 relative aux associations . La Jeunesse Etudiante catholique est enregistrée au ministère de l’Intérieur sous le numéro 000065 A.P.S. 2 du 24 juillet 1956. Son siège est à Abidjan-Plateau au Centre d’Accueil Missionnaire (CAM), Angle Boulevard Closel, Avenue Marchand.</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
                                    <!-- Tab Content Text -->
                                    <div class="tab-content-text">
                                        <p>En 1956, les jeunes filles éprouvèrent le besoin de créer une JEC à part, espérant pouvoir appréhender les problèmes relatifs à leur condition de femme et de les résoudre à partir de leurs propres moyens. Ainsi à partir du 24 juillet 1956, la JEC ivoirienne se scinde en deux (2) branches : une JEC Filles (JEC-F) et une JEC Garçons (JEC-G). Avec la création en 1963 du centre d’Etude Supérieur (CES), devenu Université d’Abidjan en 1964, des étudiants catholiques éprouvèrent le désir de continuer leur militantisme dans leur milieu universitaire. Ils créent alors une troisième branche de la JEC : la JEC-U.</p>
                                        <p>Après plusieurs années de fonctionnement, les trois branches nationales ont eprouvé le besoin de se réorganiser et d’unir leur force en formant une seule entité nationale et ce, depuis le Conseil National de réunification qui s’est tenu du 06 au 14 septembre 2006 au Moyen Séminaire de Yopougon.</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab3">
                                    <!-- Tab Content Text -->
                                    <div class="tab-content-text">
                                        <p>Elle a une structure propre dans chaque pays. En Côte d'Ivoire, elle est structurée comme suit :</p>
                                        <p><i class="fa fa-check"></i> Conseil consultatif: Organe de controle du Bureau National</p>
                                        <p><i class="fa fa-check"></i> Bureau National: Organe de coordination des activités nationales</p>
                                        <p><i class="fa fa-check"></i> Bureaux Diocésains: Organe d'exécution du Bureau National</p>
                                        <p><i class="fa fa-check"></i> Bureaux Régionaux: Organe de coordination des activités régionales</p>
                                        <p><i class="fa fa-check"></i> Bureaux de Section: Organe élémentaire de la JEC de Côte d'Ivoire</p>
                                        <p><i class="fa fa-check"></i> Equipes de base</p>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab3">
                                    <!-- Tab Content Text -->
                                    <div class="tab-content-text">
                                        <p>L’association a pour but d’aider les élèves et étudiants des établissements secondaires et supérieurs de Côte d’Ivoire à développer le sens de la responsabilité apostolique dans leur milieu de vie. S’organiser pour mieux répondre à tous les besoins légitimes de leur milieu par une formation religieuse, spirituelle, culturelle, sociale, intellectuelle et technique les préparant à une vie d’adulte. Son slogan est : JEC, Lumière JEC Action.</p>
                                        <p>La mission de la JEC est d’évangéliser et transformer le milieu scolaire et universitaire par la formation des élèves et étudiants tout en les invitant à examiner la société à partir de l’option préférentielle pour les pauvres et en s’engageant à la solidarité, à la liberté, à la justice et à la paix globale.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Background Pattern -->
        <div class="about-bg-pattern">
            <img src="./img/core-img/curve-2.png" alt="">
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Why Choose Us Area Start ***** -->
    <section class="uza-why-choose-us-area">
        <div class="container">
            <div class="row align-items-center">
                <!-- Choose Us Content -->
                <div class="col-12 col-lg-6">
                    <div class="choose-us-content mb-80">
                        <div class="section-heading mb-4">
                            <h2>Pourquoi adhérer ?</h2>
                            <p>Les avantages du militantisme à la JEC sont nombreux et variés :</p>
                        </div>
                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Apprendre à être un chrétien(ne) engagé(e)</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Apprendre au jeune étudiant à devenir responsable</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Permettre une insertion socio-professionnelle du jeune étudiant</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Offrir un réseautage facilitant les carrières professionnelles</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Contribuer au développement personnel de ses membres</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Proposer des formations techniques et humaines à caractère professionnel</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Aider au renforcement de la foi par le service de la communauté</li>
                        </ul>
                    </div>
                </div>
                <!-- Choose Us Thumbnail -->
                <div class="col-12 col-lg-6">
                    <div class="choose-us-thumbnail mb-80">
                        <img class="w-100" src="img/bg-img/22.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Why Choose Us Area End ***** -->

    <!-- ***** Team Member Area Start ***** -->
    <section class="uza-portfolio-area section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Bureau National</h2>
                        <p>Les membres du Bureau National de la JEC de Côte d'Ivoire pour la biennale 2018-2020 sont :</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Team Member Slides -->
                <div class="team-sildes owl-carousel">

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/30.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Responsable</h6>
                            <h4>Marie Ella KOUAKOU</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/31.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Vice Responsable</h6>
                            <h4>Prisca KOFFI</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général</h6>
                            <h4>José Rodrigue KIPLE</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/33.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Générale Adjointe</h6>
                            <h4>Glwadys ADIA</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/34.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général Adjoint</h6>
                            <h4>Assassy René NIAMIEN</h4>
                            <p>Chargé des université et grandes écoles</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général Adjoint</h6>
                            <h4>Brou Jean Richard YAO</h4>
                            <p>Chargé des universités et grandes écoles</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/39.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général Adjoint</h6>
                            <h4>Franck Olivier GNALLY</h4>
                            <p>Chargé des universités et grandes écoles</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général Adjoint</h6>
                            <h4>Hugues Hermann BEDA</h4>
                            <p>Chargé des lycées et collèges</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/36.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général Adjoint</h6>
                            <h4>François Jean-Marie KOUAKOU</h4>
                            <p>Chargé des lycées et collèges</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/35.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Général Adjoint</h6>
                            <h4>Gueu Olive OUEI</h4>
                            <p>Chargé des lycées et collèges</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Secrétaire Générale Adjointe</h6>
                            <h4>Céline SEBEGO</h4>
                            <p>Chargée de la mobilisation des filles</p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Trésorière Générale</h6>
                            <h4>Vanessa BATIONO</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/40.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Trésorier Adjoint</h6>
                            <h4>Paterne DONGA</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/37.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Chargé de Communication</h6>
                            <h4>Hyacinthe Dewelett KOUAKOU</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/38.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Chargé de Communication Adjoint</h6>
                            <h4>Ghislain Aristide BADOU</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                    <!-- Single Team Slide -->
                    <div class="single-team-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h6>Chargé de Communication</h6>
                            <h4>Roumuald KOUYA</h4>
                            <p></p>
                        </div>
                        <!-- Social Info -->
                        <div class="team-social-info">
                            <a href="#" class="facebook" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="pinterest" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="instagram" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="youtube" data-toggle="tooltip" data-placement="top" title="YouTube"><i class="fa fa-youtube-play"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Border -->
        <div class="container">
            <div class="border-line mt-80"></div>
        </div>
    </section>
    <!-- ***** Team Member Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <div class="uza-cta-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-8">
                    <div class="cta-content mb-80">
                        <h2>Aumônier et conseil consultatif</h2>
                        <h6>L'équipe de l'aumonerie nationale pour la biennale 2018-2020 se présente comme suit :</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Client Feedback Area Start ***** -->
    <div class="clients-feedback-area section-padding-0-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Testimonial Slides -->
                    <div class="testimonial-slides owl-carousel">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="./img/bg-img/41.jpg" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>Aumônier National</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>Père Harold KOUAKOU <br>
                                    <span>
                                    - Prêtre du diocèse de Yopougon<br>
                                    - Curé de la paroisse St Barthélemy des cités du Banco<br>
                                    - Directeur Diocésain Adjoint des OEuvres Catholiques et des OEuvres Pontificales Missionnaires 
                                    </span></h5>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="./img/bg-img/BD.png" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>Présidente du Conseil Consultatif</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>Mme Constance GODE épouse KOUAKOU<span>- </span></h5>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="./img/bg-img/BD.png" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>1er Vice Président du Conseil Consultatif</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>TARDY <span></span></h5>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="./img/bg-img/BD.png" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>2ème Vice Président du Conseil Consultatif</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>Jean François KPRI <span></span></h5>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="./img/bg-img/BD.png" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>Secrétaire Général du Conseil Consultatif</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>Jean Luc GNETOUA <span></span></h5>
                                </div>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide d-flex align-items-center">
                            <!-- Testimonial Thumbnail -->
                            <div class="testimonial-thumbnail">
                                <img src="./img/bg-img/BD.png" alt="">
                            </div>
                            <!-- Testimonial Content -->
                            <div class="testimonial-content">
                                <h4>Secrétaire Général Adjoint du Conseil Consultatif</h4>
                                <!-- Ratings -->
                                <div class="ratings">
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                    <i class="icon_star"></i>
                                </div>
                                <!-- Author Info -->
                                <div class="author-info">
                                    <h5>Franck Arthur KOFFI <span></span></h5>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Client Feedback Area End ***** -->

    <!-- ***** Cool Facts Area Start ***** -->
    <div class="uza-cf-area section-padding-80-0">
        <div class="container">
            <div class="row">

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter"><?php echo $jeciste['cpt']; ?></span></h2>
                        <div class="cf-text">
                            <h6>Membres</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter"><?php echo $respo['cpt']; ?></span></h2>
                        <div class="cf-text">
                            <h6>Responsables</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter"><?php echo $instance['cpt']; ?></span></h2>
                        <div class="cf-text">
                            <h6>Instances</h6>
                        </div>
                    </div>
                </div>

                <!-- Single Cool Facts Area -->
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-cf-area d-flex align-items-center mb-80">
                        <h2><span class="counter"><?php echo $followers['cpt']; ?></span></h2>
                        <div class="cf-text">
                            <h6>Abonnés</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- ***** Cool Facts Area End ***** -->

    <!-- ***** Newsletter Area Start ***** -->
    <section class="uza-newsletter-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <!-- Newsletter Content -->
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="nl-content mb-80">
                        <h2>Abonnement</h2>
                        <p>Abonnez-vous et recevez toutes l'actualité de la JEC de Côte d'Ivoire</p>
                    </div>
                </div>
                <!-- Newsletter Form -->
                <div class="col-12 col-md-6 col-lg-5">
                    <div class="nl-form mb-80">
                        <form action="#" method="post">
                            <input type="email" name="nl-email" value="" placeholder="Votre e-mail">
                            <button type="submit">S'abonner</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Border Bottom -->
            <div class="border-line"></div>
        </div>
    </section>
    <!-- ***** Newsletter Area End ***** -->

    <!-- ***** Footer Area Start ***** -->
    <?php include_once('include/footer.php'); ?>
    <!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
    <!-- jQuery js -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All js -->
    <script src="js/uza.bundle.js"></script>
    <!-- Active js -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>