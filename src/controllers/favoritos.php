<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once __DIR__ . '/../models/Livro.php';

session_start();

if($_SESSION['logado'] !== true){
    http_response_code(401);
    echo json_encode(['error' => 'Usuário não autenticado']);
    exit;
}

if(!isset($_POST['idLivro']) || !isset($_POST['action'])){
    http_response_code(400);
    echo json_encode(['error' => 'Parâmetros inválidos']);
    exit;
}

$id_livro = intval($_POST['idLivro']);
$action = $_POST['action'];
$id_usuario = intval($_SESSION['idUsuario']);

if($action === 'adicionar'){
    Livro::addFavorito($id_usuario, $id_livro);
    echo 'adicionado';
} else if ($action === 'remover'){
    Livro::removeFavorito($id_usuario, $id_livro);
    echo 'removido';
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Ação inválida']);
}
exit;