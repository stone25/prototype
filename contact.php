<?php
session_start();
include_once('modules/src/entity/Connexion.php'); 
$menu_selected = array();
$menu_selected['contact'] = 'class="current-item"'; 
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
    $req = "update visite set nombre = nombre + 1 where page ='Contact'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $_SESSION['visite'] = true;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Contact JEC Côte d'Ivoire">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>JEC-CI - Contact</title>

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
                        <h2 class="title">Contact</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Contact</li>
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

    <!-- ***** Contact Area Start ***** -->
    <section class="uza-contact-area section-padding-80">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Contact Form -->
                <div class="col-12 col-lg-8">
                    <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4>Merci pour l'intérêt que vous nous portez. <br>Veuillez remplir correctement les champs puis valider</h4>
                        </div>
                        <form action="mail.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="nom" placeholder="Nom et Prénoms">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-30" name="email" placeholder="e-mail">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="contact" placeholder="Contact">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="structure" placeholder="Structure">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="objet" placeholder="Objet">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control mb-30" name="message" rows="8" cols="80" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn uza-btn btn-3 mt-15">Envoyer</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Single Contact Card -->
                <div class="col-12 col-lg-3">
                    <div class="contact-sidebar-area mb-80">
                        <!-- Single Sidebar Area -->
                        <div class="single-contact-card mb-50">
                            <h4>Contactez-nous</h4>
                            <a href="tel://"> <h3>+225 47 605 932</h3></a>
                            <h6><i class="fa fa-envelope"></i> contact@jec-ci.com</h6>
                            <h6><i class="fa fa-map-marker"></i> Abidjan; Plateau CAM</h6>
                            <h6><i class="fa fa-calendar"></i> Lundi - Samedi: 8:00 - 17:00 </h6>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Google Maps -->
                <div class="col-12">
                    <div class="google-maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.5998338744234!2d-4.023679299385981!3d5.32494182794026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eb0adcedd8a1%3A0x69fd72540d6ca5cd!2sSi%C3%A8ge+National+JEC+C%C3%B4te+d&#39;Ivoire!5e0!3m2!1sfr!2sci!4v1553089831511" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Area End ***** -->

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