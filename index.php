<?php
include ("php/header.php");
include("php/sub-header.php");
include("lib/autoload.php");
include("lib/db.php");

if($isLogged = ActionUser::isLogged() == true)
    {
        $_SESSION['messageNotConnected'] = ActionUser::messageUser("danger", "Vous devez être connecté");
        $redirect = ActionUser::redirect("login");

    }
$db = Database::getInstance();
$manager = new OrdersManager($db);
$getLastOrder = $manager->getLastOrder(10);
$manager = new UsersManager($db);
$getLastMessageUser = $manager->getAllMessage("DESC");

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="cmmol-lg-12">
                        <?php echo $message = isset($_SESSION['message']) ? $_SESSION['message'] : ""; ?>
                        <?php unset($_SESSION['message']); ?>
                        <h1 class="page-header">
                            Panneau d'administration
                        </h1>

                    </div>
                </div>
                <!-- /.row -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i>Statistique du site</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-area-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Donut Chart</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Les derniers messages utilisateur</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php if(isset($getLastMessageUser)) :?>
                                    <?php foreach($getLastMessageUser as $obj) : ?>
                                    <a href="show-message.php" class="list-group-item">
                                        <?= $obj->date_commande; ?>
                                       <p><span class="badge message-user"><?= $message = strlen($obj->description)> 20 ? substr($obj->description, 0, 30). " ..." : $obj->description;?></span></p>
                                    </a>
                                    <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="text-right">
                                    <a href="show-message.php">Voir tous les messages <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Les dernières commandes</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>Numero</th>
                                                <th>Date</th>
                                                <th>Statut</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($getLastOrder)) :?>
                                        <?php foreach($getLastOrder as $obj) : ?>
                                            <tr>
                                                <td><?= $obj->getIdCommande();?></td>
                                                <td><?= $obj->getDateCommande();?></td>
                                                <td><?= $obj->getStatut();?></td>
                                                <td><?= $obj->getPrix();?> €</td>
                                            </tr>
                                            <?php endforeach; ?>`
                                           <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="show-order.php">Voir toutes les commandes<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
<?php include ("php/footer.php"); ?>