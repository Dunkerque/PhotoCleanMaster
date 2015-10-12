<?php

include("php/header.php");
include("php/sub-header.php");
include("lib/autoload.php");
include("lib/db.php");


if($isLogged = ActionUser::isLogged() == true)
{
    $_SESSION['messageNotConnected'] = ActionUser::messageUser("danger", "Vous devez être connecté ! ");
    $redirect = ActionUser::redirect("login");

}
$db = Database::getInstance();
$manager = new UsersManager($db);
$allMessageFromUser = $manager->getAllMessage();

?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Tous les messages utilisateurs
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.php">Panneau de bord</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-table"></i> Les messages utilisateurs
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->
    <?php if(isset($allMessageFromUser)) :?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-4">
                        <?php foreach($allMessageFromUser as $obj) : ?>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                               <span style="font-weight: bold;">Message de</span> <?= $obj->getPrenom(); ?> <?= $obj->getNom(); ?>
                            </div>
                            <div class="panel-body">
                                <p><?= $obj->description; ?></p>
                            </div>
                            <div class="panel-footer custom-panel">
                               Commande <?=  $obj->id_commande; ?>
                                <a class="btn btn-primary pull-right custom-btn" href="edit-order.php?id=<?=$obj->id_commande;?>">Voir la commande</a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php else : ?>
                    <div class="alert alert-warning">Cette page ne contient pas encore de message utilisateur</div>
                <?php endif; ?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include("php/footer.php"); ?>