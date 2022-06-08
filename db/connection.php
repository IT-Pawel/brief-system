<?php

class MYSQLConection {

    var $servername;

    var $username ;

    var $passowrd;

    var $db;

    var $conn;

    function __construct($servername, $username, $passowrd, $db) {
        $this->servername = $servername;
        $this->username = $username;
        $this->passowrd = $passowrd;
        $this->db = $db;

    }

    function connect(){
        $this->conn = new mysqli($this->servername,  $this->username, $this->passowrd, $this->db);

        return $this->conn;
    }

}


?>
