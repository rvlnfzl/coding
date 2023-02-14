<?php
include("../connect.php");
include_once("../class/Peminjaman.php");
include_once("../class/User.php");
include("../sidebar.php");


$peminjaman = new Peminjaman;
$data_baru = $peminjaman->all(); 

// $pengembalian = new Peminjaman;
// $data_pengembalian = $pengembalian->findKembali(2);

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->getPengembalian();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Dashboard User</title>
</head>
<body>
<div style="margin-left:15%">
        <div class="w3-container">
            <h1>Pengembalian Buku</h1>
        </div>
        <nav class="navbar ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
  <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
</svg>
      Home > Pengembalian Buku
    </a>
  </div>
</nav>
    <div class="container">
        <div class="pengembalian">
            <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Tanggal pengembalian</th>
                    <th>Kondisi buku saat dikemblikan</th>
                    <th>Denda</th>
                </tr>
</thead>
                <?php
                    foreach($data_peminjaman as $key => $pgm) {
                        ?>
                        <tr>
                            <td><?= $key+1 ?></td>
                            <td><?= $pgm["peminjaman"]?></td>
                            <td><?= $pgm["buku"]?></td>
                            <td><?= $pgm["tanggal_pengembalian"] ?></td>
                            <td><?= $pgm["kondisi_buku_saat_dikembalikan"] ?></td>
                            <td><?= $pgm["denda"] ?></td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>  

</body>
</html>