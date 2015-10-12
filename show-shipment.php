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
$manager = new ShipmentManager($db);
$getShipment = $manager->getAllShipment();
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Tous les frais de port
                </h1>
                <div class='alert alert-success hide' id="msg-deleteShipment" >
                    La suppression du frais de port  a bien &eacute;t&eacute; faite.
                    <button class="close" type="button">x</button>
                </div>
                <div class='alert alert-success hide' id="msg-editShipment" >
                    La modification du frais de port  a bien &eacute;t&eacute; faite.
                    <button class="close" type="button">x</button>
                </div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.php">Panneau de bord</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Les frais de port
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="show-shipment">
                        <?php if(isset($getShipment) && !empty($getShipment)):?>
                        <thead>
                        <tr>
                            <th>idShipment</th>
                            <th>Tarif</th>
                            <th>Transport</th>

                        </tr>
                        </thead>
                        <tbody>

                            <?php foreach($getShipment as $obj) : ?>
                                <tr>
                                    <td><?= $obj->getIdShipment(); ?></td>
                                    <td><?= $obj->getTarif(); ?></td>
                                    <td><?= $obj->getTransport(); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-id="<?= $obj->getIdShipment(); ?>" data-tarif="<?= $obj->getTarif(); ?>" data-transport="<?= $obj->getTransport(); ?>" data-toggle="modal" data-target="#editModal" id="openModal">Modifier le format</button></td>

                                    <td><button type="button" class="btn btn-danger" id="deleteShipment">Supprimer le format</button></td>
                                </tr>

                            <?php include("edit-shipment.php"); ?>

                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                                <div class="alert alert-danger">Vous n'avez pas de frais de port <a href="add-shipment.php" class="">Ajouter un frais de port ? </a></div>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>


<?php include("php/footer.php"); ?>