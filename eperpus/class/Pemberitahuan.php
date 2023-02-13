<?php
include_once("Database.php");


class Pemberitahuan{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function all(){
        $sql= "SELECT * FROM pemberitahuan";

        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT * FROM pemberitahuan WHERE id='$id'";

        
        return $this->db->connect()->query($sql)->fetch_assoc();

    }

    public function create($data){
        $isi =$data["isi"];
        $level_user =$data["level_user"];
        $status =$data["status"];

        $sql = "INSERT INTO pemberitahuan (isi, level_user, status) VALUES ('$isi' , '$level_user', '$status')";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data pemberitahuan";
        }
            return "Gagal menambah data pemberitahuan";
        
    }

    public function update($id ,$data){
        $isi =$data["isi"];
        $level_user =$data["level_user"];
        $status =$data["status"];

        $sql = "UPDATE pemberitahuan SET isi ='$isi' , level_user='$level_user', status='$status' where id='$id'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil mengupdate data pemberitahuan";
        }
            return "Gagal mengupdate data  pemberitahuan";
    }

    public function delete($id){

        $sql = "DELETE From pemberitahuan WHERE id='$id'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menghapus data pemberitahuan";
        }
            return "Gagal menghapus data  pemberitahuan";
    }
}
?>