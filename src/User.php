<?php

namespace App;

use DateTimeInterface;

class User
{
    public int $id;
    public string $nom;
    public string $prenom;
    public int $id_fonction;
    public int $id_faculte;
    public int $id_departement;
    public int $id_promotion;
    public $password;
}
