<?php

class Database{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "eperpus";

    public function connect(){
        return mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }
}

?>