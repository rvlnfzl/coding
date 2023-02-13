<?php 

include_once("Database.php");

class Peminjaman{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT user.fullname AS peminjam, buku.judul AS buku, peminjaman.id, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getPeminjaman(){
        $sql = "SELECT user.fullname AS peminjaman, buku.judul AS buku, peminjaman.id, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id is not NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql="SELECT * FROM peminjaman WHERE id='$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
     }

    public function create($data){
        $id_user                    = $data["id_user"];
        $id_buku                    = $data["id_buku"];
        $tanggal_peminjaman         = $data["tanggal_peminjaman"];
        $kondisi_buku_saat_dipinjam = $data ["kondisi_buku_saat_dipinjam"];

        $sql = "SELECT INTO peminjaman (id_user, id_buku, tanggal_peminjaman, kondisi_buku_saat_dipinjam) VALUES ('$id_user', '$id_buku', '$tanggal_peminjaman', '$kondisi_buku_saat_dipinjam')";

        if($this->db->connect()->query($sql) === TRUE ){
            return "berhasil menambah data";
        }
        return  "gagal menambah data";
    }

    public function pengembalian($id, $data){
        $tanggal_pengembalian           = $data["tanggal_pengembalian"];
        $kondisi_buku_saat_dikembalikan = $data["kondisi_buku_saat_dikembalikan"];
        $denda                          = $data["denda"];

        $sql = "UPDATE peminjaman SET tanggal_pengembalian = '$tanggal_pengembalian', kondisi_buku_saat_dikemblikan = '$kondisi_buku_saat_dikembalikan', denda = '$denda'";

        if ($this->db->connect()->query($sql) === TRUE){
            return "berhasil menguodate data";
        }
        return "gagal mengupdate data";
    }

    public function getPengembalian(){
        $sql = "SELECT user.fullname AS peminjaman, buku.judul AS buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_buku_saat_dipinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_buku_saat_dikembalikan, peminjaman.id FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is  NULL";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }


}

?>