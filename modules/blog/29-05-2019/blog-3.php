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
                                    <p>Il vit, le Christ, notre esp??rance et il est la plus belle jeunesse de ce monde. Tout ce qu???il touche devient jeune, devient nouveau, se remplit de vie. Les premi??res paroles que je voudrais adresser ?? chacun des jeunes chr??tiens sont donc : Il vit et il te veut vivant !</p>
                                    <p>Il est en toi, il est avec toi et jamais ne t???abandonne. Tu as beau t?????loigner, le Ressuscit?? est l??, t???appelant et t???attendant pour recommencer. Quand tu te sens vieilli par la tristesse, les ranc??urs, les peurs, les doutes ou les ??checs, il sera toujours l?? pour te redonner force et esp??rance.</p>
                                    <p>A vous tous, jeunes chr??tiens, j?????cris avec affection cette Exhortation apostolique, c???est-??-dire une lettre qui rappelle certaines convictions de foi et qui, en m??me temps, encourage ?? grandir en saintet?? et dans l???engagement de sa propre vocation. Mais ??tant donn?? qu???il s???agit d???une balise sur un chemin synodal, je m???adresse en m??me temps ?? tout le peuple de Dieu, ?? ses pasteurs et ?? ses fid??les, car la r??flexion sur les jeunes et pour les jeunes nous interpelle et nous stimule tous. Par cons??quent, dans certains paragraphes, je m???adresserai directement aux jeunes et, dans d???autres, je ferai des approches plus g??n??rales pour le discernement eccl??sial.</p>
                                    <p>Je me suis laiss?? inspirer par la richesse des r??flexions et des ??changes du Synode de l???ann??e pass??e. Je ne pourrai pas pr??senter ici toutes les contributions, que vous pourrez lire dans le Document final, mais j???ai essay?? d???inclure dans la r??daction de cette lettre les propositions qui m???ont paru les plus significatives. Ainsi, ma parole sera charg??e de mille voix de croyants du monde entier qui ont fait parvenir leurs opinions au Synode. M??me les jeunes non croyants, qui ont voulu y prendre part par leurs r??flexions, ont soulev?? des questions qui ont suscit?? en moi de nouvelles interrogations.</p>
                                    
                                    <!-- Blockquote -->
                                    <blockquote class="uza-blockquote d-flex">
                                        <div class="icon">
                                            <i class="icon_quotations" aria-hidden="true"></i>
                                        </div>
                                        <div class="text">
                                            <h5>QUE DIT LA PAROLE DE DIEU SUR LES JEUNES ?</h5>
                                        </div>
                                    </blockquote>
                                    <p>Recueillons certains tr??sors des Saintes ??critures, o??, ?? plusieurs reprises, on parle des jeunes et de la fa??on dont le Seigneur va ?? leur rencontre.</p>
                                    <p><b>Dans l???Ancien Testament</b></p>
                                    <p>A une ??poque o?? les jeunes comptaient peu, certains textes montrent que Dieu a sur eux un autre regard. Par exemple, nous voyons que Joseph ??tait presque le plus jeune de la famille (cf. Gn 37, 2-3). Toutefois, Dieu lui communiquait de grandes choses en r??ve et il a d??pass?? tous ses fr??res dans les t??ches importantes lorsqu???il avait environ vingt ans (cf. Gn 37-47).</p>
                                    <p>En G??d??on, nous reconnaissons la sinc??rit?? des jeunes, qui n???ont pas l???habitude d?????dulcorer la r??alit??. Quand on lui a annonc?? que le Seigneur ??tait avec lui, il a r??pondu : ?? Si Yahv?? est avec nous, d'o?? vient tout ce qui nous arrive ? ?? (Jg 6, 13). Mais Dieu ne s???est pas senti offens?? par ce reproche et a doubl?? la mise pour lui : ?? Va avec la force qui t'anime et tu sauveras Isra??l ?? (Jg 6, 14). </p>
                                    <p>Samuel ??tait un jeune peu s??r de lui-m??me, mais le Seigneur parlait avec lui. Sur le conseil d???un adulte, il a ouvert son c??ur pour ??couter l???appel de Dieu : ?? Parle, Seigneur, car ton serviteur ??coute ?? (1 S 3, 9-10). C???est pourquoi il a ??t?? un grand proph??te qui est intervenu en des moments importants pour sa patrie. Le roi Sa??l, lui aussi, ??tait jeune quand le Seigneur l???a appel?? ?? accomplir sa mission (cf. 1 S 9, 2).</p>
                                    <p>Le roi David a ??t?? choisi alors qu???il ??tait un jeune gar??on. Quand le proph??te Samuel ??tait ?? la recherche du futur roi d???Isra??l, un homme lui a pr??sent?? comme candidats ses enfants a??n??s et les plus exp??riment??s. Mais le proph??te a fait savoir que l?????lu ??tait le jeune David qui gardait les brebis (cf. 1 S 16, 6-13), car ?? l'homme regarde ?? l'apparence, mais le Seigneur regarde au c??ur ?? (v. 7). La gloire de la jeunesse ??tait plus dans le c??ur que dans la force physique ou dans l???impression que l???on donne aux autres.</p>
                                    <p>Salomon, quand il a d?? succ??der ?? son p??re, s???est senti perdu et a dit ?? Dieu : ?? Moi, je suis un tout jeune homme, je ne sais pas agir en chef ?? (1 R 3, 7). Cependant, l???audace de la jeunesse l???a amen?? ?? demander ?? Dieu la sagesse et il s???est consacr?? ?? sa mission. Quelque chose de semblable est arriv?? au proph??te J??r??mie appel??, alors qu???il ??tait tr??s jeune, ?? r??veiller son peuple. Dans son d??sarroi, il a dit : ?? Ah! Seigneur, vraiment, je ne sais pas parler, car je suis un enfant ! ?? (Jr 1, 6). Mais le Seigneur lui a demand?? de ne pas dire cela (cf. Jr 1, 7), et il a ajout?? : ?? N'aie aucune crainte en leur pr??sence car je suis avec toi pour te d??livrer ?? (Jr 1, 8). Le d??vouement du proph??te J??r??mie dans sa mission montre ce qui est possible si le courage de la jeunesse s???allie ?? la force de Dieu.</p>
                                    <p>Une jeune juive, qui ??tait au service du soldat ??tranger Naman, est intervenue avec foi pour l???aider ?? se soigner de sa maladie (cf. 2 R 5, 2-6). La jeune Ruth a ??t?? un exemple de g??n??rosit?? en restant avec sa belle-m??re tomb??e en disgr??ce (cf. Rt 1, 1-18), et elle a montr?? ??galement son audace en allant de l???avant dans la vie (cf. Rt 4, 1-17).</p>
                                    <p><b>Dans le nouveau Testament</b></p>
                                    <p>Une parabole de J??sus (cf. Lc 15, 11-32) raconte que le ???plus jeune??? fils a voulu partir de la maison paternelle pour un pays lointain (cf. vv. 12.13). Mais ses r??ves d???autonomie se sont transform??s en libertinage et en d??bauche (cf. vv. 12-13) et il a ??prouv?? la rigueur de la solitude et de la pauvret?? (cf. vv. 14-16). Toutefois, il a su se reprendre pour un nouveau d??part (cf. vv. 17-19) et il a d??cid?? de se lever (cf. v. 20).  C???est la caract??ristique du c??ur jeune d?????tre disponible au changement, d?????tre capable de se relever et de se laisser instruire par la vie. Comment ne pas accompagner le fils dans cette nouvelle tentative ? Mais le fr??re a??n?? avait d??j?? le c??ur vieilli et il s???est laiss?? poss??der par l???avidit??, l?????go??sme et l???envie (cf. vv. 28-30). J??sus fait plus l?????loge du jeune p??cheur qui retrouve le bon chemin que l?????loge de celui qui se croit fid??le mais ne vit pas l???esprit d???amour et de mis??ricorde.</p>
                                    <p>J??sus, l?????ternel jeune, veut nous faire don d???un c??ur toujours jeune. La Parole de Dieu nous demande : ?? Purifiez-vous du vieux levain pour ??tre une p??te nouvelle ?? (1 Co 5, 7). Elle nous invite en m??me temps ?? nous d??pouiller du ???vieil homme??? pour rev??tir l???homme ???nouveau??? (cf. Col 3, 9.10).[1]  Et quand elle explique ce que signifie se rev??tir de cette jeunesse qui se renouvelle (cf. v.10), elle affirme qu???il s???agit de rev??tir ?? des sentiments de tendre compassion, de bienveillance, d'humilit??, de douceur, de patience, et de se supporter les uns les autres en se pardonnant mutuellement ?? (Col 3, 12-13). Cela signifie que la vraie jeunesse, c???est avoir un c??ur capable d???aimer. En revanche, ce qui vieillit l?????me, c???est tout ce qui nous s??pare des autres. Mais elle conclut ainsi : ?? Par-dessus tout, ayez la charit??, en laquelle se noue la perfection ?? (Col 3, 14).</p>
                                    <p>Remarquons que J??sus n???appr??ciait pas que les personnes adultes regardent avec m??pris les plus jeunes ou les maintiennent ?? leur service de mani??re despotique. Au contraire, il demandait : ?? Que le plus grand parmi vous se comporte comme le plus jeune, et celui qui gouverne comme celui qui sert ?? (Lc 22, 26). Pour lui, l?????ge n?????tablissait pas de privil??ges, et le fait que quelqu???un soit moins ??g?? ne signifiait pas qu???il valait moins ou qu???il avait moins de dignit??.</p>
                                    <p>La Parole de Dieu dit qu???il faut traiter les jeunes gens ?? comme des fr??res ?? (1 Tm 5, 1), et elle recommande aux parents : ?? N???exasp??rez pas vos enfants, de peur qu???ils ne se d??couragent ?? (Col 3, 21). Un jeune ne peut pas se d??courager, il doit r??ver de grandes choses, chercher de larges horizons, aspirer ?? plus, vouloir conqu??rir le monde, ??tre capable d???accepter des propositions provocantes et souhaiter apporter le meilleur de lui-m??me pour construire quelque chose de meilleur. Voil?? pourquoi j???invite avec insistance les jeunes ?? ne pas se laisser d??rober l???esp??rance, et je r??p??te ?? chacun : ?? Que personne ne m??prise ton jeune ??ge ?? (1 Tm 4, 12).</p>
                                    <p>Cependant, en m??me temps, il est recommand?? aux jeunes : ?? Soyez soumis aux anciens (1 P 5, 5). La Bible invite toujours ?? un profond respect envers les anciens, car ils poss??dent un tr??sor d???exp??rience, ont connu les succ??s et les ??checs, les joies et les grandes angoisses de la vie, les illusions et les d??ceptions, et ils gardent, dans le silence de leur c??ur, beaucoup d???histoires qui peuvent nous aider ?? ne pas nous tromper ni nous laisser entra??ner par de faux mirages. La parole d???un a??n?? sage invite ?? respecter certaines limites et ?? savoir se dominer au bon moment : ?? Exhorte ??galement les jeunes gens ?? garder en tout la pond??ration ?? (Tt2, 6). Il ne convient pas de tomber dans un culte de la jeunesse, ou dans une attitude juv??nile qui m??prise les autres ?? cause de leur ??ge, ou parce qu???ils sont d???une autre ??poque. J??sus disait que la personne sage est capable de tirer de son tr??sor aussi bien du nouveau que du vieux (cf. Mt 13, 52).  Un jeune sage s???ouvre ?? l???avenir, mais il est toujours capable de recueillir quelque chose de l???exp??rience des autres.</p>
                                    <p>Dans l???Evangile de Marc, appara??t une personne qui, lorsque J??sus lui rappelle les commandements, dit : ?? Tout cela, je l'ai observ?? d??s ma jeunesse ?? (10, 20). Le psalmiste l???affirmait d??j?? : ?? Car c'est toi mon espoir, Seigneur, [???] ma foi d??s ma jeunesse. [???] Tu m'as instruit d??s ma jeunesse, et jusqu'ici j'annonce tes merveilles ?? (71, 5.17). Il ne faut pas regretter de passer sa jeunesse en ??tant bon, en ouvrant son c??ur au Seigneur, en vivant d???une autre mani??re. Rien de tout cela ne nous ??te la jeunesse mais plut??t la renforce et la renouvelle : ?? Ta jeunesse se renouvelle comme celle de l???aigle ?? (Ps 103, 5). C???est pourquoi saint Augustin d??plorait : ?? Je t'ai aim??e bien tard, Beaut?? si ancienne et si nouvelle, je t'ai aim??e bien tard ! ??.[2]  Mais cet homme riche, qui avait ??t?? fid??le ?? Dieu dans sa jeunesse, a laiss?? le temps lui ??ter les r??ves et a pr??f??r?? continuer ?? s???attacher ?? ses biens (cf. Mc10, 22). </p>
                                    <p>En revanche, dans l???Evangile de Matthieu, se pr??sente un jeune (cf. 19, 20.22) qui s???approche de J??sus pour lui demander davantage (cf. v. 20), avec cet esprit ouvert propre aux jeunes en recherche de nouveaux horizons et de grands d??fis. En r??alit??, son esprit n?????tait pas si jeune, car il ??tait attach?? aux richesses et au confort. Il disait en paroles qu???il voulait quelque chose de plus, mais quand J??sus lui a demand?? d?????tre g??n??reux et de partager ses biens, il s???est rendu compte qu???il ??tait incapable de se d??pouiller de ce qu???il poss??dait. En fin de compte, en ?? entendant cette parole, le jeune homme s'en alla contrist??, car il avait de grands biens ?? (v. 22). Il avait renonc?? ?? sa jeunesse.</p>
                                    <p>L???Evangile nous parle ??galement de quelques jeunes filles prudentes, qui ??taient vigilantes et attentives, tandis que d???autres ??taient distraites et endormies (cf. Mt 25, 1-13). En effet, on peut passer sa jeunesse en ??tant distrait, en vivant superficiellement, endormi, incapable de cultiver des relations profondes et d???entrer au c??ur de la vie. On pr??pare ainsi un avenir pauvre, sans substance. Ou bien on peut passer sa jeunesse ?? cultiver de belles et grandes choses, et ainsi on pr??pare un avenir rempli de vie et de richesse int??rieure.</p>
                                    <p>Si tu as perdu la vigueur int??rieure, les r??ves, l???enthousiasme, l???esp??rance et la g??n??rosit??, J??sus se pr??sente ?? toi comme il l???a fait pour l???enfant mort de la veuve, et avec toute sa puissance de Ressuscit?? le Seigneur t???exhorte : ?? Jeune homme, je te le dis, l??ve-toi ?? (Lc 7, 14).</p>
                                    <p>Il y a sans doute beaucoup d???autres textes de la Parole de Dieu qui peuvent nous ??clairer sur cette ??tape de la vie. Nous recueillerons certains d???entre eux dans les prochains chapitres.</p>
                                    <p><b>Fran??ois</b></p>
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
                                        <h2 class="mb-4">Articles r??cents</h2>

                                        <div class="row">
                                            <!-- Single Blog Post -->
                                            <div class="col-12 col-lg-6">
                                                <div class="single-blog-post bg-img mb-50" style="background-image: url(./img/blog-img/2.jpg);">
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <span class="post-date"><span>6</span> Mars 2019</span>
                                                        <a href="blog-2.php" class="post-title">Message du Pape Fran??ois Car??me 2019</a>
                                                        <p>??La cr??ation attend avec impatience la r??v??lation des fils de Dieu?? (Rm 8,19)...</p>
                                                        <a href="blog-2.php" class="read-more-btn">Lire plus <i class="arrow_carrot-2right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="single-blog-post bg-img mb-50" style="background-image: url(./img/blog-img/5.jpg);">
                                                    <!-- Post Content -->
                                                    <div class="post-content">
                                                        <span class="post-date"><span>2</span> Avril 2019</span>
                                                        <a href="blog-4.php" class="post-title">Comment m??diter?</a>
                                                        <p>Les pratiques de m??ditation, revenues en Occident par le biais des religions orientales, correspondent aussi ?? une tradition ...</p>
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
                        <p>Abonnez-vous et recevez toutes l'actualit?? de la JEC de C??te d'Ivoire</p>
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