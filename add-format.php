<?php
include("php/header.php");
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
                            Ajouter un format
                        </h1>
                         <div class='alert alert-success hide' id="msg-addFormat" >
                        L'ajout du format a bien &eacute;t&eacute; faite.
                            <button class="close" type="button">x</button>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modifier un format
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">
                <?= $form->startForm("post", "action-add-format.php", "form-add-format"); ?>

                            <div class="form-group">
                                <div class="hide alert alert-danger">Le nom du format existe deja</div>
                                <?= $form->label("Nom du format"); ?>
                                <?= $form->inputHtml("text", array("class" => "form-control","name" => "name-format")); ?>
                                <div class="hide alert alert-danger">Le nom du format n'est pas correct</div>

                               <?= $form->label("Tarif"); ?>
                               <?= $form->inputHtml("text", array("class" => "form-control","name" => "tarif-format")); ?>
                                <div class="hide alert alert-danger">Le tarif ne peux pas contenir de chiffre ou ne peux être vide</div>
                            </div>
                            <div class="btn-group">
                                <?= $form->button("submit", "btn btn-primary btn-lg", "Envoyer"); ?>
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