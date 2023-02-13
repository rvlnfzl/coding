<?php
include_once("../../../class/User.php");
include("../../../sidebar_admin.php");

// $user = new User;
// $data_user = $user->find(1);

// $data_anggota = $user->getAnggota();
// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota</title>
</head>
<body>

    <div class="tambah">
        <a href="tambah.php">Tambah Anggota</a>
    </div>
    <div class="table">
        <table border="1">
            <tr>
                <th>No</th>
                <th>Kode Anggota</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Nama Kelas</th>
                <th>Nama Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php foreach($data_anggota as $key => $b) {?> 
              <tr>
                <td><?= $key +1 ?></td>
                <td><?= $b["kode"] ?></td>
                <td><?= $b["nis"] ?></td>
                <td><?= $b["fullname"] ?></td>
                <td><?= $b["kelas"] ?></td>
                <td><?= $b["alamat"] ?></td>
                <td>
                    <a href="edit.php?id=<?= $b["id"] ?>">Edit</a> |
                    <a href="hapus.php?id=<?= $b["id"] ?>">Hapus</a>
                </td>
              </tr>  
            <?php } ?>
        </table>
    </div>
</body>
</html>