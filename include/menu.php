<!-- Preloader -->
<div id="preloader">
    <div class="wrapper">
        <div class="cssload-loader"></div>
    </div>
</div>

<!-- ***** Top Search Area Start ***** -->
<div class="top-search-area">
    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- Close Button -->
                    <button type="button" class="btn close-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                    <!-- Form -->
                    <form action="index.php" method="post">
                        <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Top Search Area End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area">
    <!-- Main Header Start -->
    <div class="main-header-area">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="uzaNav">

                <!-- Logo -->
                <a class="nav-brand" href="index.php"><img src="./img/core-img/logo.png" alt=""></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Menu Close Button -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul id="nav">
                            <li <?php if(isset($menu_selected['accueil'])){echo $menu_selected['accueil'];} ?> ><a href="./index.php">Accueil</a></li>
                            <li <?php if(isset($menu_selected['presentation'])){echo $menu_selected['presentation'];} ?> ><a href="presentation.php">Pr??sentation</a></li>
                            <li <?php if(isset($menu_selected['diocese'])){echo $menu_selected['diocese'];} ?> ><a href="diocese.php">Dioc??ses</a></li>
                            <li <?php if(isset($menu_selected['blog'])){echo $menu_selected['blog'];} ?> ><a href="blog.php">Blog</a></li>
                            <!--li <?php if(isset($menu_selected['activite'])){echo $menu_selected['activite'];} ?> ><a href="activite/index.php">Activit??s</a></li-->
                            <li <?php if(isset($menu_selected['contact'])){echo $menu_selected['contact'];} ?> ><a href="contact.php">Contact</a></li>
                        </ul>

                        <!-- Get A Quote -->
                        <div class="get-a-quote ml-4 mr-3">
                            <a href="modules/inscription/index.php" target="_blank" class="btn uza-btn">Inscription</a>
                        </div>

                        <div class="get-a-quote ml-4 mr-3">
                            <a href="modules/admin/index.php" target="_blank" class="btn uza-btn">Connexion</a>
                        </div>

                        <!-- Search Icon -->
                        <!--div class="search-icon" data-toggle="modal" data-target="#searchModal">
                            <i class="icon_search"></i>
                        </div-->
                    </div>
                    <!-- Nav End -->

                </div>
            </nav>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->