<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/src/models/Livro.php";

session_start();
if(!isset($_SESSION['logado']) || $_SESSION['logado'] !== true){
    header("location: index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <script src='src/scripts/script.js' defer></script>
    <link rel="stylesheet" href="src/styles/style.css">
</head>
<body>
    <div class='container'>
        <div class='navbar'>
            <a href="homepage.php">Home</a>
            <a href="listagemFavoritos.php">Favoritos</a>
            <a href="src/controllers/logout.php">Sair</a>
        </div>
        <div class='apresentacao'>
            <div class='titulo'>
                <h1>Listagem de Livros</h1>
            </div>
            <div class='listagem'>
                <?php
                $livros = Livro::findAll();
                foreach ($livros as $livro) {
                    echo "<div class='livro'>
                    <figure class='capa'><img src='resource/{$livro->getImg()}' alt='{$livro->getTitulo()}'></figure>
                    <h5>{$livro->getTitulo()}</h5>
                    <button class='favoritar' data-id='{$livro->getId()}'>".
                    ($livro->isFavorito($_SESSION['idUsuario']) ? "Remover dos favoritos" : "Adicionar aos favoritos") .
                    "</button>
                    </div>";
                }
                ?>
            </div>
            
        </div>
        
    </div>
</body>
</html>