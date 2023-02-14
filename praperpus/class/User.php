<?php
include_once("Database.php");

class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function all(){
        $sql = "SELECT * FROM user";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAnggota(){
        $sql = "SELECT * FROM user WHERE role = 'user'";

        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql = "SELECT * FROM user WHERE id-'$id'";

        return $this->db->connect()->query($sql)->fetch_assoc();
    }

    
    public function create($data){
        $kode = $data["kode"];
        $nis = $data ["nis"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $password = $data ["password"];
        $kelas = $data ["kelas"];
        $alamat = $data ["alamat"];
        $verif = $data ["verif"];
        $role = $data ["role"];
        $join_date = $data ["join_date"];
        $terakhir_login = $data ["terakhir_login"];


        $sql="INSERT INTO user (kode, nis, fullname, username, password, kelas, alamat, verif, role, join_date, terakhir_login) VALUES ('$kode', '$nis', '$fullname', '$username', '$password', '$kelas', '$alamat', '$verif', '$role', '$join_date', '$terakhir_login')";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menambah data user";
        } 
        return "gagal menambah data user";
    }

    public function update($id, $data){
        $kode = $data["kode"];
        $nis = $data ["nis"];
        $fullname = $data ["fullname"];
        $username = $data ["username"];
        $password = $data ["password"];
        $kelas = $data ["kelas"];
        $alamat = $data ["alamat"];
        $verif = $data ["verif"];
        $role = $data ["role"];
        $join_date = $data ["join_date"];
        $terakhir_login = $data ["terakhir_login"];
        $foto = $data["foto"];

            

        $sql = "UPDATE user SET kode = '$kode', nis = '$nis' fullname = '$fullname', username = '$username', password = '$password', kelas = '$kelas', alamat = '$alamat', verif = '$verif', role = '$role', join_date = '$join_date', terakhir_login = '$terakhir_login' WHERE id='$id' ";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil mengupdate data user";
        }
        return "gagal mengupdate data user";
    }

    public function delete($id){
        $sql= "DELETE FROM user WHERE id='$id'";

        if($this->db->connect()->query($sql) === TRUE){
            return "berhasil menghapus data user";
        }
        return "gagal menghapus data user";
    }

}
 ?>