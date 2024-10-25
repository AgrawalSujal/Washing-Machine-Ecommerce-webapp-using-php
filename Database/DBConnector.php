<?php

namespace Database;

class DBConnector
{
    protected $host="localhost";
    protected $user="root";
    protected $pass="";
    protected $database="washing_machine";

    public $conn;
    public function __construct(){
        $this->conn=mysqli_connect($this->host,$this->user,$this->pass,$this->database);
        if($this->conn->connect_error){
            echo "Database connection failed".$this->conn->connect_error;
        }
        echo "Connected successfully";
    }

}
