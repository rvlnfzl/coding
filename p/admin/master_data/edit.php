<?php 
include_once("../../../class/User.php");

$id = $_GET["id"];

$user = new User;
$data_user = $user->find($id);

if(isset($_POST["submit"])){
    $data = [
        "kode" => $_POST["kode"],
        "nis" => $_POST["nis"],
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => password_hash($_POST["password"], PASSWORD_DEFAULT),
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
    ];
}


$user->update($id, $data);

header("location : index.php?pesan=edit_sukses");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data anggota</title>
</head>
<body>
    <div class="form_edit_anggota">
        <form method="POST" action="">
            <div>
                <label for="">kode</label>
                <input type="text" nama="kode" value="<?= $data_user["kode"]?>">
            </div>
            <div>
                <label for="">Nis</label>
                <input type="text" nama="nis" value="<?= $data_user["nis"]?>">
            </div>
            <div>
                <label for="">Nama Lengkap</label>
                <input type="text" nama="username" value="<?= $data_user["username"]?>">
            </div>
            <div>
                <label for="">pasword</label>
                <input type="text" nama="password" value="" placeholder="password belum diubah">
            </div>
            <div>
                <label for="">Kelas</label>
                <input type="text" nama="kelas" value="<?= $data_user["kelas"]?>">
            </div>
            <div>
                <label for="">Alamat</label>
                <input type="text" nama="alamat" value="<?= $data_user ["alamat"]?>">
            </div>
            <button type="submit" nama="submit">Submit</button>
        </form>
    </div>
</body>
</html>