<?php
include_once("Database.php");

class Kategori{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $sql="SELECT * FROM kategori";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql="SELECT * FROM kategoris WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $kode = $data ["kode"];
        $nama = $data ["nama"];

        $sql="INSERT INTO kategori (kode, nama) VALUES ('$kode', '$nama')";

        if ($this->db->connect()->query($sql) === TRUE){
            return "berhasil menambah data kategori";
        }
        return "gagal menambah data kategori";
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nama = $data ["nama"];

        $sql = "UPDATE kategori SET kode = '$kode', nama = '$nama' WHERE id='$id' ";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil mengupdate data kategori";
        }
        return "gagal mengupdate data kategori";
    }

    public function delete($id){
        $sql="DELETE FROM kategori WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menghapus data kategori";
        }
        return "gagal menghapus data kategori";
    }
}
 ?>