<?php 
include_once("../class/Buku.php");


$buku = new Buku;
$data_buku = $buku->all();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
</head>
<body>
    <?php include("../sidebar.php")?>
    <div class="buku">
        <h3>Table buku</h3>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Aksi</th>
            </tr>
            <?php
                        foreach($data_buku as $key => $buku){
                        ?>
                        <tr>
                            <td><?=$key+1 ?></td>
                            <td><?=$buku["judul"]?></td>
                            <td><?=$buku["pengarang"]?></td>
                            <td><a href="form_peminjaman.php?id_buku=<?= $buku["id"];?>">Peminjaman</a> </td>
                            
                        </tr>
                        <?php } ?>
        </table>
    </div>
</body>
</html>
