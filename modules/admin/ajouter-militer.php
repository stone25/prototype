<?php
session_start();
include_once('src/control/connexion.php'); 
$titre = 'Membres';
$page = 'Jeciste';

if($connexion)
{
    $req = "SELECT * FROM jeciste WHERE id = '$_GET[id]'";
    $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
    $i = 0;
    $debut = 1;
    $fin = 4;
    $rows=mysqli_fetch_assoc($fic);
    
    if($rows['sexe'] == 'M' || $rows['sexe'] == 'G' || $rows['sexe'] == 'H')
    {
        $defaut = 'defaut-homme.jpg';
    }
    else
    {
        $defaut = 'defaut-femme.jpg';
    }
    
    
    if((isset($_GET['id']) && $_GET['id']==$_SESSION["userid"]) || ($_SESSION["userinstance"] == "Bureau National de Côte d'Ivoire"))
    { 
        $ans = date('Y')-substr($rows['date'],0,4);
        $age = substr($rows['date'],8,2).'/'.substr($rows['date'],5,2).' ('.$ans.' ans)';
    } 
    else
    {
        $age = substr($rows['date'],8,2).'/'.substr($rows['date'],5,2);
    }
    
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

        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="profile-info-inner">
                            <div class="profile-img">
                                <div id="photo"></div>
                            </div>
                            <div class="profile-details-hr">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Nom</b><br /> <?php echo "$rows[nom] $rows[prenom]"; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Contact</b><br /><?php echo "$rows[contact]"; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="address-hr">
                                            <p><b>Anniversaire</b><br /> <?php echo $age; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!--div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <h3>500</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <h3>900</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                        <div class="address-hr">
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <h3>600</h3>
                                        </div>
                                    </div>
                                </div-->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="product-payment-inner-st res-mg-t-30 analysis-progrebar-ctn">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Profil</a></li>
                                <!--li><a href="#reviews"> Parcours</a></li-->
                                <?php if((isset($_GET['id']) && $_GET['id']==$_SESSION["userid"]) || ($_SESSION["userinstance"] == "Bureau National de Côte d'Ivoire")){ echo'<li><a href="#information">Modification</a></li>';} ?>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit st-prf-pro">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Nom et prénoms</b><br /> <?php echo "$rows[nom] $rows[prenom]"; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Anniversaire</b><br /> <?php echo "$age"; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Contact</b><br /> <?php echo "$rows[contact]"; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>e-mail</b><br /> <?php echo "$rows[email]"; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Matricule </b><br /> <?php echo "$rows[matricule]"; ?></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--div class="row mg-b-15">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    <h2>Skill Set</h2>
                                                                    <hr />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-skill">
                                                            <h2>Java</h2>
                                                            <div class="progress progress-mini">
                                                                <div style="width: 90%;" class="progress-bar progress-yellow"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-skill">
                                                            <h2>Php</h2>
                                                            <div class="progress progress-mini">
                                                                <div style="width: 80%;" class="progress-bar progress-green"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-skill">
                                                            <h2>Apps</h2>
                                                            <div class="progress progress-mini">
                                                                <div style="width: 70%;" class="progress-bar progress-blue"></div>
                                                            </div>
                                                        </div>
                                                        <div class="progress-skill">
                                                            <h2>C#</h2>
                                                            <div class="progress progress-mini">
                                                                <div style="width: 60%;" class="progress-bar progress-red"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--div class="product-tab-list tab-pane fade" id="reviews">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="row mg-b-15">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    <h2>Parcours JEC</h2>
                                                                    <hr />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ex-pro">
                                                            <ul>
                                                                <li><i class="fa fa-angle-right"></i> <b><?php echo "$rows[instance]"; ?></b> <?php echo "$rows[responsabilite]"; ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mg-b-15">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="skill-title">
                                                                    <h2>Parcours académique</h2>
                                                                    <hr />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="ex-pro">
                                                            <ul>
                                                                
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                                <div class="product-tab-list tab-pane fade" id="information">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form method="POST" action="../src/control/inscription/inscription.php?id=<?php  echo $_GET['id']; ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select name="instance" class="form-control">
                                                                    <option>*** Choisir l'instance ***</option>
                                                                    <?php 
                                                                        $req = "SELECT i.id AS idinstance, denomination, libelle, localisation FROM instance i INNER JOIN diocese d ON d.id = i.iddiocese  ORDER BY libelle, denomination";
                                                                        $fic = mysqli_query($connexion, $req) or die(mysqli_error($connexion));
                                                                        
                                                                        while($row=mysqli_fetch_assoc($fic))
                                                                        {
                                                                            echo'<option value="'.$row['idinstance'].'">'.$row['libelle'].' - '.$row['denomination'].' ('.$row['localisation'].')</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <select name="responsabilite" class="form-control">
                                                                    <option value="">*** Choisir responsabilité ***</option>
                                                                    <option>Président(e)</option>
                                                                    <option>Vice Président(e)</option>
                                                                    <option>Responsable</option>
                                                                    <option>Vice Responsable</option>
                                                                    <option>Secrétaire Général(e)</option>
                                                                    <option>Secrétaire Général(e) Adjoint(e)</option>
                                                                    <option>Trésorier(ère) Général(e)</option>
                                                                    <option>Trésorier(ère) Général(e) Adjoint(e)</option>
                                                                    <option>Secrétaire à l'Organisation</option>
                                                                    <option>Secrétaire à l'Organisation Adjoint(e)</option>
                                                                    <option>Chargé(e) de Communication</option>
                                                                    <option>Chargé(e) de Communication Adjoint(e)</option>
                                                                    <option>Membre</option>
                                                                </select>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin: 5px;">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress mg-t-15">
                                                                <button type="submit" name="ajout-militer" class="btn btn-primary waves-effect waves-light mg-b-15">Enregistrer</button>
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
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/upload/upload.js"></script>

    
</body>

</html>