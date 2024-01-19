<?php

namespace App;

class Auth
{
    public function user()
    {
    }

    public function login(\PDO $pdo, string $prenom, string $password)
    {
        $query = $pdo->prepare('SELECT * FROM users WHERE prenom = :prenom');
        $query->execute(['prenom' => $prenom]);
        $query->setFetchMode(\PDO::FETCH_CLASS, User::class);
        $user = $query->fetch();
        if ($user === false) {
            return null;
        }

        if (password_verify($password, $user->password)) {
            $_SESSION['auth'] = $user->id;
            return $user;
        }

        return null;
    }
}
