<?php
require_once __DIR__ . "/src/models/Livro.php";
require_once __DIR__ . "/src/models/Usuario.php";

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
</head>
<body>
    <div>
        <h1>Listagem de Livros</h1>
            <?php
            $livros = Livro::findAll();
            foreach ($livros as $livro) {
                var_dump($livro->getImg);
                echo "<div class='livro'><img src='{$livro->getImg()}' alt='{$livro->getTitulo()}'>
                <h5>{$livro->getTitulo()}</h5>
                <button onclick='{$livro->isFavorito($_SESSION['idUsuario'])} ? removeFavorito({$_SESSION['idUsuario']}) : addFavorito({$_SESSION['idUsuario']})'>
                    " . ($livro->isFavorito($_SESSION['idUsuario']) ? "Remover dos Favoritos" : "Adicionar aos Favoritos") . "
                </button>
                </div>";
            }
            ?>
    </div>
</body>
</html>