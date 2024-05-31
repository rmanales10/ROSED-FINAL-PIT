<?php
session_start();
class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        
        // Create connection
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            echo "Connected successfully";
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function selectWithWhere($table, $columns = '*', $where = '') {
        $sql = "SELECT $columns FROM $table";
        if ($where) {
            $sql .= " WHERE $where";
        }

        $result = $this->conn->query($sql);

        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }

        $rows = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        
        return $rows;
    }

    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = implode(", ", array_map([$this, 'quoteValue'], array_values($data)));
        
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->conn->query($sql) === true) {
            return $this->conn->insert_id;  // return the last inserted ID if needed
        } else {
            die("Insert query failed: " . $this->conn->error);
        }
    }

    private function quoteValue($value) {
        return "'" . $this->conn->real_escape_string($value) . "'";
    }
}


$db = new Database('localhost', 'root', 'root123', 'attendance');
/*
// Perform a select query with a WHERE clause
$results = $db->selectWithWhere('users', '*', 'age > 30');
foreach ($results as $row) {
    print_r($row);
}
*/
if(isset($_POST['emaildb']) && isset($_POST['idnumber']) && isset($_POST['pass'])){
$email = $_POST['emaildb'];
$idnumbmer = $_POST['idnumber'];
$pass = $_POST['pass'];
$newUserData = [
    'email' => $email,
    'id_number' => $idnumbmer,
    'psword' => $pass
];
$insertId = $db->insert('credentials', $newUserData);
$_SESSION['success'] = 'Registered Successfully';
header('location: ./');
}


$db->closeConnection();

?>
