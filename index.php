<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['botao'])){
    require_once __DIR__."/src/models/Usuario.php";

    $u = new Usuario($_POST['email'], $_POST['senha']);
    if($u->authenticate()){
        header("location: homepage.php");
        exit;
    }else{
        header("location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuário</title>
    <link rel="stylesheet" href="src/styles/style.css" >
</head>
<body>
    <form action='index.php' method='post'>
        <label for='email'>E-mail:</label>
        <input type='email' name='email' id='email' required>
        <label for='senha'>Senha:</label>
        <input type='password' name='senha' id='senha' required>
        <input type='submit' name='botao' value='Acessar'>
    </form>
    <a href='formCadUsuario.php'>Cadastrar usuario</a>
</body>
</html>
