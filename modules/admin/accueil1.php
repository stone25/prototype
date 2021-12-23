<?php
session_start();
include_once('../src/entity/Connexion.php'); 
$titre = 'Tableau de bord';
$page = '';
$connexion = new Connexion();

if($connexion->connecter())
{
    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut like '%Membre%'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $jeciste=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut not like '%Membre%'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $respo=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where sexe = 'F'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $jeciste_fille=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut not like '%Membre%' and sexe = 'F'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $respo_fille=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from jeciste inner join militer on id = idjeciste where statut like 'Enc%' or statut like 'A%'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $aine=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from instance";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $instance=mysqli_fetch_assoc($fic);

    $req = "select count(*) as cpt from abonnement";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $followers=mysqli_fetch_assoc($fic);

    $req = "select page, nombre as cpt from visite where page = 'Visite'";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $visite=mysqli_fetch_assoc($fic);

    $req = "select page, nombre as cpt from visite where page <> 'Visite' order by cpt desc limit 1";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $max=mysqli_fetch_assoc($fic);

    $req = "select page, nombre as cpt from visite where page <> 'Visite' order by cpt asc limit 1";
    $fic = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    $min=mysqli_fetch_assoc($fic);

    $req = "select nom, prenom, contact, sexe, photo, denomination, statut, (dayofyear(date) - dayofyear(NOW())) as cpt1, (dayofyear(date) + 365 - dayofyear(NOW())) as cpt2  from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id where dayofyear(date) - dayofyear(NOW()) BETWEEN 1 and 10 OR dayofyear(date) + 365 - dayofyear(NOW()) BETWEEN 1 and 10 order by cpt1 asc";
    $fic1 = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
    
    $req = "select nom, prenom, contact, sexe, photo, denomination, statut, (year(now())-year(date)) as age  from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id where dayofyear(date) - dayofyear(NOW()) = 0 OR dayofyear(date) + 365 - dayofyear(NOW()) = 0 order by nom asc";
    $fic2 = mysqli_query($connexion->connexion, $req) or die(mysqli_error($connexion->connexion));
}

?>
<!doctype html>
<html class="no-js" lang="fr">

<!-- ***** Head Area Start ***** -->
<?php include_once('include/head.php'); ?>
<!-- ***** Head Area End ***** -->

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
    <!-- Start Left menu area -->
    <?php include_once('include/menu.php'); ?>
    <!-- End Left menu area -->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
                
        <!-- Start Left menu area -->
        <?php include_once('include/menu-top.php'); ?>

        
        <!-- End Left menu area -->

        <div class="analytics-sparkle-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4>Jecistes</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-professor"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success"><?php echo $jeciste['cpt']; ?></h1>
                                    <small>
										Membres de sections.	
									</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4>Responsables</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-student"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success"><?php echo $respo['cpt']; ?></h1>
                                    <small>
										Responsables d'instances.
									</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4>Filles </h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-department icon-wrap"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success"><?php echo $jeciste_fille['cpt'].'/'.$respo_fille['cpt']; ?></h1>
                                    <small>
										Membres/Membres de bureau.
									</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel widget-int-shape responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4>Instances</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-home icon-wrap"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                    <h1 class="text-success"><?php echo $instance['cpt']; ?></h1>
                                    <small>
										Instances JEC du pays.
									</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>University Earnings</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp graph-rp-dl">
                                            <p>All Earnings are in million $</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0,"></i>CSE</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5,"></i>Accounting</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d,"></i>Electrical</h5>
                                </li>
                            </ul>
                            <div id="extra-area-chart" style="height: 356px,"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <div class="traffice-source-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs">
                            <h3 class="box-title">Followers</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right sp-cn-r"><i class="fa fa-users" aria-hidden="true"></i> <span class="counter text-success"><span class="counter"><?php echo $followers['cpt']; ?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs res-mg-t-30 table-mg-t-pro-n">
                            <h3 class="box-title">Visite</h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right graph-two-ctn"><i class="fa fa-eye" aria-hidden="true"></i> <span class="counter text-purple"><span class="counter"><?php echo $visite['cpt']; ?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <h3 class="box-title">+ de vues: <?php echo $max['page']; ?></h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash3"></div>
                                </li>
                                <li class="text-right graph-three-ctn"><i class="fa fa-level-up" aria-hidden="true"></i> <span class="counter text-info"><span class="counter"><?php echo $max['cpt']; ?></span></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box analytics-info-cs res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <h3 class="box-title">- de vues: <?php echo $min['page']; ?></h3>
                            <ul class="list-inline two-part-sp">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right graph-four-ctn"><i class="fa fa-level-down" aria-hidden="true"></i> <span class="text-danger"><span class="counter"><?php echo $min['cpt']; ?></span>%</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="traffic-analysis-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu">
                            <i class="fa fa-facebook"></i>
                            <div class="social-edu-ctn">
                                <h3>50k Likes</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                            <i class="fa fa-twitter"></i>
                            <div class="social-edu-ctn">
                                <h3>30k followers</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fa fa-linkedin"></i>
                            <div class="social-edu-ctn">
                                <h3>7k Connections</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <i class="fa fa-youtube"></i>
                            <div class="social-edu-ctn">
                                <h3>50k Subscribers</h3>
                                <p>You main list growing</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-cards-item">
                            <div class="single-product-image">
                                <a href="#"><img src="img/product/profile-bg.jpg" alt=""></a>
                            </div>
                            <div class="single-product-text">
                                <img src="img/jeciste/<?php if(isset($_SESSION["userimg"])){echo $_SESSION["userimg"];} ?>" alt="">
                                <h4><a class="cards-hd-dn" href="#"><?php if(isset($_SESSION["username"])){echo $_SESSION["username"].' '.$_SESSION["userprenom"];} ?></a></h4>
                                <h5><?php if(isset($_SESSION["userposte"])){echo $_SESSION["userposte"];} ?></h5>
                                <p class="ctn-cards"><?php if(isset($_SESSION["userinstance"])){echo $_SESSION["userinstance"];} ?></p>
                                <a class="follow-cards">Diocèse de <?php if(isset($_SESSION["userdiocese"])){echo $_SESSION["userdiocese"];} ?></a>
                                <!--div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="cards-dtn">
                                            <h3><span class="counter">199</span></h3>
                                            <p>Articles</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="cards-dtn">
                                            <h3><span class="counter">599</span></h3>
                                            <p>Like</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="cards-dtn">
                                            <h3><span class="counter">399</span></h3>
                                            <p>Comment</p>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            <div class="single-review-st-hd">
                                <h2>Anniversaire</h2>
                            </div>
                            <?php 
                            while($aniv=mysqli_fetch_assoc($fic2))
                            {
                                if($aniv["photo"] == 'defaut.jpg')
                                {
                                    if($aniv["sexe"]=='F')
                                    {
                                        $aniv["photo"] = 'defaut-femme.jpg';
                                    }
                                    else
                                    {
                                        $aniv["photo"] = 'defaut-homme.jpg';
                                    }
                                }
                                
                                if($_SESSION["userinstance"] == "Bureau National de Côte d'Ivoire")
                                {
                                    $detail = 'fête ses '.$aniv["age"].' ans';
                                } 
                                else
                                {
                                    $detail = '';
                                }
                                
                                echo'<div class="single-review-st-text">
                                        <img src="img/jeciste/'.$aniv["photo"].'" alt="">
                                        <div class="review-ctn-hf">
                                            <h3>'.$aniv["nom"].' '.$aniv["prenom"].'</h3>
                                            <p>'.$aniv["statut"].' '.$aniv["denomination"].'</p>
                                            <p>'.$detail.'</p>
                                            <p>'.$aniv["contact"].'</p>
                                        </div>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                            <div class="single-review-st-hd">
                                <h2>Anniversaire à venir</h2>
                            </div>
                            <?php 
                            while($aniv=mysqli_fetch_assoc($fic1))
                            {
                                if($aniv["photo"] == 'defaut.jpg')
                                {
                                    if($aniv["sexe"]=='F')
                                    {
                                        $aniv["photo"] = 'defaut-femme.jpg';
                                    }
                                    else
                                    {
                                        $aniv["photo"] = 'defaut-homme.jpg';
                                    }
                                }

                                $delay = $aniv["cpt1"];
                                if(date('M')=='Jan')
                                {
                                    if(date('j')>=1 && date('j')<=10)
                                    {
                                        $delay = $aniv["cpt2"];
                                    }
                                }
                                echo'<div class="single-review-st-text">
                                        <img src="img/jeciste/'.$aniv["photo"].'" alt="">
                                        <div class="review-ctn-hf">
                                            <h3>'.$aniv["nom"].' '.$aniv["prenom"].'</h3>
                                            <p> Dans '.$delay.' jour(s)</p>
                                        </div>
                                    </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-sales-chart">
                            <div class="portlet-title">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="caption pro-sl-hd">
                                            <span class="caption-subject"><b>Adminsion Statistic</b></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="actions graph-rp actions-graph-rp">
                                            <a href="#" class="btn btn-dark btn-circle active tip-top" data-toggle="tooltip" title="Refresh">
													<i class="fa fa-reply" aria-hidden="true"></i>
												</a>
                                            <a href="#" class="btn btn-blue-grey btn-circle active tip-top" data-toggle="tooltip" title="Delete">
													<i class="fa fa-trash-o" aria-hidden="true"></i>
												</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-inline cus-product-sl-rp">
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #006DF0,"></i>Python</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #933EC5,"></i>PHP</h5>
                                </li>
                                <li>
                                    <h5><i class="fa fa-circle" style="color: #65b12d,"></i>Java</h5>
                                </li>
                            </ul>
                            <div id="morris-area-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sedules-area mg-b-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analysis-progrebar">
                            <div class="analysis-progrebar-content">
                                <h5>Usage</h5>
                                <h2 class="storage-right"><span class="counter">90</span>%</h2>
                                <div class="progress progress-mini ug-1">
                                    <div style="width: 68%," class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 1:32 pm.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analysis-progrebar reso-mg-b-30 res-mg-t-30 table-mg-t-pro-n">
                            <div class="analysis-progrebar-content">
                                <h5>Memory</h5>
                                <h2 class="storage-right"><span class="counter">70</span>%</h2>
                                <div class="progress progress-mini ug-2">
                                    <div style="width: 78%," class="progress-bar"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 12:32 pm.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analysis-progrebar reso-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="analysis-progrebar-content">
                                <h5>Data</h5>
                                <h2 class="storage-right"><span class="counter">50</span>%</h2>
                                <div class="progress progress-mini ug-3">
                                    <div style="width: 38%," class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 8:32 pm.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="analysis-progrebar res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="analysis-progrebar-content">
                                <h5>Space</h5>
                                <h2 class="storage-right"><span class="counter">40</span>%</h2>
                                <div class="progress progress-mini ug-4">
                                    <div style="width: 28%," class="progress-bar progress-bar-danger"></div>
                                </div>
                                <div class="m-t-sm small">
                                    <p>Server down since 5:32 pm.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="courses-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box">
                            <h3 class="box-title">Browser Status</h3>
                            <ul class="basic-list">
                                <li>Google Chrome <span class="pull-right label-danger label-1 label">95.8%</span></li>
                                <li>Mozila Firefox <span class="pull-right label-purple label-2 label">85.8%</span></li>
                                <li>Apple Safari <span class="pull-right label-success label-3 label">23.8%</span></li>
                                <li>Internet Explorer <span class="pull-right label-info label-4 label">55.8%</span></li>
                                <li>Opera mini <span class="pull-right label-warning label-5 label">28.8%</span></li>
                                <li>Mozila Firefox <span class="pull-right label-purple label-6 label">26.8%</span></li>
                                <li>Safari <span class="pull-right label-purple label-7 label">31.8%</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <h3 class="box-title">Visits from countries</h3>
                            <ul class="country-state">
                                <li>
                                    <h2><span class="counter">1250</span></h2> <small>From Australia</small>
                                    <div class="pull-right">75% <i class="fa fa-level-up text-danger ctn-ic-1"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%,"> <span class="sr-only">75% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">1050</span></h2> <small>From USA</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success ctn-ic-2"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%,"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">6350</span></h2> <small>From Canada</small>
                                    <div class="pull-right">55% <i class="fa fa-level-up text-success ctn-ic-3"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:55%,"> <span class="sr-only">55% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">950</span></h2> <small>From India</small>
                                    <div class="pull-right">33% <i class="fa fa-level-down text-success ctn-ic-4"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:33%,"> <span class="sr-only">33% Complete</span></div>
                                    </div>
                                </li>
                                <li> 
                                    <h2><span class="counter">3250</span></h2> <small>From Bangladesh</small>
                                    <div class="pull-right">60% <i class="fa fa-level-up text-success ctn-ic-5"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%,"> <span class="sr-only">60% Complete</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="courses-inner res-mg-t-30 table-mg-t-pro-n tb-sm-res-d-n dk-res-t-d-n">
                            <div class="courses-title">
                                <a href="#"><img src="img/courses/1.jpg" alt="" /></a>
                                <h2>Apps Development</h2>
                            </div>
                            <div class="courses-alaltic">
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                                <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                            </div>
                            <div class="course-des">
                                <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                                <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                            </div>
                            <div class="product-buttons">
                                <button type="button" class="button-default cart-btn">Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div-->
        <!-- footer -->
        <?php include_once('include/footer.php'); ?>
        <!-- End footer -->
    </div>

    <!-- link js -->
    <?php include_once('include/link-js.php'); ?>
    <!-- End link js-->
</body>

</html>