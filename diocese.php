<?php
session_start();
include_once('modules/src/entity/Connexion.php'); 
$menu_selected = array();
$menu_selected['diocese'] = 'class="current-item"';
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
    $req = "update visite set nombre = nombre + 1 where page ='Diocèse'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $_SESSION['visite'] = true;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="JEC-CI - Diocèses">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>JEC-CI - Diocèses</title>

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
                        <h2 class="title">Diocèses</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Diocèses</li>
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

    <!-- ****** Gallery Area Start ****** -->
    <section class="uza-portfolio-area section-padding-80">

        <!-- Portfolio Menu -->
        <div class="portfolio-menu text-center mb-80">
            <button class="btn active" data-filter="*">Tous</button>
            <button class="btn" data-filter=".abidjan">Province d'Abidjan</button>
            <button class="btn" data-filter=".bouake">Province De Bouaké</button>
            <button class="btn" data-filter=".gagnoa">Province de Gagnoa</button>
            <button class="btn" data-filter=".korhogo">Province de Korhogo</button>
        </div>

        <div class="container-fluid">
            <div class="row uza-portfolio">

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item bouake">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain d'Abengourou</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item abidjan">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_1.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain d'Abidjan</h4>
                            <p>Spiritualité-Maturité-Intégrité-Loyauté-Engagement</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item abidjan">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain d'Agboville</h4>
                            <p></p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item bouake">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Bondoukou</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item bouake">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_5.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Bouaké</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item gagnoa">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_7.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Daloa</h4>
                            <p>Service-Travail-Action-Réussite</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item gagnoa">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Gagnoa</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item abidjan">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_3.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Grand-Bassam</h4>
                            <p>FORCE</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item korhogo">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_8.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Katiola</h4>
                            <p>Spiritualité-Maturité-Intégrité-Loyauté-Engagement</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item korhogo">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Korhogo</h4>
                            <p></p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>           

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item gagnoa">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Man</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item korhogo">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain d'Odienné</h4>
                            <p>ART</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item gagnoa">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de San-Pedro</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item bouake">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_6.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Yamoussoukro</h4>
                            <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet gubergren no sea takimata sanctus est</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Single Portfolio Item -->
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3 single-portfolio-item abidjan">
                    <div class="single-portfolio-slide">
                        <img src="./img/bg-img/BD_2.jpg" alt="">
                        <!-- Overlay Effect -->
                        <div class="overlay-effect">
                            <h4>Bureau Diocésain de Yopougon</h4>
                            <p>Service-Travail-Action-Réussite</p>
                        </div>
                        <!-- View More -->
                        <div class="view-more-btn">
                            <a href="#"><i class="arrow_right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ****** Gallery Area End ****** -->

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