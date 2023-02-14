<?php

session_start();

$user = new User;
$data_user = $user->find($_SESSION["id"]);

$buku="";
if(isset($_GET['id_buku'])){
    $buku=$_GET['id_buku'];
  // header("location:pengembalian.php");
  

}
?>

<?php
$user="";
if(isset($_GET['fullname'])){
    $user=$_GET['fullname'];
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Perpustakaan</title>
</head>
<body>
<div class="container">
<form action="proses.php?aksi=tambah" method="post" class="row g-3">
  <div class="col-12">
    <label for="inputiduser" class="form-label">Nama Peminjaman</label>
    <input type="text" value="<?php echo $user; ?>"  class="form-control">
  </div>
  <div class="col-12">
    <label for="inputidbuku" class="form-label">ID Buku</label>
    <input type="text" value="<?php echo $buku; ?>" name="id_buku" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputtanggalpengembalian" class="form-label">Tanggal Pengembalian</label>
    <input type="date" name="tanggal_pengembalian" class="form-control">
  </div>
  <div class="col-12">
    <label for="inputkondisi" class="form-label">Kondisi Buku Saat Dikembalikan</label>
    <select name="kondisi_buku_saat_dikembalikan">
        <option value="baik">Baik</option>
        <option value="rusak">Rusak</option>
    </select>
  </div>
  <div class="col-12">
    <label for="inputidbuku" class="form-label">Denda</label>
    <input type="text" vname="id_buku" class="form-control">
  </div>
  <div class="col-12">
    <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
  </div>
</form>
</div>
</body>
</html>