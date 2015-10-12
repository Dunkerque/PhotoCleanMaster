<?php include("php/header.php"); ?>
    <div id="page-wrapper">
        
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ajouter des frais de ports
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Ajouter des frais ports
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form role="form">
                          
                            <div class="form-group">
                                <label>Prix </label>
                                <input type="text" class="form-control">

                                <label>Tva</label>
                                <input type="text"class="form-control">

                                <label>Transporteur</label>
                                <input type="text" class="form-control" />

                                 <label>Pays</label>
                                <input class="form-control"/>
                                
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
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