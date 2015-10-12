<?php
    include("php/header.php");
    include("lib/autoload.php");
    include("lib/db.php");

if($isLogged = ActionUser::isLogged() == false)
{
    $_SESSION['message'] = ActionUser::messageUser("warning", "Vous êtes déjà connecté");
    $redirect = ActionUser::redirect("index");

}
//connection bdd lance qu'une instance à la bdd
    $db = Database::getInstance();
//verifie si l'admin s'est déconnecté
    if(isset($_GET['m'])){
        $message = ActionUser::messageUser("warning", "Vous êtes bien déconnecté");
    }
    else if(isset($_SESSION['messageNotConnected']))
        $message = ActionUser::messageUser("danger", "Vous devez être connectée"); unset($_SESSION['messageNotConnected']);

    if(isset($_POST['admin_email'], $_POST['admin_password'])){
        $emailAdmin = filter_input(INPUT_POST,'admin_email',  FILTER_SANITIZE_EMAIL);
        $passAdmin = filter_input(INPUT_POST, 'admin_password', FILTER_SANITIZE_STRING);
        $checkUser = new ActionUser($db);
        //verifie si les informations d'authentification sont bons et redirige vers le backoffice
        if($checkUser->checkIsAdmin($emailAdmin, $passAdmin))
        {
           $passAdmin = md5($passAdmin);
           $userManager = new UsersManager($db);
            $getInfoUser = $userManager->getUsersInfo($emailAdmin, $passAdmin);
            if($passAdmin == $getInfoUser->getMdp())
            {
                $_SESSION['id_client'] = $getInfoUser->getId();
                $_SESSION['login'] = $getInfoUser->getLogin();
                $_SESSION['email'] = $getInfoUser->getEmail();
                $_SESSION['active'] = "1";
                $_SESSION['message'] = ActionUser::messageUser("warning", "Vous êtes bien connecté");
                $redirect = ActionUser::redirect("index");
            }
        }
        else{
             $message = ActionUser::messageUser("danger", "Votre email ou votre mot de passe est incorrect");
        }
    }

?>
<div class="container">
   <?php echo $message = isset($message) ? (string)$message : "";?>

     <form class="form-signin" method="post" action="login.php">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="admin_email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required  name="admin_password">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

</div>

<?php include("php/footer.php"); ?>