<?php
include __DIR__ . "/../config/database.php";
class Karyawan
{
    public function getAllKaryawan()
    {
        $database = new Database();
        $query = 'SELECT * FROM karyawan';
        $result = $database->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
?>