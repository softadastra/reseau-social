<?php

require_once 'header.php';
$errors = [];
$success = false;

?>

<?php
if (!empty($_POST)) {
    if (empty($_POST['nom'])) {
        $errors['nom'] = "Veillez renseigner votre nom";
    }

    if (empty($_POST['prenom'])) {
        $errors['prenom'] = "Veillez renseigner votre prenom";
    }

    if (empty($_POST['password']) || empty($_POST['cust_re_password'])) {
        $errors['password'] = "Veillez completer votre mot de passe";
    }

    if (!empty($_POST['password']) && !empty($_POST['cust_re_password'])) {
        if ($_POST['password'] != $_POST['cust_re_password']) {
            $errors['password'] = "Veillez confirmer votre mot de passe";
        }
    }

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['id_fonction']) && !empty($_POST['id_faculte']) && !empty($_POST['id_departement']) && !empty($_POST['id_promotion'])) {

        try {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $id_fonction = $_POST['id_fonction'];
            $id_faculte = $_POST['id_faculte'];
            $id_departement = $_POST['id_departement'];
            $id_promotion = $_POST['id_promotion'];

            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $query = $pdo->prepare(
                'INSERT INTO Users(id,nom,prenom,id_fonction,id_faculte,id_departement,id_promotion,password,date_creation) VALUES(null,?,?,?,?,?,?,?,NOW())'
            );

            $query->execute([
                $nom,
                $prenom,
                $id_fonction,
                $id_faculte,
                $id_departement,
                $id_promotion,
                $password
            ]);

            $success = true;
            $_POST = [];
        } catch (PDOException $e) {
            die("Erreur :) " . $e->getMessage());
        }
    }
}

?>

<div class="container">
    <h1>Creer votre compte</h1>

    <?php if ($success) : ?>
        <div class="alert alert-success">Compte creer avec success</div>
    <?php endif ?>

    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger"><?php var_dump($errors) ?></div>
    <?php endif ?>

    <form action="" method="post">

        <div class="form-group">
            <input type="text" name="nom" class="form-control" placeholder="Votre nom">
        </div><br>

        <div class="form-group">
            <input type="text" name="prenom" class="form-control" placeholder="votre prenom">
        </div><br>

        <?php
        $fonctions = $pdo->query("SELECT *FROM tbl_fonctions")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label>Fonction</label>
        <select name="id_fonction" class="form-control my-2">
            <option value="">Choississez une fonction</option>
            <?php foreach ($fonctions as $fonction) : ?>
                <?php
                echo "<option value='" . $fonction['id'] . "'>" . $fonction['name'] . "</option>";
                ?>
            <?php endforeach; ?>
        </select><br>

        <?php
        $facultes = $pdo->query("SELECT *FROM tbl_facultes")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label>Facultes</label>
        <select name="id_faculte" class="form-control my-2">
            <option value="">Choississez une faculte</option>
            <?php foreach ($facultes as $faculte) : ?>
                <?php
                echo "<option value='" . $faculte['id'] . "'>" . $faculte['name'] . "</option>";
                ?>
            <?php endforeach; ?>
        </select><br>

        <?php
        $departements = $pdo->query("SELECT *FROM tbl_departements")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label>Departements</label>
        <select name="id_departement" class="form-control my-2">
            <option value="">Choississez votre departement</option>
            <?php foreach ($departements as $departement) : ?>
                <?php
                echo "<option value='" . $departement['id'] . "'>" . $departement['name'] . "</option>";
                ?>
            <?php endforeach; ?>
        </select><br>

        <?php
        $promotions = $pdo->query("SELECT *FROM tbl_promotions")->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label>Votre promotion</label>
        <select name="id_promotion" class="form-control my-2">
            <option value="">Choississez votre promotion</option>
            <?php foreach ($promotions as $promotion) : ?>
                <?php
                echo "<option value='" . $promotion['id'] . "'>" . $promotion['name'] . "</option>";
                ?>
            <?php endforeach; ?>
        </select><br>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Votre mot de passe">
        </div><br>

        <div class="form-group">
            <input type="password" name="cust_re_password" class="form-control" placeholder="confirmer votre mot de passe">
        </div><br>

        <button class="btn btn-primary">Creer mon compte</button>

    </form>
</div>
<?php require_once 'footer.php' ?>