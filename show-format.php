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
$manager = new FormatManager($db);
$getFormat = $manager->getAllFormat();


?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Tous les formats
                    </h1>
                    <div class='alert alert-success hide' id="msg-deleteFormat" >
                        La suppression du format  a bien &eacute;t&eacute; faite.
                        <button class="close" type="button">x</button>
                    </div>
                    <div class='alert alert-success hide' id="msg-editFormat" >
                        La modification du format a bien &eacute;t&eacute; faite.
                        <button class="close" type="button">x</button>
                    </div>
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
                <div class="col-lg-6">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="show-format">
                            <thead>
                            <tr>
                                <th>idFormat</th>
                                <th>Format</th>
                                <th>Tarif</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($getFormat) && !empty($getFormat)) :?>
                                <?php foreach($getFormat as $obj) : ?>
                                    <tr>

                                        <td><?= $obj->getIdFormat(); ?></td>
                                        <td><?= $obj->getFormat(); ?></td>
                                        <td><?= $obj->getTarif(); ?></td>
                                        <td><button type="button" class="btn btn-primary" data-id="<?= $obj->getIdFormat(); ?>" data-tarif="<?= $obj->getTarif(); ?>" data-format="<?= $obj->getFormat(); ?>" data-toggle="modal" data-target="#editModalFormat" id="openModalFormat">Modifier le format</button></td>
                                        <td><button type="button" class="btn btn-danger" id="deleteFormat">Supprimer le format</button></td>

                                    </tr>
                                    <?php include("edit-format.php"); ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="alert alert-danger">Vous n'avez pas de format <a href="add-format.php" class="">Ajouter un format ? </a></div>
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