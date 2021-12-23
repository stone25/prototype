<?php
session_start();
include_once('src/control/connexion.php'); 
$titre = 'Membres';
$page = '';
?>
<!doctype html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>JEC-CI - <?php echo $titre; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

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

        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#">Nouveau membre</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                              <form action="src/control/membre.php" method="post" enctype="multipart/form-data" id="demo1-upload">
                                <div class="product-tab-list tab-pane fade active in" id="civil">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                  <div class="row">
                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                          <div class="form-group">
                                                              <input name="nom" type="text" class="form-control" placeholder="Nom">
                                                          </div>
                                                          <div class="form-group">
                                                              <input name="prenom" type="text" class="form-control" placeholder="Prénoms">
                                                          </div>
                                                          <div class="form-group">
                                                              <input name="date" type="date" class="form-control" placeholder="">
                                                          </div>
                                                          <div class="form-group">
                                                              <input name="lieu" type="text" class="form-control" placeholder="Lieu de naissance">
                                                          </div>
                                                          <div class="form-group">
                                                              <input name="contact" type="text" class="form-control" placeholder="Contact">
                                                          </div>
                                                          <div class="form-group">
                                                              <input name="email" type="text" class="form-control" placeholder="e-mail">
                                                          </div>
                                                          <div class="form-group">
                                                              <select name="sexe" class="form-control" >
                                                                <option value="">*** Selectionner le sexe ***</option>
                                                                <option value="H">Homme</option>
                                                                <option value="F">Femme</option>
                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                              <input name="cni" type="text" class="form-control" placeholder="Numéro CNI">
                                                          </div>
                                                          <div class="form-group">
                                                              <select name="sang" class="form-control">
                                                                  <option value="">*** Choisir groupe sanguin ***</option>
                                                                  <option value="A-">A-</option>
                                                                  <option value="A+">A+</option>
                                                                  <option value="B-">B-</option>
                                                                  <option value="B+">B+</option>
                                                                  <option value="AB-">AB-</option>
                                                                  <option value="AB+">AB+</option>
                                                                  <option value="O-">O-</option>
                                                                  <option value="O+">O+</option>
                                                              </select>
                                                          </div>
                                                          <div class="form-group">
                                                              <input type="file" id="file" name="file">
                                                          </div>
                                                          <!--div class="form-group alert-up-pd">
                                                              <div class="dz-message needsclick download-custom">
                                                                  <i class="fa fa-download edudropnone" aria-hidden="true"></i>
                                                                  <h2 class="edudropnone">Drop image here or click to upload.</h2>
                                                                  <p class="edudropnone"><span class="note needsclick">(This is just a demo dropzone. Selected image is <strong>not</strong> actually uploaded.)</span>
                                                                  </p>
                                                                  <input name="imageico" class="hd-pro-img" type="text" />
                                                              </div>
                                                          </div-->
                                                      </div>
                                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <div class="form-group">
                                                                <?php 
                                                                    $req = "SHOW TABLE STATUS FROM aristone_jec LIKE 'jeciste' ";
                                                                    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
                                                                    $month = date('m');
                                                                    if($month>=9)
                                                                    {
                                                                        $year = date('y') ;
                                                                    }
                                                                    else
                                                                    {
                                                                        $year = date('y')-1;
                                                                    }
                                                                    
                                                                    $row=mysqli_fetch_assoc($fic);
                                                                ?>
                                                                <input name="matricule" type="text" class="form-control" placeholder="Matricule" value="<?php echo $year.'JEC-CI'.$row['Auto_increment']; ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="diocese" class="form-control">
                                                                    <option>*** Choisir le diocèse ***</option>
                                                                    <?php 
                                                                        $req = "select * from diocese order by libelle";
                                                                        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
                                                                        
                                                                        while($row=mysqli_fetch_assoc($fic))
                                                                        {
                                                                            if($row['libelle']==$rows['diocese'])
                                                                            {
                                                                                echo'<option value="'.$row['id'].'" selected>'.$row['libelle'].'</option>';
                                                                            }
                                                                            else
                                                                            {
                                                                                echo'<option value="'.$row['id'].'">'.$row['libelle'].'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="instance" class="form-control">
                                                                    <option>*** Choisir l'instance ***</option>
                                                                    <?php 
                                                                        $req = "select * from instance order by denomination";
                                                                        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
                                                                        
                                                                        while($row=mysqli_fetch_assoc($fic))
                                                                        {
                                                                            if($row['denomination']==$rows['denomination'])
                                                                            {
                                                                                echo'<option value="'.$row['id'].'" selected>'.$row['denomination'].'</option>';
                                                                            }
                                                                            else
                                                                            {
                                                                                echo'<option value="'.$row['id'].'">'.$row['denomination'].'</option>';
                                                                            }
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="responsabilite" class="form-control">
                                                                    
                                                                    <option value="">*** Choisir responsabilité ***</option>
                                                                    <option>Président(e)</option>
                                                                    <option>Vice Président(e)</option>
                                                                    <option>Responsable</option>
                                                                    <option>Vice Responsable</option>
                                                                    <option>Secrétaire Général(e)</option>
                                                                    <option>>Secrétaire Général(e) Adjoint(e)</option>
                                                                    <option>Trésorier(ère) Général(e)</option>
                                                                    <option>Trésorier(ère) Général(e) Adjoint(e)</option>
                                                                    <option>Secrétaire à l'Organisation</option>
                                                                    <option>Secrétaire à l'Organisation Adjoint(e)</option>
                                                                    <option>Chargé(e) de Communication</option>
                                                                    <option>Chargé(e) de Communication Adjoint(e)</option>
                                                                    <option>Membre</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                              <input type="url" class="form-control" placeholder="Facebook URL">
                                                            </div>
                                                            <div class="form-group">
                                                              <input type="url" class="form-control" placeholder="Twitter URL">
                                                            </div>
                                                            <div class="form-group">
                                                              <input type="url" class="form-control" placeholder="Instagrm URL">
                                                            </div>
                                                            <div class="form-group">
                                                              <input type="url" class="form-control" placeholder="Linkedin URL">
                                                            </div>
                                                        </div>
                                                      </div>
                                                      <button name="btn-enreg" type="submit" class="btn btn-primary waves-effect waves-light">Enregistrer</button>
                                                  </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer -->
        <?php include_once('include/footer.php'); ?>
        <!-- End footer -->
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/jquery.charts-sparkline.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="js/calendar/moment.min.js"></script>
    <script src="js/calendar/fullcalendar.min.js"></script>
    <script src="js/calendar/fullcalendar-active.js"></script>
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/datepicker/jquery-ui.min.js"></script>
    <script src="js/datepicker/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/form-validation/jquery.form.min.js"></script>
    <script src="js/form-validation/jquery.validate.min.js"></script>
    <script src="js/form-validation/form-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>