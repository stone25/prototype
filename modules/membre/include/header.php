<div class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="" href="index.html"><span class="navbar-brand"><span class="fa fa-paper-plane"></span> JEC-CI - Espace Membre</span></a></div>

    <div class="navbar-collapse collapse" style="height: 1px;">
        <ul id="main-menu" class="nav navbar-nav navbar-right">
        <li class="dropdown hidden-xs">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> <?php if(isset($_SESSION["username"]) && isset($_SESSION["userprenom"])){$username = "$_SESSION[username] $_SESSION[userprenom]"; echo $username;} ?>
                <i class="fa fa-caret-down"></i>
            </a>

            <ul class="dropdown-menu">
            <li><a href="../src/control/admin/utilisateur.php?logout">Déconnexion</a></li>
            </ul>
        </li>
        </ul>

    </div>
    </div>
</div>