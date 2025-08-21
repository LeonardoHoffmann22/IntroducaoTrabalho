<?php
    
class Connection{
    private string $servername = "localhost";
    private string $username = "root";
    private string $database = "biblioteca";
    private string $password = "";

    public function __construct(){
        $conn = mysqli($servername, $username, $database, $password);

        if ($conn->connect_error){
            die("Erro de conexão {$conn->connect_error}");
        }

        return $conn;
    }

    public function executa($sql){
		$result = $this->connection->query($sql);
		return $result;
	}

    public function consulta($sql){
		$result = $this->connection->query($sql);
		$item = array();
		$data = array();
		while($item = mysqli_fetch_array($result)){
			$data[] = $item;
		}
		return $data;
		}
	}
?>
}

?>