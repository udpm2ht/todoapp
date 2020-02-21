<?php

class Database {
    // Khai báo thuộc tính 

    private $conn = null;
    private $host = '';
    private $user = '';
    private $pass = '';
    private $database = '';
    private $result = '';

    // Khai báo các phương thức

    private function connect(){
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->database)
        or die('Kết nối tới CSDL thất bại kiểm tra lại cấu hình class Database');
        $this->conn->query('SET NAMES UTF8');
    }

    // Phương thức Select dữ liệu 

    public function Select($sql){
        $this->connect();
        $this->result = $this->conn->query($sql);
    }

    // Phương thức đếm bản ghi 
    public function dbCount(){
        return $this->result->num_rows;
    }

    // Phương thức đổ dữ liệu 
    public function Fetch(){
        if($this->result->num_rows > 0){
            $rows = $this->result->fetch_assoc();
        } else {
            $rows = 0;
        }

        return $rows;
    }

    // Phương thức Insert, update , delete 
    public function Run($sql){
        $this->connect();
        $this->conn->query($sql);
    }
}
