<?php

class database{
  private $servername = "localhost";
  private $username   = "root";
  private $password   = "";
  private $database   = "db";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
  }

  // Insert customer data into customer table
  public function insertData($name, $email, $salary)
  {
    $query="INSERT INTO customers(name,email,salary) VALUES('$name','$email','$salary')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }
  }

  // Fetch customer records for show listing
  public function displayData()
  {
    $query = "SELECT * FROM customers";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }
    else{
      return null;
    }
  }

  // Fetch single data for edit from customer table
  public function displayRecordById($id)
  {
    $query = "SELECT * FROM customers WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      // Row variable do not need to be an array because we are looking for just one line from the table, but it still is an associative array (key - value)
      $row = $result->fetch_assoc();
      return $row;
    }
  }

  // Update customer data into customer table
  public function updateRecord($uname, $uemail, $usalary, $id)
  {
      $query = "UPDATE customers SET name = '$uname', email = '$uemail', salary = '$usalary' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }
  }

  // Delete customer data from customer table
  public function deleteRecord($id)
  {
    $query = "DELETE FROM customers WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }
  }
  
}
$customerObj = new database();