<?php
class Connect extends mysqli {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "house_rental_db";

    public function __construct() {
        parent::__construct($this->hostname, $this->username, $this->password, $this->database);
    }
}

$conn = new Connect();