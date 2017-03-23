<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "products";
    private $username = "root";
    private $password = "@q1w2e3r4";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            //$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			//Recomendações para configurar o banco de dados
            //Verificar se as tabelas e os campos de caracteres estão configurados para utilizar coleção utf8_general_ci, além de informar o charset ao abrir conexão com banco de dados
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>