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
    $manager = new OrdersManager($db);
    $getOrders = $manager->getOrders(true);

?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Toutes les commandes
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Panneau de bord</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Les commandes
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Numero Commande</th>
                                        <th>Nom du client</th>
                                        <th>Id Du client</th>
                                        <th>Email</th>
                                        <th>Prix</th>
                                        <th>Statut</th>
                                        <th>Date commande</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 <?php if(isset($getOrders)) :?>
                                 <?php foreach($getOrders as $obj) : ?>
                                    <tr>

                                        <td><?= $obj->getIdCommande(); ?></td>
                                        <td><?= $obj->nom; ?></td>
                                        <td><?= $obj->getIdClient(); ?></td>
                                        <td><?= $obj->email ?></td>
                                        <td><?= $obj->getPrix(); ?></td>
                                        <td class="statement-order"><?= $obj->getStatut(); ?></td>
                                        <td><?= $obj->getDateCommande(); ?></td>
                                        <td><a href="edit-order.php?id=<?= $obj->getIdCommande(); ?>">Modifier la commande</a></td>

                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include("php/footer.php"); ?>