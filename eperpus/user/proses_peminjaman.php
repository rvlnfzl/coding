<?php
include("../connect.php");
include_once("../class/Kategori.php");
include_once("../class/Pemberitahuan.php");
include_once("../class/Buku.php");
include_once("../class/Peminjaman.php");
include_once("../class/User.php");
include_once("../class/Penerbit.php");
include_once("../class/Identitas.php");
include_once("../class/Pesan.php");
$aksi=$_GET['aksi'];

// header("Location: /user/index.php");

// $kategori = new Kategori;

// $data_baru = [
//     "kode" => "horor",
//     "nama" => "mistis"
// ];

// $tambah_kategori = $kategori->create($data_baru);
// echo $tambah_kategori;

// $id_yang_mau_diubah = 2;

// $edit_kategori = $kategori->update($id_yang_mau_diubah, $data_baru);
// echo $edit_kategori;

// $id_yang_mau_dihapus = 3;

// $hapus_kategori = $kategori->delete($id_yang_mau_dihapus);
// echo $hapus_kategori;

// $pemberitahuan = new Pemberitahuan;

// $data_baru = [
//     "isi" => "maaf, perpus sedang tutup, hanya menerima pengembalian",
//     "level" => "",
//     "status" => "aktif"
// ];

// $tambah_pemberitahuan = $pemberitahuan->create($data_baru);
// echo $tambah_pemberitahuan;

// $id_yang_mau_diubah = 1;

// $edit_pemberitahuan = $pemberitahuan->update($id_yang_mau_diubah, $data_baru);
// echo $edit_pemberitahuan;

// $id_yang_mau_dihapus = 

// $hapus_pemberitahuan = $pemberitahuan->delete($id_yang_mau_dihapus);
// echo $hapus_pemberitahuan;

// $id_yang_mau_dihapus = 4;

// $hapus_buku = $buku->delete($id_yang_mau_dihapus);
// echo $hapus_buku;
if($aksi=="tambah"){
    $peminjaman = new peminjaman;

    // $data_baru = [
    //     "id_user" => "4",
    //     "id_buku" => "4",
    //     "tanggal_peminjaman" => "2023-01-17",
    //     "tanggal_pengembalian" => "2023-01-17",
    //     "kondisi_bukusblm" => "baik",
    //     "kondisi_bukussdh" => "rusak",
    //     "denda" => "10000"
    // ];
    
    
    // array_push($_POST,"tanggal_pengembalian","NULL");
    // array_push($_POST,"kondisi_bukussdh","NULL");
    // array_push($_POST,"denda","NULL");
    $_POST['tanggal_pengembalian'] = "NULL";
    $_POST['kondisi_bukussdh'] = "NULL";
    $_POST['denda'] = "NULL";
    
    $data_baru=$_POST; 
    $tambah_peminjaman = $peminjaman->create($data_baru);
    echo $tambah_peminjaman;
    header("location:peminjaman.php");
}

if($aksi=="pengembalian"){
    $peminjaman = new peminjaman;

    // $data_baru = [
    //     "id_user" => "4",
    //     "id_buku" => "4",
    //     "tanggal_peminjaman" => "2023-01-17",
    //     "tanggal_pengembalian" => "2023-01-17",
    //     "kondisi_bukusblm" => "baik",
    //     "kondisi_bukussdh" => "rusak",
    //     "denda" => "10000"
    // ];
    
    
    // array_push($_POST,"tanggal_pengembalian","NULL");
    // array_push($_POST,"kondisi_bukussdh","NULL");
    // array_push($_POST,"denda","NULL");

    
    $data_baru=$_POST; 
    $tambah_peminjaman = $peminjaman->pengembalian($_POST['id'],$data_baru);
    echo $tambah_peminjaman;
    header("location:peminjaman.php");
}
// $id_yang_mau_diubah = 

// $edit_peminjaman = $peminjaman->update($id_yang_mau_diubah, $data_baru);
// echo $edit_peminjaman;

// $id_yang_mau_dihapus = 4;

// $hapus_peminjaman = $peminjaman->delete($id_yang_mau_dihapus);
// echo $hapus_peminjaman;

// $user = new user;

// $data_baru = [
//     "kode" => "A4",
//     "nis" => "245",
//     "fullname" => "leedonghyuck",
//     "username" => "hc",
//     "password" => "hc",
//     "kelas" => "XII RPL",
//     "alamat" => "seoul",
//     "verif" =>"",
//     "role" => "admin",
//     "join_date" => "2023-01-17",
//     "terakhir_login" => "2023-01-17"
// ];

// $tambah_user = $user->create($data_baru);
// echo $tambah_user;

// $id_yang_mau_diubah = 

// $edit_user = $user->update($id_yang_mau_diubah, $data_baru);
// echo $edit_user;

// $id_yang_mau_dihapus = 4;

// $hapus_user = $user->delete($id_yang_mau_dihapus);
// echo $hapus_user;

// $penerbit = new penerbit;

// $data_baru = [
//     "kode" => "dira",
//     "nama" => "nadhira",
//     "verif" => ""

// ];

// $tambah_penerbit = $penerbit->create($data_baru);
// echo $tambah_penerbit;

// $id_yang_mau_diubah = 

// $edit_penerbit = $penerbit->update($id_yang_mau_diubah, $data_baru);
// echo $edit_penerbit;

// $id_yang_mau_dihapus = 4;

// $hapus_penerbit = $penerbit->delete($id_yang_mau_dihapus);
// echo $hapus_penerbit;

// $identitas = new identitas;

// $data_baru = [
//     "nama" => "dira",
//     "alamat" => "nadhira",
//     "email" => "dira@gmail.co.id",
//     "nomor_hp" => "089838382"

// ];

// $tambah_identitas = $identitas->create($data_baru);
// echo $tambah_identitas;

// $id_yang_mau_diubah = 

// $edit_identitas = $identitas->update($id_yang_mau_diubah, $data_baru);
// echo $edit_identitas;

// $id_yang_mau_dihapus = 4;

// $hapus_identitas = $identitas->delete($id_yang_mau_dihapus);
// echo $hapus_identitas;

// $pesan = new pesan;

// $data_baru = [
//     "penerima_id" => "4",
//     "pengirim_id" => "4",
//     "judul" => "buku dipinjam",
//     "isi" =>"buku harap dikembalikkan",
//     "status" => "terkirim",
//     "tanggal_kirim" => "2023-01-17"

// ];

// $tambah_pesan = $pesan->create($data_baru);
// echo $tambah_pesan;

// $id_yang_mau_diubah = 

// $edit_pesan = $pesan->update($id_yang_mau_diubah, $data_baru);
// echo $edit_pesan;

// $id_yang_mau_dihapus = 5;

// $hapus_pesan = $pesan->delete($id_yang_mau_dihapus);
// echo $hapus_pesan;

?>
