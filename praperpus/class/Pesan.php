<?php
include_once("Database.php");


class pesan{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $sql= "SELECT * FROM pesan";

        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT * FROM pesan WHERE id='$id'";

        
        return $this->db->connect()->query($sql)->fetch_assoc();

    }

    public function findByUserId($id){
        $sql = "SELECT * FROM pesan WHERE penerima_id='$id'";

        $this->db = new Database;
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data){
        $id_penerima =$data["id_penerima"];
        $id_pengirim =$data["id_pengirim"];
        $judul =$data["judul"];
        $isi_pesan =$data["isi_pesan"];
        $status =$data["status"];
        $tanggal_kirim =$data["tanggal_kirim"];
        
        $sql = "INSERT INTO pesan (id_penerima, id_pengirim, judul, isi_pesan, status, tanggal_kirim) VALUES ('$id_penerima' , '$id_pengirim','$judul','$isi_pesan','$status','$tanggal_kirim')";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data pesan";
        }
            return "Gagal menambah data pesan";
        
    }

    public function update($id ,$data){
        $id_penerima =$data["id_penerima"];
        $id_pengirim =$data["id_pengirim"];
        $judul =$data["judul"];
        $isi_pesan =$data["isi_pesan"];
        $status =$data["status"];
        $tanggal_kirim =$data["tanggal_kirim"];

        $sql = "UPDATE pesan SET id_penerima ='$id_penerima' , id_pengirim='$id_pengirim', judul='$judul', isi_pesan='$isi_pesan', status='$status', tanggal_kirim='$tanggal_kirim'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil mengupdate data pesan";
        }
            return "Gagal mengupdate data  pesan";
    }

    public function delete($id){

        $sql = "DELETE From pesan WHERE id='$id'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menghapus data pesan";
        }
            return "Gagal menghapus data  pesan";
    }
}
?>