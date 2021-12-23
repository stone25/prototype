<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">

                            <li><a href="accueil.php">Accueil</a></li>
                            <?php 
                                if($_SESSION["usertype"]=='Bureau Diocésain' || $_SESSION["usertype"]=='Bureau National')
                                {
                                    echo'<li><a href="commande.php">Nouvelle commande</a></li>';
                                }

                                if($_SESSION["usertype"]=='Bureau Diocésain' || $_SESSION["usertype"]=='Bureau National')
                                {
                                    echo'<li><a href="commandes.php">Liste des commandes</a></li>';
                                }

                                if($_SESSION["usertype"]=='Bureau National')
                                {
                                    echo'<li><a href="point_diocese.php">Points des cartes</a></li>';
                                }

                                if($_SESSION["usertype"]=='Bureau Diocésain' || $_SESSION["usertype"]=='Bureau National')
                                {
                                    echo'<li><a href="correction.php">Correction</a></li>';
                                }
                            ?>
                            
                            <li><a href="jeciste.php">Membres</a></li>
                            <li><a href="../blog/index.php">Blog</a></li>
                            <li><a href="../membre/accueil.php">Espace Membre</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>