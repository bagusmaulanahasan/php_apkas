<?php

include base_project()."/config/database.php";

class Karyawan
{
    public function getAllKaryawan()
    {
        $database = new Database();
        $query = 'select * from karyawan';
        $result = $database->conn->query($query);
        return $result;
    }
}

?>