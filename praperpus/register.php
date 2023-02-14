<?php 
include ("connect.php");

if(isset($_POST ["user"])){
    $id = $_POST ["id"]; 
    $nis = $_POST ["nis"];
    $fullname = $_POST ["fullname"];
    $username = $_POST ["username"]; 
    $password = $_POST ["password"]; 
    $kelas = $_POST ["kelas"]; 
    $password_confirm = $_POST ["password_confirm"];

    $sql_select = "SELECT * FROM user WHERE id='$id'";
    $result = $koneksi->query($sql_select);

    if($result->num_rows > 0){
        echo "Usernamenya sudah ada";
    } else{
        
        if($password == $password_confirm){
            $password = password_hash($password, PASSWORD_DEFAULT);
    
            $sql = "INSERT INTO user(id, nis, fullname, username, password, kelas) VALUES('$id', '$nis', '$fullname',  '$username', '$password', '$kelas')";
    
            if($koneksi->query($sql) == TRUE){
                echo "Registrasi berhasil";
            } else{
                echo "Registrasi gagal, $koneksi->error";
            }
    
        } else{
            echo "Password kaga sama tolol";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register Page</title>
</head>
<body> 
    <h1 class="text-center">Silahkan Register</h1>
    <div class="card m-auto" style="width: 18rem;">
        <div class="card-body">
            <form method="POST" action="">
                <ul>
                    <li>ID: <input type="text" name="id"> </li>
                    <li>Nis: <input type="text" name="nis"> </li>
                    <li>Fullname: <input type="text" name="fullname"> </li>
                    <li>Username: <input type="text" name="username"> </li>
                    <li>Password: <input type="password" name="password"> </li>
                    <li>Konfirmasi Password: <input type="password" name="password_confirm"> </li>
                    <li><button type="submit" name="register" class="btn btn-warning my-2">Submit</button></li>
                </ul>
            </form>

            <a href="login.php">Login disini.</a>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>