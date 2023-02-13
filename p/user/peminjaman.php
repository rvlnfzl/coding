<?php
include_once('../class/Buku.php');
include_once('../class/Peminjaman.php');

$buku = new Buku;
$data_buku = $buku->all();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->getPeminjaman();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
</head>
<body>
    <?php include('../sidebar.php') ?>

    <div class="peminjaman">
        <h3>Table Peminjaman</h3>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th> 
                <th>Tanggal Peminjaman</th>
                <th>Kondisi Buku Saat Dipinjam</th>
                <th>Aksi</th>
            </tr>
            <?php
                foreach($data_peminjaman as $key => $peminjaman) {
                    ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $peminjaman["peminjaman"] ?></td>
                        <td><?= $peminjaman["buku"] ?></td>
                        <td><?= $peminjaman["tanggal_peminjaman"] ?></td>
                        <td><?= $peminjaman["kondisi_buku_saat_dipinjam"] ?></td>
                        <td>
                            <a href="form_pengembalian.php?id=<?php echo $peminjaman['buku'];?>">Pengembalian</a>
                        </td>
                    </tr>
                    <?php
                }
            ?>
</body>
</html>