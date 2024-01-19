<?php session_start() ?>
<?php
require_once 'config.php';
try {
    $query = $pdo->prepare('SELECT * FROM users WHERE id_fonction = 1 ORDER BY date_creation DESC');
    $query->execute();
    $result = $query->fetchAll();
} catch (PDOException $e) {
    die("Erreur");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="flattly.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/adastra.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/categorie.css">
    <title>Universites UOR</title>
</head>

<body>
    <header class="topbar">
        <a href="welcome.php" class="topbar-logo" style="color: #fff;">Universites UOR</a>
        <nav class="topbar-nav">
            <a href="etudiant.php" class="active">Etudiants</a>
            <a href="enseignant.php">Enseignants</a>
            <a href="logout.php">Se deconnecter</a>
        </nav>

    </header>

    <div class="container site">
        <nav class="sidebar">
            <a href="welcome.php" class="sidebar-home" style="color: #000;font-weight:600;">Actualites</a>
            <a href="create_post.php" class="sidebar-messages" style="color: #000;font-weight:600;">Creer un post</a>
        </nav>

        <div class="container">
            <h2>Les enseignants inscrit</h2>
            <div class="product" style="margin-top:3px;">
                <div class="categorie">
                    <div class="content">
                        <?php
                        foreach ($result as $user) :
                        ?>
                            <div class="box">
                                <div class="imgBx">
                                    <a href="chat.php?id=<?= $user['id'] ?>"><img src="avatar.avif" alt="<?= $user['nom'] ?>"></a>
                                </div>
                                <div class="text" style="background: #f1f1f1;">
                                    <h6 style="text-transform: capitalize;"><?= $user['nom']; ?> <?= $user['prenom']; ?></h6>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>