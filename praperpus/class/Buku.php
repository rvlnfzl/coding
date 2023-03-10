<?php

include_once("Database.php");

class Buku {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT buku.id, buku.judul, buku.pengarang, penerbit.nama AS nama_penerbit  FROM buku, penerbit WHERE buku.id_penerbit = penerbit.id";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM buku WHERE id-'$id'";
        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    public function create($data){
        $judul = $data["judul"];
        $id_kategori = $data ["id_kategori"];
        $id_penerbit = $data ["id_penerbit"];
        $pengarang = $data ["pengarang"];
        $tahun_terbit = $data ["tahun_terbit"];
        $isbn = $data ["isbn"];
        $j_buku_baik = $data ["j_buku_baik"];
        $j_buku_rusak = $data ["j_buku_rusak"];

        $sql="INSERT INTO buku (judul, id_kategori, id_penerbit, pengarang, tahun_terbit, isbn, j_buku_baik, j_buku_rusak) VALUES ('$judul', '$id_kategori', '$id_penerbit', '$pengarang', '$tahun_terbit', '$isbn', '$j_buku_baik', '$j_buku_rusak')";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menambah data buku";
        } 
        return "gagal menambah data buku";
    }

    public function update($id, $data){
        $judul = $data["judul"];
        $id_kategori = $data ["id_kategori"];
        $id_penerbit = $data ["id_penerbit"];
        $pengarang = $data ["pengarang"];
        $tahun_terbit = $data ["tahun_penerbit"];
        $isbn = $data ["isbn"];
        $j_buku_baik = $data ["j_buku_baik"];
        $j_buku_rusak = $data ["j_buku_rusak"];

        $sql="UPDATE buku SET judul='$judul', id_kategori='$id_kategori', id_penerbit='$id_penerbit', pengarang='$pengarang', tahun_terbit='$tahun_terbit', isbn='$isbn', j_buku_baik='$j_buku_baik', j_buku_rusak='$j_buku_rusak' WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil mengupdate data buku";
        }
        return "gagal mengupdate data buku";
    }


    public function delete ($id){
        $sql = "DELETE FROM buku WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menghapus data buku";
        }
        return "gagal menghapus data buku";

    }







}
 ?>