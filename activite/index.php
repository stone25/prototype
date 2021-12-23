<?php 
session_start();
include_once('../admin/src/control/connexion.php'); 

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
    $req = "update visite set nombre = nombre + 1 where page ='Activité'";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    $_SESSION['visite'] = true;
}
?>
<!DOCTYPE html>
<html lang="fr"> 
  <head>
		<title>JEC-CI - Activités</title>
		<!-- Favicon -->
		<link rel="icon" href="../img/core-img/favicon.ico">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="nav-brand" href="../index.php"><img src="../img/core-img/logo.png" alt=""></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
						<li id="accueil" class="nav-item active"><a href="index.php#accueil1" class="nav-link">Accueil</a></li>
            <li id="atout" class="nav-item"><a href="index.php#atout1" class="nav-link">Atouts</a></li>
            <li id="orateur" class="nav-item"><a href="index.php#orateur1" class="nav-link">Orateurs</a></li>
            <li id="programme" class="nav-item"><a href="index.php#programme1" class="nav-link">Programme</a></li>
            <li id="contact" class="nav-item"><a href="index.php#contact1" class="nav-link">Contact</a></li>
            <li id="ticket" class="nav-item cta mr-md-2"><a href="index.php#ticket1" class="nav-link">Ticket</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('images/bg.png');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-xl-10 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> Pèlrinage National<br> de la<br><span>JEC-CI 2019</span></h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">4 et 5 Mai 2019 à la Basilique <br> Notre Dame de la Paix de Yamoussoukro</p>
            <div id="timer" class="d-flex mb-3">
						  <div class="time" id="days"></div>
						  <div class="time pl-4" id="hours"></div>
						  <div class="time pl-4" id="minutes"></div>
						  <div class="time pl-4" id="seconds"></div>
						</div>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-placeholder"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Lieu</h3>
                <p>	L'activité se tiendra en Côte d'Ivoire; précisement à la Basilique Notre Dame de la Paix de Yamoussoukro.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-world"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Transport</h3>
                <p>Les Bureaux Diocésains ont le devoir d'organiser le convoi de leur participant jusqu'au lieu de rassemblement.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-hotel"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Hébergement</h3>
                <p>Cette activité ne fera pas intervenir de volet d'hébergement. Elle se tiendra toute la nuit.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block">
              <div class="icon"><span class="flaticon-cooking"></span></div>
              <div class="media-body">
                <h3 class="heading mb-3">Restauration</h3>
                <p>Il y aura des stands disposés pour la vente de nourriture sur le site de l'activité pour l'ensemble des pèlerins.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
   	
    <section class="ftco-counter img" id="section-counter">
    	<div class="container" id="atout1">
    		<div class="row d-flex">
    			<div class="col-md-6 d-flex">
    				<div class="img d-flex align-self-stretch" style="background-image:url(images/about.jpg);"></div>
    			</div>
    			<div class="col-md-6 pl-md-5 py-5">
    				<div class="row justify-content-start pb-3">
		          <div class="col-md-12 heading-section ftco-animate">
		          	<span class="subheading">Attractions</span>
		            <h2 class="mb-4"><span>Points</span> Forts</h2>
		            <p>Les points forts de l'organisation de cette activité sont les suivants:</p>
		          </div>
		        </div>
		    		<div class="row">
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 bg-light mb-4">
		              <div class="text">
		              	<div class="icon d-flex justify-content-center align-items-center">
		              		<span class="flaticon-guest"></span>
		              	</div>
		                <strong class="number" data-number="5">0</strong>
		                <span>Artistes</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 bg-light mb-4">
		              <div class="text">
		              	<div class="icon d-flex justify-content-center align-items-center">
		              		<span class="flaticon-handshake"></span>
		              	</div>
		                <strong class="number" data-number="2">0</strong>
		                <span>Partenaires</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 bg-light mb-4">
		              <div class="text">
		              	<div class="icon d-flex justify-content-center align-items-center">
		              		<span class="flaticon-chair"></span>
		              	</div>
		                <strong class="number" data-number="2000">0</strong>
		                <span>Places</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center py-4 bg-light mb-4">
		              <div class="text">
		              	<div class="icon d-flex justify-content-center align-items-center">
		              		<span class="flaticon-idea"></span>
		              	</div>
		                <strong class="number" data-number="1">0</strong>
		                <span>Thème</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <section id="orateur1" class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Intervenants</span>
            <h2 class="mb-4"><span>Nos</span> Intervenants</h2>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-12 ftco-animate">
        		<div class="carousel-testimony owl-carousel">
        			
        			<div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-7.png" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Père Harold Kouakou</h3>
			        			<span class="position">Aumônier National JEC</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
							</div>
							
							<div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-9.jpg" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Guy Mobio de la Compassion</h3>
			        			<span class="position">Chantre</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
        			</div>

							<div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-8.png" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Lena Ary</h3>
			        			<span class="position">Chantre</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
        			</div>

							<div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-10.png" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Abraham TT</h3>
			        			<span class="position">Chantre</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
							</div>
							
							<div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-11.png" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Chantre Emmanuel</h3>
			        			<span class="position">Chantre</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
        			</div>

        			<!--div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-4.jpg" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Angelie Crawford</h3>
			        			<span class="position">Web Developer</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
        			</div>

        			<div class="item">
        				<div class="speaker">
			        		<img src="images/speaker-5.jpg" class="img-fluid" alt="Colorlib HTML5 Template">
			        		<div class="text text-center py-3">
			        			<h3>Jackie Spears</h3>
			        			<span class="position">Entrepreneur</span>
			        			<ul class="ftco-social mt-3">
			                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
			                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
			              </ul>
			        		</div>
			        	</div>
        			</div-->
        		</div>
        	</div>
        </div>
    	</div>
    </section>
		

		<section id="programme1" class="ftco-section bg-light">
			<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Programme</span>
            <h2 class="mb-4"><span>Programme</span> d'activités</h2>
          </div>
        </div>
        <div class="ftco-search">
					<div class="row">
            <div class="col-md-12 nav-link-wrap">
	            <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
	              <a class="nav-link ftco-animate active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Jour 01 <span>04 Mai 2019</span></a>

	              <a class="nav-link ftco-animate" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Jour 02 <span>05 Mai 2019</span></a>

	              <!--a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Day 03 <span>23 Dec. 2019</span></a>

	              <a class="nav-link ftco-animate" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Day 04 <span>24 Dec. 2019</span></a-->

	            </div>
	          </div>
	          <div class="col-md-12 tab-wrap">
	            
	            <div class="tab-content" id="v-pills-tabContent">

	              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_1.png);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">14:00 - 16:00</span>
	              			<h2><a href="#">Rassemblement et consignes</a></h2>
	              			<p>Accueil des délégations à la cathédrale; distribution des kits; consignes d'usage.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Accueil et Protocole</a> <span class="position">Assassy René NIAMIEN</span></h3>
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_5.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">16:00 - 18:00</span>
	              			<h2><a href="#">Marche pèlerine</a></h2>
	              			<p>Formation des groupes; Prière d'ouverture; Marche pèlerine et méditation.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Spiritualité</a> <span class="position">Hermann BEDA</span></h3>
	              		</div>
									</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_5.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">19:05 - 19:15</span>
	              			<h2><a href="#">Allocutions</a></h2>
	              			<p>Mot de bienvenue</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Président du Comité d'Organisation</a> <span class="position">José KIPLE</span></h3>
	              		</div>
									</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/speaker-7.png);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">19:15 - 20:45</span>
	              			<h2><a href="#">Enseignement: Ps 103,5</a></h2>
	              			<p></p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Père Harold KOUAKOU</a> <span class="position"></span></h3>
	              		</div>
									</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_5.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">20:45 - 00:00</span>
	              			<h2><a href="#">Concours Interdiocésain</a></h2>
	              			<p>Chorale, plume d'or</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Spiritualité</a> <span class="position">Hermann BEDA</span></h3>
	              		</div>
	              	</div>
	              	
									
									
	              </div>


	              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
									
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_5.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">00:00 - 03:00</span>
	              			<h2><a href="#">Concert de louange</a></h2>
	              			<p></p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Spiritualité</a> <span class="position">Hermann BEDA</span></h3>
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_5.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">03:00 - 03:30</span>
	              			<h2><a href="#">Procession aux flambeaux</a></h2>
	              			<p>Pour la paix dans le monde</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Spiritualité</a> <span class="position">Hermann BEDA</span></h3>
	              		</div>
									</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_5.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">05:00 - 06:00</span>
	              			<h2><a href="#">Méditation personnelle et animation</a></h2>
	              			<p></p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Spiritualité</a> <span class="position">Hermann BEDA</span></h3>
	              		</div>
	              	</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/BD.png);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">06:30 - 08:30</span>
	              			<h2><a href="#">Messe</a></h2>
	              			<p></p>
	              			<h3 class="speaker-name">&mdash; <a href="#"></a> <span class="position"></span></h3>
	              		</div>
									</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/39.png);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">09:00 - 10:00</span>
	              			<h2><a href="#">Nettoyage</a></h2>
	              			<p></p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission propreté</a> <span class="position">Franck GNALLY</span></h3>
	              		</div>
									</div>
									<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/37.png);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">10:00 - </span>
	              			<h2><a href="#">Départ</a></h2>
	              			<p></p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Commission Transport</a> <span class="position">Hyacinthe KOUAKOU</span></h3>
	              		</div>
	              	</div>
	              </div>
	              <!--div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_1.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">08: - 10:00</span>
	              			<h2><a href="#">Introduction to Wordpress 5.0</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country; in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Brett Morgan</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_2.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">08: - 10:00</span>
	              			<h2><a href="#">Best Practices For Programming WordPress</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country; in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Brett Morgan</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_3.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">08: - 10:00</span>
	              			<h2><a href="#">Web Performance For Third Party Scripts</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country; in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Brett Morgan</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
	              </div>
	              <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-day-4-tab">
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_1.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">08: - 10:00</span>
	              			<h2><a href="#">Introduction to Wordpress 5.0</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country; in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Brett Morgan</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_2.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">08: - 10:00</span>
	              			<h2><a href="#">Best Practices For Programming WordPress</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country; in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Brett Morgan</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
	              	<div class="speaker-wrap ftco-animate d-flex">
	              		<div class="img speaker-img" style="background-image: url(images/person_3.jpg);"></div>
	              		<div class="text pl-md-5">
	              			<span class="time">08: - 10:00</span>
	              			<h2><a href="#">Web Performance For Third Party Scripts</a></h2>
	              			<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country; in which roasted parts of sentences fly into your mouth.</p>
	              			<h3 class="speaker-name">&mdash; <a href="#">Brett Morgan</a> <span class="position">Founder of Wordpress</span></h3>
	              		</div>
	              	</div>
	              </div-->
	            </div>
	          </div>
	        </div>
        </div>
			</div>
		</section>
		

    <!--section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Message des aînés</span>
            <h2 class="mb-4"><span>Nos aînés</span> nous parlent</h2>
          </div>
        </div>
        <div class="row ftco-animate">
          <div class="col-md-12">
            <div class="carousel-testimony owl-carousel ftco-owl">
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">C'est à travers ce genre d'activité que la JEC contribue au renforcement spirituel de ses membres.</p>
                    <p class="name">Abbé Parfait DOUGLANE</p>
                    <span class="position">Bureau National 2008-2010</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">La JEC, c'est toute la vie en miniature. Un véritable entrainement en vu de mieux aborder la vie et ses difficultés.</p>
                    <p class="name">Fidèle Abraham KOFFI</p>
                    <span class="position">Bureau Diocésain Abidjan 2014-2015</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center py-4 pb-5">
                  <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4">Véritablement, ce qui me manque le plus, c'est le stress dde l'organisation de ces activités</p>
                    <p class="name">Kacoutié Donatien ALLOU</p>
                    <span class="position">Bureau Diocésain Yopougon 2011-2013</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section-->

    <section id="ticket1" class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <span class="subheading">Participation</span>
            <h2 class="mb-1"><span>Nos</span> tarifs</h2>
          </div>
        </div>
        <div class="row">
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Province d'Abidjan</h2>
	            <span class="price"><span class="number">7000 FCFA</span></span>
	            <span class="excerpt d-block">par personne</span>
	            
	            <h3 class="heading-2 my-4">La participation prend en compte:</h3>
	            
	            <ul class="pricing-text mb-5">
								<li>Droit d'accès</li>
	              <li>Transport</li>
	              <li>Eau</li>
								<li>Kit du pèlerin</li>
	            </ul>

	            <!--a href="#" class="btn btn-primary d-block px-2 py-3">Acheter le Ticket</a-->
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	            <div class="text-center">
	            <h2 class="heading">Autres diocèses</h2>
	            <span class="price"> <span class="number">1000 FCFA</span></span>
	            <span class="excerpt d-block">par personne</span>
	            
	            <h3 class="heading-2 my-4">La participation prend en compte:</h3>
	            
	            <ul class="pricing-text mb-5">
								<li>Droit d'accès</li>
								<li>Entrée sur le site</li>
								<li>Kit du pèlerin</li>
	            </ul>

	            <!--a href="#" class="btn btn-primary d-block px-2 py-3">Acheter le Ticket</a-->
	            </div>
	          </div>
	        </div>
	      </div>
      </div>
    </section>

    <!--section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Prochainement</span>
            <h2><span>Prochaines</span> Activités</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">
              		<div class="one">
              			<span class="day">07</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">January</span>
              		</div>
              	</div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">
              		<div class="one">
              			<span class="day">07</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">January</span>
              		</div>
              	</div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
              </a>
              <div class="text p-4 float-right d-block">
              	<div class="d-flex align-items-center pt-2 mb-4">
              		<div class="one">
              			<span class="day">06</span>
              		</div>
              		<div class="two">
              			<span class="yr">2019</span>
              			<span class="mos">January</span>
              		</div>
              	</div>
                <h3 class="heading mt-2"><a href="#">Why Lead Generation is Key for Business Growth</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section-->
		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Abonnement</h2>
              <p>Abonnez-vous et recevez toutes l'actualité de la JEC de Côte d'Ivoire</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="../admin/src/control/membre.php" method="post" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" name="nl-email" class="form-control" placeholder="Votre e-mail">
                      <input type="submit" name="btn-abonne1" value="S'abonner" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-gallery">
    	<div class="container-wrap">
    		<div class="row no-gutters">
					<div class="col-md-3 ftco-animate">
						<a href="images/image_7.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_7.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_10.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_10.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_8.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_8.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-3 ftco-animate">
						<a href="images/image_9.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/image_9.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>

    <footer id="contact1" class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
    <div class="row mb-5">
        <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2">Eventalk</h2>
            <p>Retrouvez-nous surq les réseaux sociaux</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://www.facebook.com/bnjecci" target="_blank"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="https://twitter.com/jec_ci" target="_blank"><span class="icon-twitter"></span></a></li>
            </ul>
            </div>
        </div>
        <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
                <h2 class="ftco-heading-2">Partenaires</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Le Labelle transport</a></li>
                    <li><a href="#" class="py-2 d-block">FENAPEC</a></li>
                    <li><a href="#" class="py-2 d-block"></a></li>
                    <li><a href="#" class="py-2 d-block"></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2"></h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block"></a></li>
                    <li><a href="#" class="py-2 d-block"></a></li>
                    <li><a href="#" class="py-2 d-block"></a></li>
                    <li><a href="#" class="py-2 d-block"></a></li>
                </ul>
            </div>
        </div>
        <div class="col-md">
            <div class="ftco-footer-widget mb-4">
                <h2 class="ftco-heading-2">Contact</h2>
                <div class="block-23 mb-3">
                    <ul>
                        <li><span class="icon icon-map-marker"></span><span class="text">Centre d'Accueil Missionaire, Abidjan Plateau</span></li>
                        <li><a href="#"><span class="icon icon-phone"></span><span class="text">+255 47 605 932</span></a></li>
                        <li><a href="#"><span class="icon icon-envelope"></span><span class="text">contact@jec-ci.com</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Made by <a href="https://aristone.ci" target="_blank">Ari Stone</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$("#accueil").click(function() {
			$('html, body').animate({
				scrollTop: $("#accueil1").offset().top
			}, 1000);
		});

		$("#atout").click(function() {
			$('html, body').animate({
				scrollTop: $("#atout1").offset().top
			}, 1000);
		});

		$("#orateur").click(function() {
			$('html, body').animate({
				scrollTop: $("#orateur1").offset().top
			}, 1000);
		});

		$("#programme").click(function() {
			$('html, body').animate({
				scrollTop: $("#programme1").offset().top
			}, 1000);
		});

		$("#contact").click(function() {
			$('html, body').animate({
				scrollTop: $("#contact1").offset().top
			}, 1000);
		});

		$("#ticket").click(function() {
			$('html, body').animate({
				scrollTop: $("#ticket1").offset().top
			}, 1000);
		});
	</script>
    
  </body>
</html>