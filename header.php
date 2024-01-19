<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app.css">
    <title>Se connecter</title>
</head>

<body>
    <div class="container">