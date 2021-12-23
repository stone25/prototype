<?php
$titre = "JEC Côte d'ivoire | Médiathèque";
$page = "accueil";

session_start();
include('../src/entity/connexion.php');

$connexion = new Connexion();
if($connexion->connecter())
{
	$query = "SELECT * FROM activite ORDER BY id_act DESC";
	$result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
}
?>

<!DOCTYPE html>
<html lang="fr">

  <?php include_once('include/head.php') ?>;

  <body>
  
    <div class="site-wrap">

      <?php include_once('include/header.php') ?>; 

      <div class="container-fluid" data-aos="fade" data-aos-delay="500">
        <div class="swiper-container images-carousel">
          <div class="swiper-wrapper">
              
            <?php
                while($activite = mysqli_fetch_assoc($result))
                {
                  echo'<div class="swiper-slide">
                        <div class="image-wrap">
                          <div class="image-info">
                            <h2 class="mb-3">'.$activite["den_act"].'</h2>
                            <a href="galerie.php?activite='.$activite["id_act"].'" class="btn btn-outline-white py-2 px-4">Parcourir</a>
                          </div>
                          <img src="../admin/img/activite/'.$activite["photo_act"].'" alt="Image">
                        </div>
                      </div>';
                }
            ?>
              
            </div>

            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
        </div>
      </div>

      <?php include_once('include/footer.php') ?>; 

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/swiper.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/picturefill.min.js"></script>
    <script src="js/lightgallery-all.min.js"></script>
    <script src="js/jquery.mousewheel.min.js"></script>

    <script src="js/main.js"></script>
    
    <script>
      $(document).ready(function(){
        $('#lightgallery').lightGallery();
      });
    </script>
    
  </body>
</html>