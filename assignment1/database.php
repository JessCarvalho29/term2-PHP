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
    $this->connection = mysqli_connect('localhost', 'root', '', 'pizza_delivery');
  }

  public function getData()
  {
    $query = 'SELECT * FROM orders;';
    $result = $this->connection->query($query);
    return $result;
  }

  public function execute($quantity, $size, $shape, $topping, $crust, $takeoutOrDelivery, $name, $phone)
  {
    try {
      $sql = "INSERT INTO orders (quantity,size_pizza,shape,topping,crust,delivery_takeout,client_name,phone) VALUES ('$quantity','$size','$shape','$topping','$crust','$takeoutOrDelivery','$name','$phone');";
      $result = $this->connection->query($sql);
      return $result;
    } catch (Exception $e) {
      echo 'Message: ' . $e->getMessage();
    }
  }
}
$database = new Database();
