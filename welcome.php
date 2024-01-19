<?php session_start() ?>
<?php
require_once 'config.php';
try {
    $query = $pdo->prepare('SELECT * FROM posts ORDER BY date_creation DESC');
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
    <link rel="stylesheet" href="app.css">
    <title>Universites UOR</title>
    <style>
        a {
            text-decoration: none;
        }
    </style>
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

        <main class="main">

            <?php foreach ($result as $post) :
                $queryUser = $pdo->prepare('SELECT * FROM users WHERE id = ?');
                $queryUser->execute([$post['user_id']]);
                $userId = $queryUser->fetch();
            ?>
                <article class="card">
                    <header class="card-header card-header-avatar">
                        <img src="avatar.avif" alt="" width="45px" height="45px" class="card-avatar">
                        <div class="card-title" style="padding-left:50px;text-transform:capitalize;"><?= $userId['nom'] ?> <?= $userId['prenom'] ?></div>
                        <div class="card-date" style="padding-left:50px;">Publier le <?= $post['date_creation'] ?></div>
                    </header>
                    <div class="card-body">
                        <?php if (strstr($post['image'], '.pdf')) : ?>
                            <button class="btn" style="background: #f19000;"><a href="upload/produit/<?= $post['image'] ?>" target="_blank" style="text-decoration: none;color:#fff;">Telecharger le fichier PDF(.pdf)</a></button>

                        <?php elseif (strstr($post['image'], '.zip')) : ?>
                            <button class="btn" style="background: #f19000;"><a href="upload/produit/<?= $post['image'] ?>" target="_blank" style="text-decoration: none;color:#fff;">Telecharger le fichier ZIP(.zip)</a></button>

                        <?php elseif (strstr($post['image'], '.txt')) : ?>
                            <button class="btn" style="background: #f19000;"><a href="upload/produit/<?= $post['image'] ?>" target="_blank" style="text-decoration: none;color:#fff;">Telecharger le fichier TEXTE(.txt)</a></button>

                        <?php elseif (strstr($post['image'], '.xls')) : ?>
                            <button class="btn" style="background: #f19000;"><a href="upload/produit/<?= $post['image'] ?>" target="_blank" style="text-decoration: none;color:#fff;">Telecharger le fichier EXCEL(.xls)</a></button>

                        <?php else : ?>
                            <p><a href=""><img src="upload/produit/<?= $post['image'] ?>" class="fullwidth"></a></p>
                        <?php endif ?>
                        <p><?= $post['content'] ?></p>
                    </div>
                </article>
            <?php endforeach ?>

        </main>
        <aside class="aside">
            <article class="card profil">
                <header class="card-header card-header-avatar">
                    <div class="card-title">Administrateur</div>
                    <div class="card-date"><?= date('d/m/Y') ?></div>
                </header>
                <div class="card-body">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente sint quis ipsa voluptatibus, eaque atque provident voluptate cupiditate architecto a, dignissimos laboriosam sunt debitis molestiae deleniti. Molestias quia dolore, ut ex quis voluptatibus quod recusandae error. Tempore, totam fuga? Quis sint cupiditate enim id exercitationem! Non quidem </p>
                </div>
            </article>
        </aside>


    </div>
</body>

</html>