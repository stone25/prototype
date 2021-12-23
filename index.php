<?php
session_start();
include_once('modules/src/entity/Connexion.php'); 
$menu_selected = array();
$menu_selected['accueil'] = 'class="current-item"'; 
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
    $req = "update visite set nombre = nombre + 1 where page ='Accueil'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $_SESSION['visite'] = true;
}

$connexion = new Connexion();
if($connexion->connecter())
{
	$query = "SELECT id_art, titre_art, cont1_art, cont2_art, cit_art, aut_art, photo1_art, photo2_art, date_art, MONTHNAME(date_art) AS mois, vue_art, stat_art, nom_user, pren_user FROM article INNER JOIN blogueur ON blogueur.id_user = article.id_user WHERE stat_art = 'Visible' ORDER BY date_art DESC LIMIT 3";
    $result_article = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));
    $result_article1 = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion)); 

    $query = "SELECT * FROM activite ORDER BY id_act DESC";
    $result_activite = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion)); 
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="JEC Côte d'Ivoire">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>JEC Côte d'Ivoire</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <?php include_once('include/menu.php'); ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">

            

            <!-- Single Welcome Slide -->
            <?php
            while($article = mysqli_fetch_assoc($result_article))
            {
                echo'<div class="single-welcome-slide">
                        <!-- Background Curve -->
                        <div class="background-curve">
                            <img src="./img/core-img/curve-1.png" alt="">
                        </div>

                        <!-- Welcome Content -->
                        <div class="welcome-content h-100">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <!-- Welcome Text -->
                                    <div class="col-12 col-md-6">
                                        <div class="welcome-text">
                                            <h2 data-animation="fadeInUp" data-delay="100ms">'.$article["titre_art"].'</span></h2>
                                            <h5 data-animation="fadeInUp" data-delay="400ms">'.substr($article["cont1_art"],0,50).'...</h5>
                                            <a href="blog-details.php?article='.$article["id_art"].'" class="btn uza-btn btn-2" data-animation="fadeInUp" data-delay="700ms">Lire plus</a>
                                        </div>
                                    </div>
                                    <!-- Welcome Thumbnail -->
                                    <div class="col-12 col-md-6">
                                        <div class="welcome-thumbnail">
                                            <img src="./img/blog-img/'.$article["photo1_art"].'" alt="" data-animation="slideInRight" data-delay="400ms">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>

        </div>
    </section>
    <!-- ***** Welcome Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
    <section class="uza-about-us-area">
        <div class="container">
            <div class="row align-items-center">

                <!-- About Thumbnail -->
                <div class="col-12 col-md-6">
                    <div class="about-us-thumbnail mb-80">
                        <img src="./img/bg-img/BD.png" alt="">
                        <!-- Video Area -->
                        <div class="uza-video-area hi-icon-effect-8">
                            <a href="https://www.youtube.com/watch?v=sSakBz_eYzQ" class="hi-icon video-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- About Us Content -->
                <div class="col-12 col-md-6">
                    <div class="about-us-content mb-80">
                        <h2>A la découverte de la JEC-CI</h2>
                        <p>Créée en 1928 en Belgique sous l'instigation du Père Joseph Cardjin et introduite en Côte d’Ivoire en 1949 par les soins du père André Lombardet; prêtre de la société des Missions africaines de Lyon,
                        la Jeunesse Etudiante Catholique de Côte d’Ivoire est régie par la loi N° 60-315 du 21 septembre 1960 relative aux associations . Elle est enregistrée au ministère de l’Intérieur sous le numéro 000065 A.P.S. 2 du 24 juillet 1956. Son siège est à Abidjan-Plateau au Centre d’Accueil Missionnaire (CAM); Angle Boulevard Closel; Avenue Marchand...</p>
                        <a href="presentation.php" class="btn uza-btn btn-2 mt-4">Lire plus</a>
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

    <!-- ***** Services Area Start ***** -->
    <section class="uza-services-area section-padding-80-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Méthode de travail</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single Service Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon">
                            <i class="fa fa-eye"></i>
                        </div>
                        <h5>Voir</h5>
                        <p>Tout débute par une observation minutieuse de la situation afin d'en déceler les enjeux.</p>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon">
                            <i class="fa fa-balance-scale"></i>
                        </div>
                        <h5>Juger</h5>
                        <p>Il faut pouvoir juger les situations à la lumière de l'évangile et des prescriptions de l'Eglise.</p>
                    </div>
                </div>

                <!-- Single Service Area -->
                <div class="col-12 col-lg-4">
                    <div class="single-service-area mb-80">
                        <!-- Service Icon -->
                        <div class="service-icon">
                            <i class="fa fa-flash"></i>
                        </div>
                        <h5>Agir</h5>
                        <p>L'action doit être efficace en vue de l'éradication totale des fléaux qui minent l'école ivoirienne.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->

    <!-- ***** Portfolio Area Start ***** -->
    <section class="uza-portfolio-area section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Nos actions</h2>
                        <p>Les actions de la JEC pour l'école ivoirienne :</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <!-- Portfolio Slides -->
                <div class="portfolio-sildes owl-carousel">

                    <?php
                        while($activite = mysqli_fetch_assoc($result_activite))
                        {
                            echo'<div class="single-portfolio-slide">
                                        <img src="modules/admin/img/activite/'.$activite["photo_act"].'" alt="">

                                        <div class="overlay-effect">
                                            <h4>'.$activite["den_act"].'  '.substr($activite["date_act"],8,2).'/'.substr($activite["date_act"],5,2).'/'.substr($activite["date_act"],0,4).'</h4>
                                            <p>'.substr($activite["desc_act"],0,50).'</p>
                                        </div>

                                        <div class="view-more-btn">
                                            <a href="modules/mediatheque/galerie.php?activite='.$activite["id_act"].'" target="_blank"><i class="arrow_right"></i></a>
                                        </div>
                                    </div>';
                        }
                    ?>

                </div>
            </div>
        </div>

        <!-- Client Feedback Area Start -->
        
        <div class="clients-feedback-area mt-80 section-padding-80 clearfix">
            <div class="container">
                <div class="row">
                    <!-- Section Heading -->
                    <div class="col-12">
                        <div class="section-heading text-center">
                            <h2>Nos documents de travail</h2>
                            <p>Les documents que nous utilisons pour accomplir notre devoir :</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Testimonial Slides -->
                        <div class="testimonial-slides owl-carousel">

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide d-flex align-items-center">
                                <!-- Testimonial Thumbnail -->
                                <div class="testimonial-thumbnail">
                                    <img src="./img/bg-img/7.jpg" alt="">
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-content">
                                    <h4>“Les statuts et règlement intérieur de la JEC de Côte d'Ivoire contient l'essentiel des textes régissant le mouvement.”</h4>
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
                                        <h5>Les Statuts et Règlement Intérieur <span>- 700FCFA</span></h5>
                                    </div>
                                    <!-- Quote Icon -->
                                    <div class="quote-icon"><img src="img/core-img/quote.png" alt=""></div>
                                </div>
                            </div>

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide d-flex align-items-center">
                                <!-- Testimonial Thumbnail -->
                                <div class="testimonial-thumbnail">
                                    <img src="./img/bg-img/8.jpg" alt="">
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-content">
                                    <h4>“Le Protocole et Guide de l'Accompagnateur est un recueil des procédures à mettre en oeuvre pendant les rassemblements et les consignes aidant les encadreurs dans leur tâches d'accomapgnement”</h4>
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
                                        <h5>Le Protocole et Le Guide de l'Accompagnateur <span>- 700FCFA</span></h5>
                                    </div>
                                    <!-- Quote Icon -->
                                    <div class="quote-icon"><img src="img/core-img/quote.png" alt=""></div>
                                </div>
                            </div>

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide d-flex align-items-center">
                                <!-- Testimonial Thumbnail -->
                                <div class="testimonial-thumbnail">
                                    <img src="./img/bg-img/9.jpg" alt="">
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-content">
                                    <h4>“Le Guide du Jeciste et Les Résolutions du Conseil National renferme d'une part les formations pour les membres et d'autre part toutes les décisions du dernier Conseil National.”</h4>
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
                                        <h5>Le Guide du Jeciste et Les Résolutions du Conseil National<span>- 1000FCFA</span></h5>
                                    </div>
                                    <!-- Quote Icon -->
                                    <div class="quote-icon"><img src="img/core-img/quote.png" alt=""></div>
                                </div>
                            </div>

                            <!-- Single Testimonial Slide -->
                            <div class="single-testimonial-slide d-flex align-items-center">
                                <!-- Testimonial Thumbnail -->
                                <div class="testimonial-thumbnail">
                                    <img src="./img/bg-img/10.jpg" alt="">
                                </div>
                                <!-- Testimonial Content -->
                                <div class="testimonial-content">
                                    <h4>“Les sentiers de la JEC contient l'histoire de la JEC de Côte d'Ivoire et les formations élémentaire pour les membres en général et les reponsables en particulier.”</h4>
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
                                        <h5>Les sentiers de la JEC <span>- 700FCFA</span></h5>
                                    </div>
                                    <!-- Quote Icon -->
                                    <div class="quote-icon"><img src="img/core-img/quote.png" alt=""></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client Feedback Area End -->

        <!-- Border -->
        <div class="container">
            <div class="border-line"></div>
        </div>

        <!-- Background Curve -->
        <div class="portfolio-bg-curve">
            <img src="./img/core-img/curve-3.png" alt="">
        </div>
    </section>
    <!-- ***** Portfolio Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="uza-blog-area">
        <!-- Background Curve -->
        <div class="blog-bg-curve">
            <img src="./img/core-img/curve-4.png" alt="">
        </div>

        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Blog</h2>
                        <p>L'actualité de la JEC de Côte d'Ivoire</p>
                    </div>
                </div>
            </div>

            <div class="row">

            <?php
            while($article = mysqli_fetch_assoc($result_article1))
            {
                echo'<div class="col-12 col-lg-4">
                        <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/blog-img/'.$article["photo1_art"].');">
                            <!-- Post Content -->
                            <div class="post-content">
                                <span class="post-date"><span>'.substr($article["date_art"],8,2).'</span> '.$article["mois"].' '.substr($article["date_art"],0,4).'</span>
                                <a href="blog-details.php?article='.$article["id_art"].'" class="post-title">'.$article["titre_art"].'</a>
                                <p>'.substr($article["cont1_art"],0,70).'...</p>
                                <a href="blog-details.php?article='.$article["id_art"].'" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                            </div>
                        </div>
                    </div>';
            }
            ?>

            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->

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
                        <form action="admin/src/control/membre.php" method="post">
                            <input type="email" name="nl-email" value="" placeholder="Votre e-mail" required>
                            <button type="submit" name="btn-abonne">S'abonner</button>
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