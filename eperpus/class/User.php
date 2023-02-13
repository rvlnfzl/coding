<?php
include_once("Database.php");


class user{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function all(){
        $sql= "SELECT * FROM user";

        
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id){
        $sql= "SELECT * FROM user WHERE id='$id'";

        
        return $this->db->connect()->query($sql)->fetch_assoc();

    }

    public function getAnggota(){
        $sql = "SELECT * FROM user WHERE role='user'";
        return $this->db->connect()->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function getAdministrator(){
        $sql = "SELECT * FROM user WHERE role='admin'";

        return $this->db->connect->fetch_assoc();
    }

    public function create($data){
        $kode =$data["kode"];
        $nis =$data["nis"];
        $fullname =$data["fullname"];
        $username =$data["username"];
        $password =$data["password"];
        $kelas =$data["kelas"];
        $alamat =$data["alamat"];
        $verif=$data["verif"];
        $role=$data["role"];
        $join_date=$data["join_date"];
        $terakhir_login["terakhir_login"];
        
        $sql = "INSERT INTO user (kode, nis, fullname, username, password, kelas, alamat, verif, role, join_date, terakhir_login) VALUES ('$kode' , '$nis','$fullname','$username','$password','$kelas', '$alamat', '$verif', '$role', '$join_date', '$terakhir_login')";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil menambah data user";
        }
            return "Gagal menambah data user";
        
    }

    public function update($id ,$data){
        $kode =$data["kode"];
        $nis =$data["nis"];
        $fullname =$data["fullname"];
        $username =$data["username"];
        $password =$data["password"];
        $kelas =$data["kelas"];
        $alamat =$data["alamat"];
        $verif=$data["verif"];
        $role=$data["role"];
        $join_date=$data["join_date"];
        $terakhir_login["terakhir_login"];

        $sql = "UPDATE user SET kode ='$kode' , nis='$nis', fullname='$fullname', username='$username', password='$password', kelas='$kelas', alamat='$alamat', verif='$verif', role='$role', join_date='$join_date', terakhir_login='$terakhir_login'";

        
        if($this->db->connect()->query($sql)=== TRUE)
        {
            return "Berhasil mengupdate data user";
        }
            return "Gagal mengupdate data  user";
    }

    public function delete($id){

        $sql = "DELETE FROM user WHERE id='$id'";

        
        if($this->db->connect()->query($sql) === TRUE)
        {
            return "Berhasil menghapus data user";
        }
            return "Gagal menghapus data  user";
    }
}
?>