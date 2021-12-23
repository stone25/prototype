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
                                <li class="breadcrumb-item active" aria-current="page">Message du Pape François Carême 2019</li>
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
                                        <a href="#" class="post-date"><span>6</span> Mars 2019</a>
                                        <h2>Carême 2019: Message du Pape François</h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <img class="mb-50" src="img/blog-img/2.jpg" alt="">
                                </div>
                                <div class="col-12 col-lg-10">
                                    <p>Chers frères et sœurs,</p>
                                    <p>Chaque année, Dieu, avec le secours de notre Mère l’Eglise, « accorde aux chrétiens de se préparer aux fêtes pascales dans la joie d’un cœur purifié » (Préface de Carême 1) pour qu’ils puissent puiser aux mystères de la rédemption, la plénitude offerte par la vie nouvelle dans le Christ. Ainsi nous pourrons cheminer de Pâques en Pâques jusqu’à la plénitude du salut que nous avons déjà reçue grâce au mystère pascal du Christ : « Car nous avons été sauvés, mais c’est en espérance » (Rm 8,24). Ce mystère de salut, déjà à l’œuvre en nous en cette vie terrestre, se présente comme un processus dynamique qui embrasse également l’Histoire et la création tout entière. Saint Paul le dit : « La création attend avec impatience la révélation des fils de Dieu » (Rm8,19). C’est dans cette perspective que je souhaiterais offrir quelques points de réflexion pour accompagner notre chemin de conversion pendant le prochain carême.</p>
                                    <p><b>1. La rédemption de la Création</b></p>
                                    <p>La célébration du Triduum pascal de la passion, mort et résurrection du Christ, sommet de l’année liturgique, nous appelle, chaque fois, à nous engager sur un chemin de préparation, conscients que notre conformation au Christ (cf. Rm 8,29) est un don inestimable de la miséricorde de Dieu.</p>
                                    <p>Si l’homme vit comme fils de Dieu, s’il vit comme une personne sauvée qui se laisse guider par l’Esprit Saint (cf. Rm 8,14) et sait reconnaître et mettre en œuvre la loi de Dieu, en commençant par celle qui est inscrite en son cœur et dans la nature, alors il fait également du bien à la Création, en coopérant à sa rédemption. C’est pourquoi la création, nous dit Saint Paul, a comme un désir ardent que les fils de Dieu se manifestent, à savoir que ceux qui jouissent de la grâce du mystère pascal de Jésus vivent pleinement de ses fruits, lesquels sont destinés à atteindre leur pleine maturation dans la rédemption du corps humain. Quand la charité du Christ transfigure la vie des saints – esprit, âme et corps –, ceux-ci deviennent une louange à Dieu et, par la prière, la contemplation et l’art, ils intègrent aussi toutes les autres créatures, comme le confesse admirablement le « Cantique des créatures » de saint François d’Assise (cf. Enc. Laudato Sì, n. 87). En ce monde, cependant, l’harmonie produite par la rédemption, est encore et toujours menacée par la force négative du péché et de la mort.</p>

                                    <p><b>2. La force destructrice du péché</b></p>
                                    <p>En effet, lorsque nous ne vivons pas en tant que fils de Dieu, nous mettons souvent en acte des comportements destructeurs envers le prochain et les autres créatures, mais également envers nous-mêmes, en considérant plus ou moins consciemment que nous pouvons les utiliser selon notre bon plaisir. L’intempérance prend alors le dessus et nous conduit à un style de vie qui viole les limites que notre condition humaine et la nature nous demandent de respecter. Nous suivons alors des désirs incontrôlés que le Livre de la Sagesse attribue aux impies, c’est-à-dire à ceux qui n’ont pas Dieu comme référence dans leur agir, et sont dépourvus d’espérance pour l’avenir (cf. 2,1-11). Si nous ne tendons pas continuellement vers la Pâque, vers l’horizon de la Résurrection, il devient clair que la logique du « tout et tout de suite », du « posséder toujours davantage » finit par s’imposer.</p>
                                    <p>La cause de tous les maux, nous le savons, est le péché qui, depuis son apparition au milieu des hommes, a brisé la communion avec Dieu, avec les autres et avec la création à laquelle nous sommes liés avant tout à travers notre corps. La rupture de cette communion avec Dieu a également détérioré les rapports harmonieux entre les êtres humains et l’environnement où ils sont appelés à vivre, de sorte que le jardin s’est transformé en un désert (cf. Gn 3,17-18). Il s’agit là du péché qui pousse l’homme à se tenir pour le dieu de la création, à s’en considérer le chef absolu et à en user non pas pour la finalité voulue par le Créateur mais pour son propre intérêt, au détriment des créatures et des autres.</p>
                                    <p>Quand on abandonne la loi de Dieu, la loi de l’amour, c’est la loi du plus fort sur le plus faible qui finit par s’imposer. Le péché qui habite dans le cœur de l’homme (cf. Mc 7, 20-23) – et se manifeste sous les traits de l’avidité, du désir véhément pour le bien-être excessif, du désintérêt pour le bien d’autrui, et même souvent pour le bien propre – conduit à l’exploitation de la création, des personnes et de l’environnement, sous la motion de cette cupidité insatiable qui considère tout désir comme un droit, et qui tôt ou tard, finira par détruire même celui qui se laisse dominer par elle.</p>
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>“La création attend avec impatience la révélation des fils de Dieu”</h5>
                                            <h6>– Rm 8,19</h6>
                                        </div>
                                    </blockquote>
                                    <p><b>3. La force de guérison du repentir et du pardon</b></p>
                                    <p>C’est pourquoi la création a un urgent besoin que se révèlent les fils de Dieu, ceux qui sont devenus “une nouvelle création” : « Si donc quelqu’un est dans le Christ, il est une créature nouvelle. Le monde ancien s’en est allé, un monde nouveau est déjà né » (2 Co 5,17). En effet, grâce à leur manifestation, la création peut elle aussi « vivre » la Pâque : s’ouvrir aux cieux nouveaux et à la terre nouvelle (cf. Ap 21,1). Le chemin vers Pâques nous appelle justement à renouveler notre visage et notre cœur de chrétiens à travers le repentir, la conversion et le pardon afin de pouvoir vivre toute la richesse de la grâce du mystère pascal.</p>
                                    <p>Cette “impatience ”, cette attente de la création, s’achèvera lors de la manifestation des fils de Dieu, à savoir quand les chrétiens et tous les hommes entreront de façon décisive dans ce “labeur” qu’est la conversion. Toute la création est appelée, avec nous, à sortir « de l’esclavage de la dégradation, pour connaître la liberté de la gloire donnée aux enfants de Dieu » (Rm 8,21). Le carême est un signe sacramentel de cette conversion. Elle appelle les chrétiens à incarner de façon plus intense et concrète le mystère pascal dans leur vie personnelle, familiale et sociale en particulier en pratiquant le jeûne, la prière et l’aumône.</p>
                                    <p>Jeûner, c’est-à-dire apprendre à changer d’attitude à l’égard des autres et des créatures : de la tentation de tout “ dévorer” pour assouvir notre cupidité, à la capacité de souffrir par amour, laquelle est capable de combler le vide de notre cœur. Prier afin de savoir renoncer à l’idolâtrie et à l’autosuffisance de notre moi, et reconnaître qu’on a besoin du Seigneur et de sa miséricorde.Pratiquer l’aumône pour se libérer de la sottise de vivre en accumulant toute chose pour soi dans l’illusion de s’assurer un avenir qui ne nous appartient pas. Il s’agit ainsi de retrouver la joie du dessein de Dieu sur la création et sur notre cœur, celui de L’aimer, d’aimer nos frères et le monde entier, et de trouver dans cet amour le vrai bonheur.</p>
                                    <p>Chers frères et sœurs, le « carême » du Fils de Dieu a consisté à entrer dans le désert de la création pour qu’il redevienne le jardin de la communion avec Dieu, celui qui existait avant le péché originel (cf. Mc 1,12-13 ; Is 51,3). Que notre Carême puisse reparcourir le même chemin pour porter aussi l’espérance du Christ à la création, afin qu’« elle aussi, libérée de l’esclavage de la dégradation, puisse connaître la liberté de la gloire donnée aux enfants de Dieu » (cf. Rm 8,21). Ne laissons pas passer en vain ce temps favorable ! Demandons à Dieu de nous aider à mettre en œuvre un chemin de vraie conversion. Abandonnons l’égoïsme, le regard centré sur nous-mêmes et tournons-nous vers la Pâque de Jésus : faisons-nous proches de nos frères et sœurs en difficulté en partageant avec eux nos biens spirituels et matériels. Ainsi, en accueillant dans le concret de notre vie la victoire du Christ sur le péché et sur la mort, nous attirerons également sur la création sa force transformante.</p>
                                    <p>Du Vatican, le 4 octobre 2018 Fête de Saint François d’Assise. <br>FRANÇOIS</p>
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
                                            <div class="col-12 col-lg-6">
                                                <div class="single-blog-post bg-img mb-50" style="background-image: url(./img/blog-img/5.jpg);">
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