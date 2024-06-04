<?php
class Database
{
  private $connection;

  function __construct()
  {
    $this->connect_db();
  }

  public function connect_db()
  {
    // PDO connection string
    $dsn = 'mysql:host=localhost;dbname=db'; //Data Source Name
    $username = 'root';
    $password = '';
    // Creating a new PDO instance
    $this->connection = new PDO($dsn, $username, $password);

  }

  public function create($fname, $lname)
  {

    $sql = "INSERT INTO student (fname, lname) VALUES ('$fname', '$lname')";
    $this->connection->exec($sql);

  }
}

$database = new Database();
?>