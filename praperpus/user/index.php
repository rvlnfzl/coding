<?php
include("../connect.php");
include_once("../class/Buku.php");
include_once("../class/Peminjaman.php");
include_once("../class/Pemberitahuan.php");
include("../sidebar.php");

session_start();
$user = new User;
$data_user = $user->find($_SESSION["id"]);

$buku = new Buku;
$data_buku = $buku->all();

$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->all();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>Dashboard User</title>
</head>
<body>

    <div style="margin-left:15%">
        <div class="w3-container">
            <h1>Dashboard</h1>
        </div>
        
        <nav class="navbar ">
            <div class="container-fluid">
                <a class="navbar-brand" href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                    </svg>
                     Home > Dashboard
                </a>
            </div>
        </nav>
        
        <div class="container">
            <?php
                foreach($data_pemberitahuan as $pemberitahuan){
            ?>
            <div class="alert alert-info">
                <?= $pemberitahuan["isi"]?>
            </div>
            <?php } ?>
            
            <div class="buku">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>NO</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                        foreach($data_buku as $key => $b){
                        ?>
                        <tr>
                            <td><?=$key+1 ?></td>
                            <td><?=$b["judul"]?></td>
                            <td><?=$b["pengarang"]?></td>
                            <td><?=$b["nama_penerbit"]?></td>
                            <td><a href="form_peminjaman.php?id_buku=<?= $b["id"] ?>">Peminjaman</a> </td>
                            
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>