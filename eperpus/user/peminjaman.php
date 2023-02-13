<?php
include("../connect.php");
include_once("../class/Peminjaman.php");
include_once("../class/User.php");


$user = new User();
$data_user = $user->find(2);

$peminjaman = new Peminjaman;
$data_baru = $peminjaman->all();

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
    <h1>Perpustakaan SMKN 64 Jakarta</h1>

    <div class ="sidebar">
          <?= $data_user["fullname"]; ?>
        <ul>
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="peminjaman.php">Peminjaman Buku</a></li>
            <li><a href="">Pengembalian Buku</a></li>
            <li><a href="">Profil Saya</a></li>
            <li><a href="pesan.php">Pesan</a></li>
            <li><a href="">Keluar</a></li>
        </ul>
    </div>

    <div class="peminjaman">
        <table>
            <tr>
                <th>No.</th>
                <th>Tanggal peminjaman</th>
                <th>Tanggal pengembalian</th>
                <th>Kondisi buku sebelum</th>
                <th>Kondisi buku sesudah</th>
                <th>Denda</th>
                <th>Aksi</th>
            </tr>
            <?php
                foreach($data_baru as $key => $peminjaman) {
                    ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td><?= $peminjaman["tanggal_peminjaman"] ?></td>
                        <td><?= $peminjaman["tanggal_pengembalian"] ?></td>
                        <td><?= $peminjaman["kondisi_bukusblm"] ?></td>
                        <td><?= $peminjaman["kondisi_bukussdh"] ?></td>
                        <td><?= $peminjaman["denda"] ?></td>
                        <td><a href="pengembalian.php?id=<?php echo $peminjaman['id'];?>">Pengembalian</a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>

</body>
</html>