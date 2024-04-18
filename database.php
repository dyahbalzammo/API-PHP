<?php
// class Database
// {
//     public $db;
//     public function getConnection()
//     {
//         $this->db = null;
//         try {
//             $this->db = new mysqli('localhost', 'root', '', 'apicruddb');
//         } catch (Exception $e) {
//             echo "Database could not be connected: " . $e->getMessage();
//         }
//         return $this->db;
//     }
// }

// class Database
// {
//     private $host = "ep-delicate-heart-a5pwo6mt.us-east-2.aws.neon.tech";
//     private $user = "sbd_owner";
//     private $password = "JICW2kGaOtS7";
//     private $database = "api_employee";
//     private $port = "5432"; // Ganti dengan port yang sesuai jika berbeda

//     public $conn;

//     public function getConnection()
//     {
//         $this->conn = null;

//         try {
//             $this->conn = new PDO("pgsql:host=$this->host;port=$this->port;dbname=$this->database", $this->user, $this->password);
//             $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         } catch (PDOException $e) {
//             echo "Database could not be connected: " . $e->getMessage();
//         }

//         return $this->conn;
//     }
// }

class Database
{
    public $db;
    public function getConnection()
    {
        $this->db = null;
        try {
            // echo "Konekin dulu nih... ";
            $dsn = "pgsql:host=ep-delicate-heart-a5pwo6mt.us-east-2.aws.neon.tech;dbname=api_employee;user=sbd_owner;password=JICW2kGaOtS7";
            $this->db = new PDO($dsn);
        } catch (PDOException $e) {
            echo "Database could not be connected: " . $e->getMessage();
        }
        return $this->db;
    }
}
?>