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
// Retrive form values

    $db = Database::getInstance();
     if(isset($_GET['id']) && $_GET['id'] > 0 ){
        $idCommande = (int)($_GET['id']);
        $orderManager = new OrdersManager($db);
        $orderInfo = $orderManager->getOrderFromId($idCommande);
     }
     else{
           $redirect = ActionUser::redirect("error");
     }
?>
<?php  $form = new Form(); ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modifier une commande
                        </h1>
                        <div class='alert alert-success hide' id="msg-order" >
                        La modification de la commande a bien &eacute;t&eacute; faite.
                            <?= $form->button("button", "close", "x"); ?>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modifier une commande
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <?= $form->startForm("post", "form-edit-order.php", "form-edit-order", "form"); ?>
                            <div class="form-group">
                                <?= $form->label("Nom"); ?>
                                <?= $form->inputHtml("text", array("class" => "form-control", "value" => $orderInfo->nom), "disabled"); ?>

                                <?= $form->label("Prenom"); ?>
                                <?= $form->inputHtml("text", array("class" => "form-control", "value" => $orderInfo->prenom), "disabled"); ?>

                                <?= $form->label("Email"); ?>
                                <?= $form->inputHtml("email", array("class" => "form-control", "value" => $orderInfo->email), "disabled"); ?>

                                <?= $form->label("Numero de téléphone"); ?>
                                <?= $form->inputHtml("tel", array("class" => "form-control", "value" => $orderInfo->tel), "disabled"); ?>

                                <?= $form->label("Adresse"); ?>
                                <?= $form->inputHtml("text", array("class" => "form-control", "value" => $orderInfo->adresse), "disabled"); ?>

                            </div>
                            <div class="btn-group">
                                 <?= $form->button("submit", "btn btn-primary btn-lg", "Envoyer") ?>
                                <a href="javascript:history.back()" class="btn btn-default btn-lg retour">Retour</a>
                            </div>


                    </div>
                    <div class="col-lg-6">
                        <h1>Commande</h1>
                            
                                <div class="form-group">
                                    
                                    
                                    <div class="form-group">

                                    <?= $form->label("Numero de la commande"); ?>
                                    <?= $form->inputHtml("text", array("class" => "form-control", "value" => $orderInfo->id_commande), "disabled"); ?>


                                    <?= $form->label("Date de création", "control-label", "inputWarning"); ?>
                                    <?= $form->inputHtml("text", array("class" => "form-control", "value" => $orderInfo->date_commande, "name" => "inputWarning"), "disabled"); ?>

                                    <?= $form->label("Statut de la commande"); ?>

                                        <select class="form-control" name="statut-order">
                                        <?php ?>
                                            <option label=" "></option>
                                            <option value="En attente de paiement">En attente de traitement</option>
                                            <option value="Paiement accepté">Paiement accepté</option>
                                            <option value="Livraison en cours">Livraison en cours</option>
                                            <option value="Livrée">Livrée</option>

                                        </select>
                                         <?= $form->inputHtml("hidden", array("class" => "form-control", "value" => $idCommande, "name" => "idCommande")); ?>
                                          <p>Actuellement le statut de la commande est <span class="badge"><?= $orderInfo->statut; ?></span></p>

                                          <?= $form->label("Prix total de la commande", "control-label", "inputWarning"); ?>
                                          <?= $form->inputHtml("text", array("class" => "form-control", "value" => $orderInfo->prix . "€", "name" => "inputWarning"), "disabled"); ?>
                                    </div>
                                </div>
                        <h1>Facture</h1>

                            <div class="form-group has-success">

                                <p class="control-label" for="inputWarning"><a href="show-invoice.php?<?= "id=".$idCommande; ?>" target="_blank" class="btn btn-success">Voir la facture</a></p>
                            </div>
                            
                        </form>
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