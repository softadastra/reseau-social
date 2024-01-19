<?php
$pdo = new PDO('mysql:host=localhost;dbname=yann_db;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);
