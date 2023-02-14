<?php
include_once("Database.php");

class Peminjaman{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $sql="SELECT user.fullname AS peminjaman, buku.judul AS buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan,  peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman(){
        $sql="SELECT user.fullname AS peminjaman, buku.judul AS buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.user_id = user.id AND peminjaman.buku_id = buku.id AND tanggal_pengembalian is not null";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPengembalian(){
        $sql="SELECT user.fullname AS peminjaman, buku.judul AS buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is null";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);

    }

    public function find($id){
        $sql="SELECT buku.judul AS peminjaman, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam FROM peminjaman, buku WHERE peminjaman.buku.id = buku.id AND peminjaman, user.id = $id AND tanggal_pengembalian is null";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function findKembali($id){
        $sql="SELECT buku.judul AS buku, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = '$id' AND tanggal_pengembalian is not null";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function pengembalian($id,$data){
        $tanggal_pengembalian   = $data["tanggal_pengembalian"];
        $kondisi_buku_saat_dikembalikan       = $data["kondisi_buku_saat_dikembalikan"];
        $denda                  = $data["denda"];
    
        $sql = "UPDATE peminjaman SET tanggal_pengembalian='$tanggal_pengembalian', kondisi_buku_saat_dikembalikan= '$kondisi_buku_saat_dikembalikan', denda='$denda' WHERE id='$id'";
    
        if($this->db->connect()->query($sql) === TRUE){
            return "Berhasil mengupdate data";
        }
            return "Gagal mengupdate data";
      }

    public function create($data){
        $id_user = $data ["id_user"];
        $id_buku = $data ["id_buku"];
        $tanggal_peminjaman = $data ["tanggal_peminjaman"];
        $tanggal_pengembalian = $data["tanggal_pengembalian"];
        $kondisi_buku_saat_dipinjam= $data ["kondisi_buku_saat_dipinjam"];
        $kondisi_buku_saat_dikembalikan= $data ["kondisi_buku_saat_dikembalikan"];
        $denda= $data ["denda"];

        $sql = "INSERT INTO peminjaman (id_user, id_buku, tanggal_peminjaman, kondisi_buku_saat_dipinjam) VALUES ('$id_user', '$id_buku', '$tanggal_peminjaman', '$kondisi_buku_saat_dipinjam')";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menambah peminjaman";
        }
        return "gagal menambah peminjaman";
    }

    public function update($id, $data){
        $id_user = $data ["id_user"];
        $id_buku = $data ["id_buku"];
        $tanggal_peminjaman = $data ["tanggal_peminjaman"];
        $tanggal_pengembalian = $data["tanggal_pengembalian"];
        $kondisi_buku_saat_dipinjam= $data ["kondisi_buku_saat_dipinjam"];
        $kondisi_buku_saat_dikembalikan= $data ["kondisi_buku_saat_dikembalikan"];
        $denda= $data ["denda"];

        $sql = "UPDATE peminjaman SET id_user = '$id_user', id_buku = '$id_buku' tanggal_peminjaman = '$tanggal_peminjaman', tanggal_pengembalian = '$tanggal_pengembalian', kondisi_buku_saat_dipinjam = '$kondisi_buku_saat_dipinjam', kondisi_buku_saat_dikembalikan = '$kondisi_buku_saat_dikembalikan', denda = '$denda' WHERE id='$id' ";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil mengupdate data peminjaman";
        }
        return "gagal mengupdate data peminjaman";
    }

    public function delete($id){
        $sql= "DELETE FROM peminjaman WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menghapus data peminjaman";
        }
        return "gagal menghapus data peminjaman";
    }

}

?>