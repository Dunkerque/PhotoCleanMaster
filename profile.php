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
    $userInfo = $manager->getUsersInfo($_SESSION['email']);

$form = new Form();


?>

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Modifier votre profil
                        </h1>
                        <div class='alert alert-success hide' id="msg-user">Les informations ont bien été modifiée
                            <?= $form->button("button", "close", "x"); ?>
                        </div>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Panneau d'administration</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Modifier votre profil
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">

                        <form role="form" action="form-edit-user.php" method="post" id="form-edit-user">

                            <div class="form-group">
                                <label>Nom </label>
                                <input class="form-control" value="<?= $userInfo->getNom(); ?>" name="user-name">

                                <label>Prenom</label>
                                <input class="form-control" value="<?= $userInfo->getPrenom(); ?>" name="user-family-name">

                                <label>Email</label>
                                <input type="email" class="form-control" value="<?= $userInfo->getEmail(); ?>" name="user-email"/>
                                <p>email@example.com</p>

                                <label>Login</label>
                                <input class="form-control" value="<?= $userInfo->getLogin(); ?>" name="user-login">


                                <label>Mot de passe (si vous ne voulez pas le changer, laissez le vide)</label>
                                <input class="form-control" type="password" name="user-password">
                                <div class="hide alert alert-danger">Veuillez saisir un nouveau mot de passe !</div>

                                <label>Numero de téléphone</label>
                                <input type="tel" class="form-control" rows="3" value="<?= $userInfo->getTel();
                                ?>" name="user-tel"/>
                                <div class="hide alert alert-danger">Veuillez insérer des chiffre pour le champs téléphone</div>

                                <label>Adresse</label>
                                <input class="form-control" value="<?= $userInfo->getAdresse(); ?>" name="user-adress"/>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                            </div>
                        </form>

                    </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include("php/footer.php"); ?>
