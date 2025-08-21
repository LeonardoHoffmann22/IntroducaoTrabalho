<?php
require_once __DIR__ . "/Connection.php";
require_once __DIR__ . "/ActiveRecord.php";

class Usuario implements ActiveRecord{

    private int $idUsuario;
    private string $nome;
    
    public function __construct(private string $email, private string $senha){
    }

    public function setIdUsuario(int $idUsuario):void{
        $this->idUsuario = $idUsuario;
    }

    public function getIdUsuario():int{
        return $this->idUsuario;
    }

    public function setSenha(string $senha):void{
        $this->senha = $senha;
    }

    public function setEmail(string $email):void{
        $this->email = $email;
    }

    public function getSenha():string{
        return $this->senha;
    }

    public function getEmail():string{
        return $this->email;
    }

    public function setNome(string $nome):void{
        $this->nome = $nome;
    }

    public function getNome():string{
        return $this->nome;
    }

    public function save():bool{
        $conexao = new Connection();
        $this->senha = password_hash($this->senha,PASSWORD_BCRYPT); 
        if(isset($this->idUsuario)){
            $sql = "UPDATE usuarios SET nome = '{$this->nome}', email = '{$this->email}' ,senha = '{$this->senha}' WHERE idUsuario = {$this->idUsuario}";
        }else{
            $sql = "INSERT INTO usuarios (nome,email,senha) VALUES ('{$this->nome}','{$this->email}','{$this->senha}')";
        }
        return $conexao->executa($sql);
    }

    public static function find($idUsuario):Usuario{
        $conexao = new Connection();
        $sql = "SELECT * FROM usuarios WHERE idUsuario = {$idUsuario}";
        $resultado = $conexao->consulta($sql);
        $u = new Usuario($resultado[0]['email'],$resultado[0]['senha']);
        $u->setIdUsuario($resultado[0]['idUsuario']);
        $u->setNome($resultado[0]['nome']);
        return $u;
    }

    public function delete():bool{
        $conexao = new Connection();
        $sql = "DELETE FROM usuarios WHERE idUsuario = {$this->idUsuario}";
        return $conexao->executa($sql);
    }

    public static function findall():array{
        $conexao = new Connection();
        $sql = "SELECT * FROM usuarios";
        $resultados = $conexao->consulta($sql);
        $usuarios = array();
        foreach($resultados as $resultado){
            $u = new Usuario($resultado['email'],$resultado['senha']);
            $u->setIdUsuario($resultado['idUsuario']);
            $u->setNome($resultado[0]['nome']);
            $usuarios[] = $u;
        }
        return $usuarios;
    }

    public function authenticate():bool{
        $conexao = new Connection();
        $sql = "SELECT idUsuario,senha FROM usuarios WHERE email = '{$this->email}'";
        $resultados = $conexao->consulta($sql);
        if(password_verify($this->senha, $resultados[0]['senha'])){
            session_start();
            $_SESSION['idUsuario'] = $resultados[0]['idUsuario'];
            $_SESSION['email'] = $this->email;
            $_SESSION['logado'] = true;
            return true;
        }else{
            return false;
        }
    }

    public function logout():void{
        session_start();
        session_destroy();
        header("location: index.php");
    }

    public function findAllFavoritos(): array {
        $conexao = new Connection();
        $sql = "SELECT * FROM favoritos WHERE idUsuario = {$this->idUsuario}";
        $resultados = $conexao->consulta($sql);
        $favoritos = array();
        foreach($resultados as $resultado){
            $livro = Livro::find($resultado['idLivro']);
            if($livro){
                $favoritos[] = $livro;
            }
        }
        return $favoritos;
    }
}
