<?php
class Database
{
    public $conn;
    public function __construct()
    {
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "";
        $db_name = "db_kasir";

        $this->conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
?>
