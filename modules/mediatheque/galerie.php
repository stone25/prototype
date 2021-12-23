<?php
$titre = "Médiathèque | Galérie";
$page = "galerie";

session_start();
include('../src/entity/connexion.php');

$connexion = new Connexion();
if($connexion->connecter())
{
	$query = "SELECT * FROM photo INNER JOIN activite ON activite.id_act = photo.id_act WHERE activite.id_act = $_GET[activite] AND etat_photo = 'Visible' ORDER BY id_photo DESC";
  $result = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
  
  $query = "SELECT * FROM activite WHERE id_act = $_GET[activite]";
  $result_activite = mysqli_query($connexion->connexion, $query) or die(mysqli_error($connexion->connexion));  
  $activite = mysqli_fetch_assoc($result_activite);
}
?>

<!DOCTYPE html>
<html lang="fr">
  
  <?php include_once('include/head.php') ?>;
  
  <body>
  
    <div class="site-wrap">

      <?php include_once('include/header.php') ?>;

      <div class="site-section"  data-aos="fade">
        <div class="container-fluid">
          
          <div class="row justify-content-center">
            
            <div class="col-md-7">
              <div class="row mb-5">
                <div class="col-12 ">
                  <h2 class="site-section-heading text-center"><?php echo $activite["den_act"]; ?></h2>
                </div>
              </div>
            </div>
        
          </div>
          <div class="row" id="lightgallery">
            <?php
              while($photo = mysqli_fetch_assoc($result))
              {
                echo'<div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="../admin/img/galerie/'.$photo["nom_photo"].'" data-sub-html="<h4>'.$photo["titre_photo"].'</h4><p>'.$photo["desc_photo"].'</p>">
                        <a href="#"><img src="../admin/img/galerie/'.$photo["nom_photo"].'" alt="'.$photo["titre_photo"].'" class="img-fluid"></a>
                      </div>';
              }
            ?>
          </div>
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