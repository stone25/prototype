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
                                <li class="breadcrumb-item active" aria-current="page">La méditation</li>
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
                                        <a href="#" class="post-date"><span>2</span> Avril 2019</a>
                                        <h2>Comment méditer?</h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <center>
                                        <img src="img/blog-img/5.jpg" alt="">
                                    </center>
                                </div>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <p>Les pratiques de méditation, revenues en Occident par le biais des religions orientales, correspondent aussi à une tradition chrétienne très ancienne, notamment dans la vie monastique.</p>
                                    <p>L’assemblée est assise sur des chaises ou des bancs de prière, dos droit et tête haute, les yeux mi-clos, immobile. Pas un mot ne s’échappe de leur bouche. Pourtant, chacun articule intérieurement les mêmes quatre syllabes. « Ma-ra-na-tha ». « Viens, Seigneur », en araméen. C’est le « mot de prière » conseillé par le P. John Main (1926-1982).</p>
                                    <p>La pensée de ce moine bénédictin, fondateur en 1975 à Londres du Centre de méditation chrétienne, irrigue la Communauté mondiale des méditants chrétiens (CMMC), créée en 1991 pour, disent-ils, « œuvrer à la redécouverte de la dimension contemplative au sein de l’Église ».</p>
                                    <p>Dans ses enseignements, le moine prescrit deux temps de méditation par jour. Une demi-heure, idéalement le matin avant le petit-déjeuner, et le soir, avant le repas. Cette prière contemplative repose sur la répétition incessante d’un « mantra », (« Maranatha », « Jésus », « Kyrie Eleison », etc.).</p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>Préserver le plus possible ce cœur à cœur avec Dieu</h5>
                                        </div>
                                    </blockquote>
                                    <p>« Le mot s’apparente au bâton qui permet de soutenir le méditant dans son pèlerinage de la tête au cœur, explique Catherine Charrière, oblate bénédictine de la communauté. C’est un chemin de pauvreté et de dépouillement, une mise à nu devant Dieu. » La répétition métronomique, écrit le P. John Main, permet « d’amener le mental à faire silence et à descendre dans le cœur profond, afin de permettre à la présence mystérieuse de Dieu en nous de devenir Réalité ».</p>
                                    <p>Les pratiquants ne sont pas en recherche d’une expérience mystique. La plupart en tirent un « apaisement », comme Marie. « J’aime comparer la méditation à cet épisode de l’Odyssée, lorsque Ulysse s’enchaîne au mât de son navire pour ne pas céder au chant des sirènes, explique ce cadre en ressources humaines. La méditation est mon mât et m’aide à résister aux sirènes de l’ego. »</p>
                                    <p>Bien sûr, la méditation n’est pas un exercice aisé. Même après de nombreuses années d’expérience, l’esprit vagabonde. « Certains jours, c’est une bagarre, comme le curé d’Ars avec ses démons, témoigne Martine. L’important est de ne pas s’accrocher à quelque idée bonne ou mauvaise, de garder le cap, en préservant le plus possible ce cœur à cœur avec Dieu », poursuit cette journaliste, qui prolonge chaque méditation par un temps de prière.</p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>La méditation engendre les fruits de l’Esprit</h5>
                                        </div>
                                    </blockquote>
                                    <p>« La méditation ne nous éloigne pas de notre foi, insiste Dominique Lablanche, coordinateur en France de la communauté. Bien au contraire, elle nous permet d’approfondir notre ancrage dans le christianisme, de découvrir un Christ plus intérieur. »</p>
                                    <p>Pour certains, en revanche, la méditation est un chemin de retour vers la tradition chrétienne, voire vers l’Église. « Elle développe le souci de mieux comprendre les Écritures, de redécouvrir la prière », relève le P. Laurence Freeman, moine bénédictin olivetain, directeur spirituel de la CMMC.</p>
                                    <p>Pour lui, les effets de la méditation sont à rechercher dans « la relation avec nous-même, avec les autres et avec Dieu. Elle engendre les fruits de l’Esprit tels que les décrit saint Paul : amour, joie, paix, patience, bonté, bienveillance, foi, humilité et maîtrise de soi », développe l’auteur d’un livre à deux voix avec le dalaï-lama.</p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>« Une relation à la Parole dans le silence »</h5>
                                        </div>
                                    </blockquote>
                                    <p>De fait, la pratique de la méditation a fait son retour avec l’influence des traditions orientales. « Elle a recommencé à intéresser les laïcs chrétiens au cours des années 1980 », résume le P. Bernard Durel, moine dominicain rattaché au couvent de Strasbourg, animateur depuis trente ans de sessions de méditation dans l’esprit du zen. Lui-même inscrit ses pas dans ceux du philosophe allemand Karlfried Graf Durckheim.</p>
                                    <p>D’autres s’inspirent du P. Thomas Keating, père trappiste américain organisateur de retraites au cours desquelles est pratiquée la « centering prayer » (centrage par la prière). Et le premier groupe lié à la CMMC est né en 1997 au Forum 104, centre de dialogue entre les cultures et les spiritualités des Maristes, à Paris.</p>
                                    <p>« Certains, comme moi, sont entrés dans le zen, poursuit le P. Durel. D’autres ont redécouvert la prière du cœur orthodoxe. » Pour autant, aucun syncrétisme ici. « On devrait ici parler de méditation sans objet, qui est une relation à la Parole dans le silence. C’est une expérience contemplative qui n’est pas une sortie de l’univers chrétien, mais qui en est la pointe ultime. »</p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>Avec Vatican II, la prière contemplative a été valorisée</h5>
                                        </div>
                                    </blockquote>
                                    <p>Même discours chez le théologien orthodoxe Bertrand Vergely, conférencier d’un jour auprès de la CMMC. « La pratique de la méditation peut susciter un rejet de la part d’un certain nombre de chrétiens critiquant je ne sais quel syncrétisme religieux, voire un dévoiement du christianisme. Or la méditation n’est pas un ajout mais, bien au contraire, un élément fondamental du christianisme, une vieille pratique des Pères du Désert qui se mettaient dans un état de présence et d’attention continuelle à travers la prière intérieure. »</p>
                                    <p>Comme Jean Cassien (IVe siècle), dont se réclame la CMMC, qui introduit dans sa dixième Conférence sur la prière la répétition continuelle et silencieuse d’un même mot. Hormis au sein des communautés monastiques, cette pratique s’était pourtant perdue au sein de l’Église occidentale.</p>
                                    <p>« Au lendemain de la Réforme, la méditation paraissait trop catholique pour les protestants, et les catholiques se méfiaient d’une expérience trop individuelle de la foi, estime le P. Laurence Freeman. Ce n’est qu’avec le concile Vatican II que la prière contemplative a de nouveau été valorisée. »« La méditation n’est plus un effet de mode »</p>
                                    <p>En paroisse, les méditants hésitent encore à évoquer cette expérience, source de perplexité. Mais la CMMC continue de se renforcer. Elle compte aujourd’hui 2000 groupes, répartis dans 67 pays, dont 20 groupes en France, où quelques milliers de personnes la pratiqueraient.</p>
                                    <p>Pour le P. Laurence Freeman, « jamais dans l’histoire il n’y a eu autant de personnes pratiquant la méditation, de manière consciente et disciplinée ». Si aucun rapport officiel n’a encore été établi avec la conférence épiscopale de France, le cardinal Philippe Barbarin, archevêque de Lyon, s’était rendu l’an passé à la première rencontre francophone de la communauté (la deuxième s’est tenue à la mi-janvier à Valpré). Le P. Bernard Durel estime que « la méditation n’est plus un effet de mode. De bons chrétiens, bien dans l’Église, respectueux des sacrements, ont adopté cette forme de prière contemplative. »</p>
                                    <p><b>Bénévent TOSSERI, à Écully (Rhône)</b></p>
                                    <p>source : www.la-croix.com</p>
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
                                                        <a href="blog-2.php" class="post-title">Message du Pape François Carême 2019</a>
                                                        <p>«La création attend avec impatience la révélation des fils de Dieu» (Rm 8,19)...</p>
                                                        <a href="blog-2.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="single-blog-post bg-img mb-50" style="background-image: url(./img/blog-img/3.jpg);">
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <span class="post-date"><span>25</span> Mars 2019</span>
                                                        <a href="blog-3.php" class="post-title">Exhortation apostolique pour les jeunes</a>
                                                        <p>Il vit, le Christ, notre espérance et il est la plus belle jeunesse de ce monde. Tout...</p>
                                                        <a href="blog-3.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
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