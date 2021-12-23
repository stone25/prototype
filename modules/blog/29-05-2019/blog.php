<?php
session_start();
include_once('admin/src/control/connexion.php'); 
$menu_selected = array();
$menu_selected['blog'] = 'class="current-item"'; 

if(!isset($_SESSION['visite']))
{
    if($connexion)
    {
        $req = "update visite set nombre = nombre + 1 where page ='Visite'";
        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
        $_SESSION['visite'] = true;
    }
}

if($connexion)
{
    $req = "update visite set nombre = nombre + 1 where page ='Blog'";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    $_SESSION['visite'] = true;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width; initial-scale=1; shrink-to-fit=no">

    <!-- Title -->
    <title>JEC-CI - Blog</title>

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
                        <h2 class="title">Blog</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Accueil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog</li>
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

    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80">
        <div class="container">
            <div class="row">
                <!-- Single Blog Post -->
                <div class="col-12 col-lg-4">
                    <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/blog-img/1.jpg);">
                        <!-- Post Content -->
                        <div class="post-content">
                            <span class="post-date"><span>8</span> Mars 2019</span>
                            <a href="blog-1.php" class="post-title">Journée internationale de la femme</a>
                            <p>DECLARATION DE LA JEC-CI A L’OCCASION DE LA JOURNEE INTERNATIONALE DE LA FEMME...</p>
                            <a href="blog-1.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/blog-img/2.jpg);">
                        <!-- Post Content -->
                        <div class="post-content">
                            <span class="post-date"><span>6</span> Mars 2019</span>
                            <a href="blog-2.php" class="post-title">Message du Pape François Carême 2019</a>
                            <p>«La création attend avec impatience la révélation des fils de Dieu» (Rm 8,19)...</p>
                            <a href="blog-2.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/blog-img/3.jpg);">
                        <!-- Post Content -->
                        <div class="post-content">
                            <span class="post-date"><span>25</span> Mars 2019</span>
                            <a href="blog-3.php" class="post-title">Exhortation apostolique pour les jeunes</a>
                            <p>Il vit, le Christ, notre espérance et il est la plus belle jeunesse de ce monde...</p>
                            <a href="blog-3.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="single-blog-post bg-img mb-80" style="background-image: url(./img/blog-img/5.jpg);">
                        <!-- Post Content -->
                        <div class="post-content">
                            <span class="post-date"><span>2</span> Avril 2019</span>
                            <a href="blog-4.php" class="post-title">Comment méditer?</a>
                            <p>Les pratiques de méditation, revenues en Occident par le biais des religions orientales, correspondent aussi à une tradition ...</p>
                            <a href="blog-4.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!--div class="row">
                <div class="col-12 text-center">
                    <a href="#" class="btn uza-btn btn-3">Load More</a>
                </div>
            </div-->
        </div>
    </div>
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