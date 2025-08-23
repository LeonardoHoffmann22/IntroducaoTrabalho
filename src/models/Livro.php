<?php
require_once __DIR__ . "/Connection.php";
require_once __DIR__ . "/ActiveRecord.php";

class Livro implements ActiveRecord {
    private int $id;
    private string $titulo;
    private string $img;

    public function __construct($titulo, $img) {
        $this->titulo = $titulo;
        $this->img = $img; 
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getAnoPublicacao() {
        return $this->anoPublicacao;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setTitulo(string $titulo): void {
        $this->titulo = $titulo;
    }

    public function setImg(string $img): void {
        $this->img = $img;
    }

    public function getImg(): string {
        return $this->img;
    }

    public function save(): bool {
        $conexao = new Connection();
        if (isset($this->id)) {
            $sql = "UPDATE livros SET titulo = '{$this->titulo}', img = '{$this->img}' WHERE id = {$this->id}";
        } else {
            $sql = "INSERT INTO livros (titulo, img) VALUES ('{$this->titulo}', '{$this->img}')";
        }
        return $conexao->executa($sql);
    }

    public function delete(): bool {
        $conexao = new Connection();
        $sql = "DELETE FROM livros WHERE id = {$this->id}";
        return $conexao->executa($sql);
    }

    public static function find($id): Livro {
        $conexao = new Connection();
        $sql = "SELECT * FROM livros WHERE id = {$id}";
        $resultado = $conexao->consulta($sql);
        if (count($resultado) > 0) {
            $livro = new Livro($resultado[0]['titulo'], $resultado[0]['img']);
            $livro->setId($resultado[0]['id']);
            return $livro;
        }
        return null;
    }

    public static function findAll(): array {
        $conexao = new Connection();
        $sql = "SELECT * FROM livros";
        $resultado = $conexao->consulta($sql);
        $livros = [];
        foreach ($resultado as $item) {
            $livro = new Livro($item['titulo'], $item['img']);
            $livro->setId($item['id']);
            $livros[] = $livro;
        }
        return $livros;
    }

    public static function addFavorito(int $idUsuario, int $idLivro): bool {
        $conexao = new Connection();
        $sql = "INSERT INTO favoritos (idUsuario, idLivro) VALUES ({$idUsuario}, {$idLivro})";
        return $conexao->executa($sql);
    }

    public static function removeFavorito(int $idUsuario, int $idLivro): bool {
        $conexao = new Connection();
        $sql = "DELETE FROM favoritos WHERE idUsuario = {$idUsuario} AND idLivro = {$idLivro}";
        return $conexao->executa($sql);
    }

    public function isFavorito(int $idUsuario): bool {
        $conexao = new Connection();
        $sql = "SELECT * FROM favoritos 
        WHERE idUsuario = {$idUsuario} AND idLivro = {$this->id}";
        $resultados = $conexao->consulta($sql);
        return count($resultados) > 0;
    }

    public static function findAllFavoritos($idUsuario): array {
        $conexao = new Connection();
        $sql = "SELECT * FROM favoritos WHERE idUsuario = {$idUsuario}";
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