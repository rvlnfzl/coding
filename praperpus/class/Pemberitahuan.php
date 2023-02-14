<?php
include_once("Database.php");

class Pemberitahuan {
    private $db;
    
    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $sql="SELECT * FROM pemberitahuan WHERE status='aktif'";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM pemberitahuan WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $isi = $data ["isi"];
        $level_user = $data ["level_user"];
        $status = $data ["status"];

        $sql = "INSERT INTO pemberitahuan (isi, level_user, status) VALUES ('$isi', '$level_user', '$status')";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menambah pemberitahuan";
        }
        return "gagal menambah pemberitahuan";
    }
    
    public function update($id, $data){
        $isi = $data ["isi"];
        $level_user = $data ["level_user"];
        $status = $data ["status"];

        $sql="UPDATE pemberitahuan SET isi='$isi', level_user='$level_user', status='$status' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil mengupdate pemberitahuan";
        }
        return "gagal mengupdate pemberitahuan";
    }

    public function delete($id){
        $sql= "DELETE FROM pemberitahuan WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menghapus pemberitahuan";
        }
        return "gagal menghapus pemberitahuan";
    }
}
 ?>