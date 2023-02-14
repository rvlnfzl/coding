<?php
session_start(); 
include_once("connect.php");

class Login{
    public function Login($data)
    {
        $username = $data["username"];
        $password = $data["password"];


        if (!empty($cek_user)) {
            if ($password == $cek_user['password']) {
                
                $_SESSION['id'] = $cek_user["id"];

                if ($cek_user['role'] == 'admin') {
                    header("Location: admin/index.php  ");
                } elseif ($cek_user['role'] == 'user') {
                    header("Location: user/index.php");
                }
            }
        } else {
            echo "GAGAL LOGIN";
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
    <title>Login</title>
</head>
<body>
    <h1 class="text-center" >Silahkan login</h1>
    <div class="card m-auto" style="width: 18rem;">
        <div class="card-body">
            <form method="POST" action="">
                <ul>
                    <li>Username: <input type="text" name="username"> </li>
                    <li>Password: <input type="password" name="password"> </li>
                    <li><input type="checkbox" name="remember_me" id=""> Remember me</li>
                    <li><button type="submit" name="login" class="btn btn-warning my-2">Submit</button></li>
                </ul>
            </form>

            <a href="register.php">Register disini.</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>