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
                                <li class="breadcrumb-item active" aria-current="page">Journée internationale des droits de la femme</li>
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
                                        <a href="#" class="post-date"><span>8</span> Mars 2019</a>
                                        <h2>Journée internationale des droits de la femme</h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <img class="mb-50" src="img/blog-img/4.jpg" alt="">
                                </div>
                                <div class="col-12 col-lg-10">
                                    <p>DECLARATION DE LA JEC-CI A L’OCCASION DE LA JOURNEE INTERNATIONALE DE LA FEMME.</p>
                                    <p>Célébrée le 8 mars chaque année, la Journée Internationale des Droits des Femmes a pour but de susciter la réflexion sur les conditions des femmes dans le monde et de lutter contre les inégalités ; vu que cette célébration mémorable tire son origine d’un contexte de lutte des femmes au début du XXe siècle pour acquérir des droits déjà accordés aux hommes et de meilleures conditions de travail.</p>
                                    <p>C’est à juste titre, dans la saine perspective de favoriser l’autonomie de la femme, que la Jeunesse Etudiante Catholique, accorde toujours une place prépondérante à la promotion de la femme. Plusieurs lucarnes sont trouvées afin d’accomplir ce dessein commun de valorisation de la femme ; dessein faisant l’objet de cette célébration. Initialement, si cette commémoration avait été instituée pour permettre aux femmes d’avoir le droit de vote, de pouvoir occuper des postes, de travailler et d’avoir une formation professionnelle, il parait important de noter les avancées considérables de la JEC-CI à ce niveau. En effet, nonobstant les efforts à consentir davantage, nous sommes parvenus à favoriser l’intégration des filles et leur accession à certains postes de responsabilité. Selon les dernières statistiques reçues et consolidées au plan national, sur trois cent quarante huit (348) sections, quatre-vingt-sept (87) filles sont responsables d’instances et quatre cent treize (413) restent membres de bureau ; résultats pas encore définitifs pour le compte de cette année 2019. Aussi est-il utile de rappeler que la promotion du genre féminin dans notre mouvement se matérialise à travers la tenue des activités filles dans chaque instance sur les thèmes de leadership, de l’autonomisation, l’entrepreneuriat, l’éducation et la santé. Visiblement, ces activités permettront d’établir un juste équilibre entre les genres. Subséquemment, le projet de la mise en place d’une base de données, d’anciennes jécistes battantes, leaders et émancipées permettra de sensibiliser nos filles aux droits et devoirs des femmes en leur présentant des modèles intègres et dignes.</p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>“Être une femme ne suffit pas de nos jours, il faut être une femme capable de répousser les limites de sa féminité et accomplir des exploits au même titre qu'un homme.”</h5>
                                            <h6>– Mme Constance GODE épouse KOUAKOU</h6>
                                        </div>
                                    </blockquote>
                                    <p>Conjointement, cette année, pour ne point rester en marge du thème : « Penser équitablement, bâtir intelligemment, innover pour le changement », proposé par les Nations Unies, de par la vibrante déclaration de Phumzile Mlambo-Ngcuka, Sous-Secrétaire générale des Nations Unies et Directrice exécutive d’ONU Femmes, le 06 mars 2019, l’Etat de Côte d’Ivoire a bien voulu placé cette journée sous le leitmotiv suivant : « Le numérique, une solution pour l’autonomisation des femmes ».</p>
                                    <p>Ce jour est donc pour nous, en plus des activités déjà menées, le moment privilégié pour inciter toutes les jeunes filles, membres de la JEC-CI, en particulier, à s’intéresser résolument au numérique et à utiliser cet atout de notre ère pour multiplier les messages visant à promouvoir l’autonomisation des femmes, l’égalité, les droits et devoirs des personnes, sans discrimination aucune ; ceci pour déstabiliser ces schèmes de pensées ou intentions malsaines visant à utiliser le numérique pour dévaloriser la femme ou la présenter comme un simple instrument. Pour dire bref, c’est un vif appel du cœur que nous lançons en ce jour de célébration aux ainées et jécistes actuelles.</p>
                                    <p>Notre mission : valoriser la femme sans créer de différence entre les personnes.</p>
                                    <p>Fait à Abidjan, le 8 Mars 2019 <br>Pour la JEC-CI <br>Céline SEBEGO <br>Secrétaire Générale Adjointe chargée de la mobilisation des filles.</p>
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
                                            <div class="col-12 col-lg-6">
                                                <div class="single-blog-post bg-img mb-50" style="background-image: url(./img/blog-img/2.jpg);">
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <span class="post-date"><span>6</span> Mars 2019</span>
                                                        <a href="#" class="post-title">Message du Pape François Carême 2019</a>
                                                        <p>«La création attend avec impatience la révélation des fils de Dieu» (Rm 8,19)...</p>
                                                        <a href="blog-2.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
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