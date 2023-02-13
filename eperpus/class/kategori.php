<?php
include_once("Database.php");

class Kategori{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function all(){
        $sql= "SELECT * FROM kategori";

        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT * FROM kategori WHERE id='$id'";

        
        return $this->db->connect()->query($sql)->fetch_assoc();

    }

    public function create($data){
        $kode =$data["kode"];
        $nama =$data["nama"];

        $sql = "INSERT INTO kategori (kode, nama) VALUES ('$kode' , '$nama')";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data kategori";
        }
            return "Gagal menambah data kategori";
        
    }

    public function update($id ,$data){
        $kode =$data["kode"];
        $nama =$data["nama"];

        $sql = "UPDATE kategori SET kode ='$kode' , nama='$nama' where id='$id'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil mengupdate data kategori";
        }
            return "Gagal mengupdate data  kategori";
    }

    public function delete($id){

        $sql = "DELETE From kategori WHERE id='$id'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menghapus data kategori";
        }
            return "Gagal menghapus data  kategori";
    }
}
?>