<?php
if(isset($_POST['botao'])){
    require_once __DIR__."/src/models/Usuario.php";
    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false){
        header("location: formCadUsuario.php");
        exit;
    }   
    $u = new Usuario($_POST['email'],$_POST['senha']);
    $u->setNome($_POST['nome']);
    $u->save();
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuario</title>
    <link rel="stylesheet" href="src/styles/login.css">
</head>
<body>
    <div class='container'>
        <form action='formCadUsuario.php' method='post'>
            <h1>Cadastrar-se</h1>
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome" required>
            <label for='email'>E-mail:</label>
            <input type='email' name='email' id='email' required>
            <label for='senha'>Senha:</label>
            <input type='password' name='senha' id="senha" required>
            <input type='submit' name='botao' value='Cadastrar'>
    </form>
    </div>
</body>
</html>

