<?php
ob_start();  //Permet d'�viter d'envoyer plusieurs fois des ent�tes http
?>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">SB Admin</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $login = isset($_SESSION['login']) ? $_SESSION['login'] : ""; ?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="active">
                    <a data-toggle="collapse" data-target="#menu1" aria-expanded="false" aria-controls="menu1">
                        Commandes
                    </a>
                    <ul class="collapse" id="menu1">
                        <li><a href="show-order.php">Voir toutes les commande</a></li>
                        <li><a href="show-statement.php?statement=waiting">En attente de paiement</a></li>
                        <li><a href="show-statement.php?statement=paiement">Paiement accepte</a></li>
                        <li><a href="show-statement.php?statement=currentDelivery">Livraison en cours</a></li>
                        <li><a href="show-statement.php?statement=livery">Livree</a></li>
                    </ul>
                </li>
                <li>
                    <a data-toggle="collapse" data-target="#menu2" aria-expanded="false" aria-controls="menu2">
                        Frais de port
                    </a>

                    <ul class="collapse" id="menu2">
                        <li><a href="add-shipment.php">Ajouter les frais de port</a></li>
                        <li><a href="show-shipment.php">Voir les frais de port</a></li>
                    </ul>


                </li>
                <li>
                    <a data-toggle="collapse" data-target="#menu3" aria-expanded="false" aria-controls="menu3"><i class="fa fa-fw fa-table"></i>Formats</a>

                    <ul class="collapse" id="menu3">
                        <li><a href="add-format.php">Ajouter un format</a></li>
                        <li><a href="show-format.php">Voir tous les formats</a></li>
                    </ul>
                </li>
                <li>
                    <a href="show-message.php"><i class="fa fa-fw fa-edit"></i>Messages</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
