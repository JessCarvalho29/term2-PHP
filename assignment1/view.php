<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/stylehome.css" />
    <link rel="stylesheet" href="style/styleView.css" />
    <link rel="shortcut icon" href="images/favicon.webp" type="image/x-icon" />
    <title>Pizza delivery</title>
  </head>

  <body>
    <header>
      <div class="left-side">
        <img src="images/logo2.png" class="logo" />
        <h1 class="name-site">Authentic Italian Pizza</h1>
      </div>
      <div class="middle-side">
        <nav>
          <ul>
            <li><a href="index.php">Order pizza</a></li>
            <li><a href="view.php">View your Orders</a></li>
          </ul>
        </nav>
      </div>

      <div class="right-side">
        <img class="local" src="images/local.png" alt="Local image" />
        <span class="location">GTA, ON</span>
      </div>
    </header>
    <main>

      <div class="container">
        <div class="row">
          <table class="table">
            <?php

            require_once('database.php');

              $DBreturn = $database->getData();
            ?>
            <tr>
              <th>Quantity</th>
              <th>Size</th>
              <th>Shape</th>
              <th>Topping</th>
              <th>Crust</th>
              <th>Order Type</th>
              <th>Name</th>
              <th>Phone</th>
            </tr>
            <?php
            while($result = mysqli_fetch_assoc($DBreturn)){
              echo "<tr>";
              echo "<td>".$result['quantity']."</td>";
              echo "<td>".$result['size_pizza']."</td>";
              echo "<td>".$result['shape']."</td>";
              echo "<td>".$result['topping']."</td>";
              echo "<td>".$result['crust']."</td>";
              echo "<td>".$result['delivery_takeout']."</td>";
              echo "<td>".$result['client_name']."</td>";
              echo "<td>".$result['phone']."</td>";
              echo "</tr>";
              }
            ?>
          </table>
        </div>
      </div>
      <div class="button-div">
      <a href='view.php'><button class="refresh-button" >Refresh Page</button></a>
      </div>

    </main>
    <footer>
      <p><small>© Pizza Restaurant.</small></p>
    </footer>
  </body>
</html>