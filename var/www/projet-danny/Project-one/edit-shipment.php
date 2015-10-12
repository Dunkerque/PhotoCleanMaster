<?php include("php/header.php"); ?>

        <div id="page-wrapper">
            
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Modifier une commande
                        </h1>
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

                        <form role="form">
                          
                            <div class="form-group">
                                <label>Nom </label>
                                <input class="form-control">

                                <label>Prenom</label>
                                <input class="form-control">

                                <label>Email</label>
                                <input type="email" class="form-control" />
                                <p>email@example.com</p>
                           
                                <label>Numero de téléphone</label>
                                <input type="tel" class="form-control" rows="3" />
                           
                                <label>Adresse</label>
                                <input class="form-control"/>
                               
                                <label>Code postale</label>
                                <input class="form-control"/>
                                
                                 <label>Ville</label>
                                <input class="form-control"/>
                                
                                 <label>Pays</label>
                                <input class="form-control"/>
                                
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                            </div>
                        </form>

                    </div>
                    <div class="col-lg-6">
                        <h1>Commande</h1>

                        <form role="form">
                            
                                <div class="form-group">
                                    
                                    
                                    <div class="form-group">
                                        
                                    <label>Numero de la commande</label>
                                    <input class="form-control"/>
                                    
                                    <label>Statut de la commande</label>
                                        <select class="form-control">
                                            <option>En attente de paiement</option>
                                            <option>Paiement accepté</option>
                                            <option>Livraison en cours</option>
                                            <option>Livré</option>
                                        </select>
                                    </div>
                                       
                                    <label>Methode de paiement</label>
                                    <input class="form-control"/>
                                </div>
                        </form>

                        <h1>Facture</h1>

                        <form role="form">

                            <div class="form-group has-success">
                                <label class="control-label" for="inputSuccess">Numéro de la facture</label>
                                <input type="text" class="form-control" id="inputSuccess">
                           
                                <label class="control-label" for="inputWarning">Date de création</label>
                                <input type="text" class="form-control" id="inputWarning">
                                
                                <p class="control-label" for="inputWarning"><a href="">Voir la facture</a></p>
                            </div>
                            
                        </form>
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