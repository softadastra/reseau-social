<?php

use App\Auth;

require_once 'header.php';
require_once 'vendor/autoload.php';
?>

<?php
$error = false;
if (isset($_SESSION['auth'])) {
    header("Location: welcome.php");
}

if (!empty($_POST)) {
    $auth = new Auth();
    $user = $auth->login($pdo, $_POST['prenom'], $_POST['password']);
    if ($user) {
        header('Location: welcome.php?login=1');
        die();
    }
    $error = true;
}

?>

<div class="container">
    <h1>Se connecter</h1>

    <?php if ($error) : ?>
        <div class="alert alert-danger">
            Prenom ou mot de passe incorrect
        </div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="prenom" class="form-control" placeholder="Votre prenom">
        </div><br>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
        </div><br>

        <button class="btn btn-primary">Se connecter</button>
    </form>

    <p>Avez-vous un compte ? <a href="enregistrer.php">Creer mon compte</a></p>
</div>

<?php require_once 'footer.php' ?>