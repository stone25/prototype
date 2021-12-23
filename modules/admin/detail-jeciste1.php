<?php
session_start();
include_once('src/control/connexion.php'); 
$titre = 'Membres';
$page = 'Jeciste';

if($connexion)
{
    $req = "select jeciste.id as id, matricule, nom, prenom, date, lieu, contact, email, sexe, photo, cni, denomination, statut, diocese.libelle as diocese from jeciste inner join militer on jeciste.id = militer.idjeciste inner join instance on militer.idinstance = instance.id inner join diocese on diocese.id = instance.iddiocese where jeciste.id = '$_GET[id]'";
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
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr">
                                            <p><b>Instance</b><br /> <?php echo "$rows[denomination]"; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                        <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                            <p><b>Responsabilité</b><br /> <?php echo "$rows[statut]"; ?></p>
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
                                                            <p><b>Diocèse</b><br /> <?php echo "$rows[diocese]"; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Instance</b><br /> <?php echo "$rows[denomination]"; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                                        <div class="address-hr biography">
                                                            <p><b>Responsabilité</b><br /> <?php echo "$rows[statut]"; ?></p>
                                                        </div>
                                                    </div>
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
                                                <form method="POST" action="src/control/membre.php?id=<?php  echo $_GET['id']; ?>" enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <input name="nom" type="text" class="form-control" placeholder="Nom" value="<?php echo $rows["nom"]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="prenom" type="text" class="form-control" placeholder="Prénoms" value="<?php echo $rows["prenom"]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="date" type="date" class="form-control" placeholder="Date de naissance" value="<?php echo date($rows["date"]); ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="lieu" type="text" class="form-control" placeholder="Lieu de naissance" value="<?php echo $rows["lieu"]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="contact" type="text" class="form-control" placeholder="Contact" value="<?php echo $rows["contact"]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="email" type="email" class="form-control" placeholder="e-mail" value="<?php echo $rows["email"]; ?>">
                                                            </div>
                                                            <div class="file-upload-inner ts-forms">
                                                                <div class="input prepend-big-btn">
                                                                    <label class="icon-right" for="prepend-big-btn">
                                                                            <i class="fa fa-download"></i>
                                                                        </label>
                                                                    <div class="file-button">
                                                                        <input type="file" id="file" onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                                    </div>
                                                                    <input type="text" name="filename" id="prepend-big-btn" placeholder="no file selected">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group sm-res-mg-15 tbpf-res-mg-15">
                                                                <input name="matricule" type="text" id="matricule" class="form-control" placeholder="Matricule" value="<?php echo $rows["matricule"]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="sexe" class="form-control">
                                                                    <option value="">*** Choisir le genre ***</option>
                                                                    <?php 
                                                                        if($rows["sexe"]=='F')
                                                                        {
                                                                            echo'<option value="H">Homme</option>
                                                                            <option value="F" selected>Femme</option>';
                                                                        }
                                                                        else
                                                                        {
                                                                            echo'<option value="H" selected>Homme</option>
                                                                            <option value="F">Femme</option>';
                                                                        }
                                                                    ?>
                                                                </select>
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
                                                                    <?php 
                                                                        $respo1 = $respo2 = $respo3 = $respo4 = $respo5 = $respo6 = $respo7 = $respo8 = $respo9 = $respo10 = $respo11 = $respo12 = $respo13 = '';
                                    
                                                                        if($rows['statut'] == 'Président(e)')
                                                                        { 
                                                                            $respo1 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Vice Président(e)')
                                                                        { 
                                                                            $respo2 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Responsable')
                                                                        { 
                                                                            $respo3 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Vice Responsable')
                                                                        { 
                                                                            $respo4 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Secrétaire Général(e)')
                                                                        { 
                                                                            $respo5 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Secrétaire Général(e) Adjoint(e)')
                                                                        { 
                                                                            $respo6 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Trésorier(ère) Général(e)')
                                                                        { 
                                                                            $respo7 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Trésorier(ère) Général(e) Adjoint(e)')
                                                                        { 
                                                                            $respo8 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == "Secrétaire à l'Organisation")
                                                                        { 
                                                                            $respo9 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == "Secrétaire à l'Organisation Adjoint(e)")
                                                                        { 
                                                                            $respo10 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Chargé(e) de Communication')
                                                                        { 
                                                                            $respo11 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Chargé(e) de Communication Adjoint(e)')
                                                                        { 
                                                                            $respo12 = 'selected';
                                                                        }
                                                                        else if($rows['statut'] == 'Membre' || $rows['statut'] == 'MEMBRE')
                                                                        { 
                                                                            $respo13 = 'selected';
                                                                        }
                                                                    ?>
                                                                    <option value="">*** Choisir responsabilité ***</option>
                                                                    <option <?php echo $respo1 ?>>Président(e)</option>
                                                                    <option <?php echo $respo2 ?>>Vice Président(e)</option>
                                                                    <option <?php echo $respo3 ?>>Responsable</option>
                                                                    <option <?php echo $respo4 ?>>Vice Responsable</option>
                                                                    <option <?php echo $respo5 ?>>Secrétaire Général(e)</option>
                                                                    <option <?php echo $respo6 ?>>Secrétaire Général(e) Adjoint(e)</option>
                                                                    <option <?php echo $respo7 ?>>Trésorier(ère) Général(e)</option>
                                                                    <option <?php echo $respo8 ?>>Trésorier(ère) Général(e) Adjoint(e)</option>
                                                                    <option <?php echo $respo9 ?>>Secrétaire à l'Organisation</option>
                                                                    <option <?php echo $respo10 ?>>Secrétaire à l'Organisation Adjoint(e)</option>
                                                                    <option <?php echo $respo11 ?>>Chargé(e) de Communication</option>
                                                                    <option <?php echo $respo12 ?>>Chargé(e) de Communication Adjoint(e)</option>
                                                                    <option <?php echo $respo13 ?>>Membre</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input name="cni" type="text" class="form-control" placeholder="Numéro CNI" value="<?php echo $rows["cni"]; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <select name="sang" class="form-control">
                                                                    <?php 
                                                                        $sang1 = $sang2 = $sang3 = $sang4 = $sang5 = $sang6 = $sang7 = $sang8 = '';
                                    
                                                                        if($rows['sang'] == 'A-')
                                                                        { 
                                                                            $sang1 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'A+')
                                                                        { 
                                                                            $sang2 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'B-')
                                                                        { 
                                                                            $sang3 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'B+')
                                                                        { 
                                                                            $sang4 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'AB-')
                                                                        { 
                                                                            $sang5 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'AB+')
                                                                        { 
                                                                            $sang6 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'O-')
                                                                        { 
                                                                            $sang7 = 'selected';
                                                                        }
                                                                        else if($rows['sang'] == 'O+')
                                                                        { 
                                                                            $sang8 = 'selected';
                                                                        }
                                                                    ?>
                                                                    <option value="">*** Choisir groupe sanguin ***</option>
                                                                    <option value="A-" <?php echo $sang1 ?>>A-</option>
                                                                    <option value="A+" <?php echo $sang2 ?>>A+</option>
                                                                    <option value="B-" <?php echo $sang3 ?>>B-</option>
                                                                    <option value="B+" <?php echo $sang4 ?>>B+</option>
                                                                    <option value="AB-" <?php echo $sang5 ?>>AB-</option>
                                                                    <option value="AB+" <?php echo $sang6 ?>>AB+</option>
                                                                    <option value="O-" <?php echo $sang7 ?>>O-</option>
                                                                    <option value="O+" <?php echo $sang8 ?>>O+</option>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin: 5px;">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress mg-t-15">
                                                                <button type="submit" name="modifierJeciste" class="btn btn-primary waves-effect waves-light mg-b-15">Enregistrer</button>
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