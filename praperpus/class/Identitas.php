<?php
include_once("Database.php");

class Pemberitahuan {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }
    
    public function all(){
        $sql= "SELECT * FROM identitas";

        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT * FROM identitas WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();

    }

    public function create($data){
        $nama =$data["nama"];
        $alamat =$data["alamat"];
        $email =$data["email"];
        $no_hp =$data["no_hp"];

        $sql = "INSERT INTO identitas (nama, alamat, email, no_hp) VALUES ('$nama','$alamat','$email','$no_hp')";

        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data identitas";
        }
            return "Gagal menambah data identitas";
        
    }

    public function update($id ,$data){
        $nama =$data["nama"];
        $alamat =$data["alamat"];
        $email =$data["email"];
        $no_hp =$data["no_hp"];

        $sql = "UPDATE identitas SET nama ='$nama' , alamat='$alamat', email='$email', no_hp='$no_hp' where id='$id'";

        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil mengupdate data identitas";
        }
            return "Gagal mengupdate data  identitas";
    }

    public function delete($id){

        $sql = "DELETE From identitas WHERE id='$id'";

        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menghapus data identitas";
        }
            return "Gagal menghapus data  identitas";
    }
}
?>