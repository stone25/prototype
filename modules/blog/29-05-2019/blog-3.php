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
                                <li class="breadcrumb-item active" aria-current="page">CHRISTUS VIVIT</li>
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
                                        <a href="#" class="post-date"><span>25</span> Mars 2019</a>
                                        <h2>EXHORTATION APOSTOLIQUE POUR LES JEUNES</h2>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <center>
                                        <img src="img/blog-img/3.jpg" alt="">
                                    </center>
                                </div>
                                <div class="col-12 col-lg-10">
                                    <p>Il vit, le Christ, notre espérance et il est la plus belle jeunesse de ce monde. Tout ce qu’il touche devient jeune, devient nouveau, se remplit de vie. Les premières paroles que je voudrais adresser à chacun des jeunes chrétiens sont donc : Il vit et il te veut vivant !</p>
                                    <p>Il est en toi, il est avec toi et jamais ne t’abandonne. Tu as beau t’éloigner, le Ressuscité est là, t’appelant et t’attendant pour recommencer. Quand tu te sens vieilli par la tristesse, les rancœurs, les peurs, les doutes ou les échecs, il sera toujours là pour te redonner force et espérance.</p>
                                    <p>A vous tous, jeunes chrétiens, j’écris avec affection cette Exhortation apostolique, c’est-à-dire une lettre qui rappelle certaines convictions de foi et qui, en même temps, encourage à grandir en sainteté et dans l’engagement de sa propre vocation. Mais étant donné qu’il s’agit d’une balise sur un chemin synodal, je m’adresse en même temps à tout le peuple de Dieu, à ses pasteurs et à ses fidèles, car la réflexion sur les jeunes et pour les jeunes nous interpelle et nous stimule tous. Par conséquent, dans certains paragraphes, je m’adresserai directement aux jeunes et, dans d’autres, je ferai des approches plus générales pour le discernement ecclésial.</p>
                                    <p>Je me suis laissé inspirer par la richesse des réflexions et des échanges du Synode de l’année passée. Je ne pourrai pas présenter ici toutes les contributions, que vous pourrez lire dans le Document final, mais j’ai essayé d’inclure dans la rédaction de cette lettre les propositions qui m’ont paru les plus significatives. Ainsi, ma parole sera chargée de mille voix de croyants du monde entier qui ont fait parvenir leurs opinions au Synode. Même les jeunes non croyants, qui ont voulu y prendre part par leurs réflexions, ont soulevé des questions qui ont suscité en moi de nouvelles interrogations.</p>
                                    
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>QUE DIT LA PAROLE DE DIEU SUR LES JEUNES ?</h5>
                                        </div>
                                    </blockquote>
                                    <p>Recueillons certains trésors des Saintes Écritures, où, à plusieurs reprises, on parle des jeunes et de la façon dont le Seigneur va à leur rencontre.</p>
                                    <p><b>Dans l’Ancien Testament</b></p>
                                    <p>A une époque où les jeunes comptaient peu, certains textes montrent que Dieu a sur eux un autre regard. Par exemple, nous voyons que Joseph était presque le plus jeune de la famille (cf. Gn 37, 2-3). Toutefois, Dieu lui communiquait de grandes choses en rêve et il a dépassé tous ses frères dans les tâches importantes lorsqu’il avait environ vingt ans (cf. Gn 37-47).</p>
                                    <p>En Gédéon, nous reconnaissons la sincérité des jeunes, qui n’ont pas l’habitude d’édulcorer la réalité. Quand on lui a annoncé que le Seigneur était avec lui, il a répondu : « Si Yahvé est avec nous, d'où vient tout ce qui nous arrive ? » (Jg 6, 13). Mais Dieu ne s’est pas senti offensé par ce reproche et a doublé la mise pour lui : « Va avec la force qui t'anime et tu sauveras Israël » (Jg 6, 14). </p>
                                    <p>Samuel était un jeune peu sûr de lui-même, mais le Seigneur parlait avec lui. Sur le conseil d’un adulte, il a ouvert son cœur pour écouter l’appel de Dieu : « Parle, Seigneur, car ton serviteur écoute » (1 S 3, 9-10). C’est pourquoi il a été un grand prophète qui est intervenu en des moments importants pour sa patrie. Le roi Saül, lui aussi, était jeune quand le Seigneur l’a appelé à accomplir sa mission (cf. 1 S 9, 2).</p>
                                    <p>Le roi David a été choisi alors qu’il était un jeune garçon. Quand le prophète Samuel était à la recherche du futur roi d’Israël, un homme lui a présenté comme candidats ses enfants aînés et les plus expérimentés. Mais le prophète a fait savoir que l’élu était le jeune David qui gardait les brebis (cf. 1 S 16, 6-13), car « l'homme regarde à l'apparence, mais le Seigneur regarde au cœur » (v. 7). La gloire de la jeunesse était plus dans le cœur que dans la force physique ou dans l’impression que l’on donne aux autres.</p>
                                    <p>Salomon, quand il a dû succéder à son père, s’est senti perdu et a dit à Dieu : « Moi, je suis un tout jeune homme, je ne sais pas agir en chef » (1 R 3, 7). Cependant, l’audace de la jeunesse l’a amené à demander à Dieu la sagesse et il s’est consacré à sa mission. Quelque chose de semblable est arrivé au prophète Jérémie appelé, alors qu’il était très jeune, à réveiller son peuple. Dans son désarroi, il a dit : « Ah! Seigneur, vraiment, je ne sais pas parler, car je suis un enfant ! » (Jr 1, 6). Mais le Seigneur lui a demandé de ne pas dire cela (cf. Jr 1, 7), et il a ajouté : « N'aie aucune crainte en leur présence car je suis avec toi pour te délivrer » (Jr 1, 8). Le dévouement du prophète Jérémie dans sa mission montre ce qui est possible si le courage de la jeunesse s’allie à la force de Dieu.</p>
                                    <p>Une jeune juive, qui était au service du soldat étranger Naman, est intervenue avec foi pour l’aider à se soigner de sa maladie (cf. 2 R 5, 2-6). La jeune Ruth a été un exemple de générosité en restant avec sa belle-mère tombée en disgrâce (cf. Rt 1, 1-18), et elle a montré également son audace en allant de l’avant dans la vie (cf. Rt 4, 1-17).</p>
                                    <p><b>Dans le nouveau Testament</b></p>
                                    <p>Une parabole de Jésus (cf. Lc 15, 11-32) raconte que le “plus jeune” fils a voulu partir de la maison paternelle pour un pays lointain (cf. vv. 12.13). Mais ses rêves d’autonomie se sont transformés en libertinage et en débauche (cf. vv. 12-13) et il a éprouvé la rigueur de la solitude et de la pauvreté (cf. vv. 14-16). Toutefois, il a su se reprendre pour un nouveau départ (cf. vv. 17-19) et il a décidé de se lever (cf. v. 20).  C’est la caractéristique du cœur jeune d’être disponible au changement, d’être capable de se relever et de se laisser instruire par la vie. Comment ne pas accompagner le fils dans cette nouvelle tentative ? Mais le frère aîné avait déjà le cœur vieilli et il s’est laissé posséder par l’avidité, l’égoïsme et l’envie (cf. vv. 28-30). Jésus fait plus l’éloge du jeune pécheur qui retrouve le bon chemin que l’éloge de celui qui se croit fidèle mais ne vit pas l’esprit d’amour et de miséricorde.</p>
                                    <p>Jésus, l’éternel jeune, veut nous faire don d’un cœur toujours jeune. La Parole de Dieu nous demande : « Purifiez-vous du vieux levain pour être une pâte nouvelle » (1 Co 5, 7). Elle nous invite en même temps à nous dépouiller du “vieil homme” pour revêtir l’homme “nouveau” (cf. Col 3, 9.10).[1]  Et quand elle explique ce que signifie se revêtir de cette jeunesse qui se renouvelle (cf. v.10), elle affirme qu’il s’agit de revêtir « des sentiments de tendre compassion, de bienveillance, d'humilité, de douceur, de patience, et de se supporter les uns les autres en se pardonnant mutuellement » (Col 3, 12-13). Cela signifie que la vraie jeunesse, c’est avoir un cœur capable d’aimer. En revanche, ce qui vieillit l’âme, c’est tout ce qui nous sépare des autres. Mais elle conclut ainsi : « Par-dessus tout, ayez la charité, en laquelle se noue la perfection » (Col 3, 14).</p>
                                    <p>Remarquons que Jésus n’appréciait pas que les personnes adultes regardent avec mépris les plus jeunes ou les maintiennent à leur service de manière despotique. Au contraire, il demandait : « Que le plus grand parmi vous se comporte comme le plus jeune, et celui qui gouverne comme celui qui sert » (Lc 22, 26). Pour lui, l’âge n’établissait pas de privilèges, et le fait que quelqu’un soit moins âgé ne signifiait pas qu’il valait moins ou qu’il avait moins de dignité.</p>
                                    <p>La Parole de Dieu dit qu’il faut traiter les jeunes gens « comme des frères » (1 Tm 5, 1), et elle recommande aux parents : « N’exaspérez pas vos enfants, de peur qu’ils ne se découragent » (Col 3, 21). Un jeune ne peut pas se décourager, il doit rêver de grandes choses, chercher de larges horizons, aspirer à plus, vouloir conquérir le monde, être capable d’accepter des propositions provocantes et souhaiter apporter le meilleur de lui-même pour construire quelque chose de meilleur. Voilà pourquoi j’invite avec insistance les jeunes à ne pas se laisser dérober l’espérance, et je répète à chacun : « Que personne ne méprise ton jeune âge » (1 Tm 4, 12).</p>
                                    <p>Cependant, en même temps, il est recommandé aux jeunes : « Soyez soumis aux anciens (1 P 5, 5). La Bible invite toujours à un profond respect envers les anciens, car ils possèdent un trésor d’expérience, ont connu les succès et les échecs, les joies et les grandes angoisses de la vie, les illusions et les déceptions, et ils gardent, dans le silence de leur cœur, beaucoup d’histoires qui peuvent nous aider à ne pas nous tromper ni nous laisser entraîner par de faux mirages. La parole d’un aîné sage invite à respecter certaines limites et à savoir se dominer au bon moment : « Exhorte également les jeunes gens à garder en tout la pondération » (Tt2, 6). Il ne convient pas de tomber dans un culte de la jeunesse, ou dans une attitude juvénile qui méprise les autres à cause de leur âge, ou parce qu’ils sont d’une autre époque. Jésus disait que la personne sage est capable de tirer de son trésor aussi bien du nouveau que du vieux (cf. Mt 13, 52).  Un jeune sage s’ouvre à l’avenir, mais il est toujours capable de recueillir quelque chose de l’expérience des autres.</p>
                                    <p>Dans l’Evangile de Marc, apparaît une personne qui, lorsque Jésus lui rappelle les commandements, dit : « Tout cela, je l'ai observé dès ma jeunesse » (10, 20). Le psalmiste l’affirmait déjà : « Car c'est toi mon espoir, Seigneur, […] ma foi dès ma jeunesse. […] Tu m'as instruit dès ma jeunesse, et jusqu'ici j'annonce tes merveilles » (71, 5.17). Il ne faut pas regretter de passer sa jeunesse en étant bon, en ouvrant son cœur au Seigneur, en vivant d’une autre manière. Rien de tout cela ne nous ôte la jeunesse mais plutôt la renforce et la renouvelle : « Ta jeunesse se renouvelle comme celle de l’aigle » (Ps 103, 5). C’est pourquoi saint Augustin déplorait : « Je t'ai aimée bien tard, Beauté si ancienne et si nouvelle, je t'ai aimée bien tard ! ».[2]  Mais cet homme riche, qui avait été fidèle à Dieu dans sa jeunesse, a laissé le temps lui ôter les rêves et a préféré continuer à s’attacher à ses biens (cf. Mc10, 22). </p>
                                    <p>En revanche, dans l’Evangile de Matthieu, se présente un jeune (cf. 19, 20.22) qui s’approche de Jésus pour lui demander davantage (cf. v. 20), avec cet esprit ouvert propre aux jeunes en recherche de nouveaux horizons et de grands défis. En réalité, son esprit n’était pas si jeune, car il était attaché aux richesses et au confort. Il disait en paroles qu’il voulait quelque chose de plus, mais quand Jésus lui a demandé d’être généreux et de partager ses biens, il s’est rendu compte qu’il était incapable de se dépouiller de ce qu’il possédait. En fin de compte, en « entendant cette parole, le jeune homme s'en alla contristé, car il avait de grands biens » (v. 22). Il avait renoncé à sa jeunesse.</p>
                                    <p>L’Evangile nous parle également de quelques jeunes filles prudentes, qui étaient vigilantes et attentives, tandis que d’autres étaient distraites et endormies (cf. Mt 25, 1-13). En effet, on peut passer sa jeunesse en étant distrait, en vivant superficiellement, endormi, incapable de cultiver des relations profondes et d’entrer au cœur de la vie. On prépare ainsi un avenir pauvre, sans substance. Ou bien on peut passer sa jeunesse à cultiver de belles et grandes choses, et ainsi on prépare un avenir rempli de vie et de richesse intérieure.</p>
                                    <p>Si tu as perdu la vigueur intérieure, les rêves, l’enthousiasme, l’espérance et la générosité, Jésus se présente à toi comme il l’a fait pour l’enfant mort de la veuve, et avec toute sa puissance de Ressuscité le Seigneur t’exhorte : « Jeune homme, je te le dis, lève-toi » (Lc 7, 14).</p>
                                    <p>Il y a sans doute beaucoup d’autres textes de la Parole de Dieu qui peuvent nous éclairer sur cette étape de la vie. Nous recueillerons certains d’entre eux dans les prochains chapitres.</p>
                                    <p><b>François</b></p>
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