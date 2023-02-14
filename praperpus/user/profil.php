<?php 
include("../sidebar.php");
include_once("../class/User.php");
include_once("../class/Buku.php");

$user = new User;
$data_user = $user->find(2);

$buku = new Buku;
$data_buku = $buku->all();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Dashboard User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div style="margin-left:15%">
        <div class="w3-container">
            <h1>Profil User</h1>
        </div>
        
    <nav class="navbar ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
                    <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
                </svg>
                Home > Profil User
            </a>
        </div>
    </nav>

<div class="container-xl px-4 mt-4">
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Photo</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img style="width: 150px;" class="img-account-profile rounded-circle mb-2" src="<?= $data_user['foto']?>" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Nama User</div>
                    <!-- input foto -->
                    <input type="file" class="form-control mb-3" name="foto">
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new imag</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Data User</div>
                <div class="card-body">
                    <form>
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputkode">Kode </label>
                            <input class="form-control" id="inputFirsName" type="text" placeholder="Enter your FirsName" value="<?= $data_user['id']?>">
                        </div>
                         <!-- Form Group (username)-->
                         <div class="mb-3">
                            <label class="small mb-1" for="inputNis">NIS</label>
                            <input class="form-control" id="inputNis" type="text" placeholder="Enter your username" value="<?= $data_user['nis']?>">
                        </div>
                        <!-- Form Group (email address)-->  
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="revallina955@gmail.com">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">No Tlp</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" value="0881024510522">
                            </div>
                            
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</html>