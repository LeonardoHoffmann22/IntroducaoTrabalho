<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/src/models/Livro.php";
require_once __DIR__ . "/src/models/Usuario.php";

session_start();
if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
    header("location: index.php");
    exit;
}

$id_usuario = intval($_SESSION['idUsuario']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src='src/scripts/script.js' defer></script>
</head>
<body>
    <div class='container'>
        <div class='navbar'>
            <a href="homepage.php">Home</a>
            <a href="listagemFavoritos.php">Favoritos</a>
            <a href="src/controllers/logout.php">Sair</a>
        </div>
        <h1>Meus livros favoritos:</h1>
            <?php
            $livros = Livro::findAllFavoritos($id_usuario);
            foreach ($livros as $livro) {
                echo "<div class='livro'>
                <figure class='capa'><img src='resource/{$livro->getImg()}' alt='{$livro->getTitulo()}'></figure>
                <h5>{$livro->getTitulo()}</h5>
                <button class='favoritar' data-id='{$livro->getId()}'>".
                   ($livro->isFavorito($id_usuario) ? "Remover dos favoritos" : "Adicionar aos favoritos") .
                "</button>  
                </div>";
            }
            ?>
    </div>
</body>
</html>