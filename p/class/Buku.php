<?php 
include_once("Database.php");

class Buku{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT * FROM buku";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM buku WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }
}
?>