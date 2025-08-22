<?php
    
class Connection{
    private string $servername = "localhost";
    private string $username = "root";
    private string $database = "biblioteca";
    private string $password = "";
    private mysqli $connection;

    public function __construct(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($conn->connect_error){
            die("Erro de conexão {$conn->connect_error}");
        }

        $this->setConnection($conn);
    }

    public function setConnection(mysqli $connection): void {
        $this->connection = $connection;
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