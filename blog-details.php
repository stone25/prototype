<?php
session_start();
include_once('modules/src/entity/Connexion.php'); 
$menu_selected = array();
$menu_selected['blog'] = 'class="current-item"'; 
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
    $req = "update visite set nombre = nombre + 1 where page ='Blog'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $_SESSION['visite'] = true;
}

$connexion = new Connexion();
if($connexion->connecter())
{
	$query = "SELECT id_art, titre_art, cont1_art, cont2_art, cit_art, aut_art, photo1_art, photo2_art, date_art, MONTHNAME(date_art) AS mois, vue_art, stat_art, nom_user, pren_user, photo_user, fonc_user FROM article INNER JOIN blogueur ON blogueur.id_user = article.id_user WHERE id_art = $_GET[article]";
    $result_article = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion)); 
    $article = mysqli_fetch_assoc($result_article);

    $query = "SELECT id_art, titre_art, date_art, cont1_art, MONTHNAME(date_art) AS mois, photo1_art, nom_user, pren_user FROM article INNER JOIN blogueur ON blogueur.id_user = article.id_user WHERE id_art <> $_GET[article] AND stat_art = 'Visible' ORDER BY date_art LIMIT 2";
    $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion)); 
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="uza - Model Agency HTML5 Template">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $article["titre_art"] ?></li>
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

    <!-- ***** Blog Details Area Start ***** -->
    <section class="blog-details-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog-details-content">
                        <!-- Post Details Text -->
                        <div class="post-details-text">

                            <div class="row justify-content-center">
                                <div class="col-12 col-lg-10">
                                    <div class="post-content text-center mb-50">
                                        <a href="#" class="post-date"><span><?php echo substr($article["date_art"],8,2) ?></span> <?php echo $article["mois"] ?> <?php echo substr($article["date_art"],0,4) ?></a>
                                        <h2><?php echo $article["titre_art"] ?></h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <center>
                                        <img class="mb-50" src="img/blog-img/<?php echo $article["photo2_art"] ?>" alt="">
                                    </center>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <p><?php echo $article["cont1_art"] ?></p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5><?php echo $article["cit_art"] ?></h5>
                                            <h6>– <?php echo $article["aut_art"] ?></h6>
                                        </div>
                                    </blockquote>
                                    <p><?php echo $article["cont2_art"] ?></p>
                                    <!-- Post Catagories & Post Share -->
                                    <div class="d-flex align-items-center justify-content-between">
                                        <!-- Post Share -->
                                        <div class="uza-post-share d-flex align-items-center">
                                            <h6 class="mb-0 mr-3">Partager:</h6>
                                            <div class="social-info-">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Related News Area -->
                                    <div class="related-news-area">
                                        <h2 class="mb-4">Articles récents</h2>

                                        <div class="row">
                                            <!-- Single Blog Post -->
                                            <?php
                                                while($post = mysqli_fetch_assoc($result))
                                                {
                                                    echo'<div class="col-12 col-lg-6">
                                                            <div class="single-blog-post bg-img mb-50" style="background-image: url(./img/blog-img/'.$post['photo1_art'].'">
                                                                <!-- Post Content -->
                                                                <div class="post-content">
                                                                    <span class="post-date"><span>'.substr($post['date_art'],8,2).'</span> '.$post['mois'].' '.substr($post['date_art'],0,2).'</span>
                                                                    <a href="blog-details.php?article='.$article["id_art"].'" class="post-title">'.$post['titre_art'].'</a>
                                                                    <p>'.substr($post['cont1_art'],0,50).'...</p>
                                                                    <a href="blog-details.php?article='.$article["id_art"].'" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>';
                                                }
                                                
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Details Area End ***** -->

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