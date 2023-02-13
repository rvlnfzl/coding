<?php
include_once("Database.php");
include_once("Buku.php");


class peminjaman{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function all(){
        $sql= "SELECT * FROM peminjaman";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }


    public function find($id){
        $sql= "SELECT * FROM peminjaman WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();

    }

    public function getPeminjaman(){
        $sql = "SELECT user.fullname as peminjaman, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is null";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find_pinjam($id){
        $sql = "SELECT buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam  FROM buku, peminjaman WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id  AND tanggal_pengembalian is null";
        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find_kembali($id){
        $sql = "SELECT buku.judul as buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda  FROM buku, peminjaman WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id  AND tanggal_pengembalian is not null";
        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }


    public function create($data){
        $id_user =$data["id_user"];
        $id_buku =$data["id_buku"];
        $tanggal_peminjaman =$data["tanggal_peminjaman"];
        $tanggal_pengembalian =$data["tanggal_pengembalian"];
        $kondisi_buku_saat_dipinjam =$data["kondisi_buku_saat_dipinjam"];
        $kondisi_buku_saat_dikembalikan =$data["kondisi_buku_saat_dikembalikan"];
        $denda =$data["denda"];
        
        $sql = "INSERT INTO peminjaman (id_user, id_buku, tanggal_peminjaman, tanggal_pengembalian, kondisi_buku_saat_dipinjam, kondisi_buku_saat_dikembalikan, denda) VALUES ('$id_user' , '$id_buku','$tanggal_peminjaman','$tanggal_pengembalian','$kondisi_buku_saat_dipinjam','$kondisi_buku_saat_dikembalikan','$data')";

        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data peminjaman";
        }
            return "Gagal menambah data peminjaman";
        
    }

    public function update($id ,$data){
        $id_user =$data["id_user"];
        $id_buku =$data["id_buku"];
        $tanggal_peminjaman =$data["tanggal_peminjaman"];
        $tanggal_pengembalian =$data["tanggal_pengembalian"];
        $kondisi_buku_saat_dipinjam =$data["kondisi_buku_saat_dipinjam"];
        $kondisi_buku_saat_dikembalikan =$data["kondisi_buku_saat_dikembalikan"];
        $denda =$data["denda"];

        $sql = "UPDATE peminjaman SET id_user ='$id_user' , id_buku='$id_buku', tanggal_peminjaman='$tanggal_peminjaman', tanggal_pengembalian='$tanggal_pengembalian', kondisi_buku_saat_dipinjam='$kondisi_buku_saat_dipinjam', kondisi_buku_saat_dikembalikan='$kondisi_buku_saat_dikembalikan', denda='$denda' where id='$id'";

        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil mengupdate data peminjaman";
        }
            return "Gagal mengupdate data  peminjaman";
    }
    public function pengembalian($id,$data){
        $tanggal_pengembalian   = $data["tanggal_pengembalian"];
        $kondisi_bukussdh       = $data["kondisi_bukussdh"];
        $denda                  = $data["denda"];
    
        $sql = "UPDATE peminjaman SET tanggal_pengembalian='$tanggal_pengembalian', kondisi_bukussdh='$kondisi_bukussdh', denda='$denda' WHERE id='$id'";
    
        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil mengupdate data";
        }
            return "Gagal mengupdate data";
      }
    public function delete($id){

        $sql = "DELETE From peminjaman WHERE id='$id'";

        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menghapus data peminjaman";
        }
            return "Gagal menghapus data  peminjaman";
    }
}
?>