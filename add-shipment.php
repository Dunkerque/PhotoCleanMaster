<?php include("php/header.php");
include("php/sub-header.php");
include("lib/autoload.php");
if($isLogged = ActionUser::isLogged() == true)
{
     $_SESSION['messageNotConnected'] = ActionUser::messageUser("danger", "Vous devez être connecté ! ");
    $redirect = ActionUser::redirect("login");

}

?>
<?php $form = new Form(); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modifier un frais de port
                        </h1>
                        <div class='alert alert-success hide' id="msg-addShipment" >
                        L'ajout du frais de port a bien &eacute;t&eacute; faite.
                            <button class="close" type="button">x</button>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Panneau de bord</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modifier un frais de port
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                    <?= $form->startForm("post", "form-add-shipment.php", "form-add-shipment"); ?>
                            <div class="form-group">
                            <?= $form->label("Tarif"); ?>
                            <?= $form->inputHtml("text", array("class" => "form-control", "name" => "tarif-shipment")); ?>
                                <div class="hide alert alert-danger">Le tarif ne peux pas contenir de chiffre ou ne peux être vide</div>
                                 <?= $form->label("Transporteur"); ?>
                                  <?= $form->inputHtml("text", array("class" => "form-control", "name" => "transport-shipment")); ?>
                                <div class="hide alert alert-danger">Le transporteur ne peux être vide</div>
                            </div>
                            <div class="btn-group">
                             <?= $form->button("submit","btn btn-primary btn-lg","Envoyer"); ?>
                            </div>
                      <?= $form->endForm(); ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("php/footer.php"); ?>