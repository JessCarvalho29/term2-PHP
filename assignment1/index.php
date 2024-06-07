<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/stylehome.css" />
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
    <p>
      <img id="body-image" src="images/the-best-pizza.png" alt="The Best Pizza" />
    </p>

    <form action="view.php" method="post">
      <div class="first-column">
        <label for="quantity">Number of Pizzas</label>
        <select name="quantity" id="quantity" style="font-size: 15px">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
        <br /><br />
        <label for="size-pizza">Size of the Pizza</label><br />
        <input type="radio" id="small-pizza" name="pizza-size" value="small" required />
        <label for="small-pizza">Small Size</label><br />
        <input type="radio" id="medium-pizza" name="pizza-size" value="medium" required />
        <label for="medium-pizza">Medium Size</label><br />
        <input type="radio" id="large-pizza" name="pizza-size" value="large" required />
        <label for="large-pizza">Large Size</label><br />
        <br /><br />
        <label for="shape-pizza">Shape of the Pizza</label><br />
        <input type="radio" id="round" name="shape-pizza" value="round" required />
        <label for="round">Round pizza</label><br />
        <input type="radio" id="square" name="shape-pizza" value="square" required />
        <label for="square">Square pizza</label><br />
        <br /><br />
        <label for="toppings">Choose your Toppings</label><br />
        <input type="radio" id="pepperoni" name="toppings" value="pepperoni" required />
        <label for="pepperoni">Pepperoni</label><br />
        <input type="radio" id="mushrooms" name="toppings" value="mushrooms" required />
        <label for="mushrooms">Mushrooms</label><br />
        <input type="radio" id="onions" name="toppings" value="onions" required />
        <label for="onions">Onions</label><br />
        <input type="radio" id="bacon" name="toppings" value="bacon" required />
        <label for="bacon">Bacon</label><br />
        <input type="radio" id="ham" name="toppings" value="ham" required />
        <label for="ham">Ham</label><br />
        <input type="radio" id="tomatoes" name="toppings" value="tomatoes" required />
        <label for="tomatoes">Tomatoes</label><br />
      </div>
      <div class="second-column">
        <label for="crust">Crust of your Pizza</label><br />
        <input type="radio" id="thin" name="crust" value="thin" required />
        <label for="thin">Thin</label><br />
        <input type="radio" id="thick" name="crust" value="thick" required />
        <label for="thick">Thick</label><br />
        <input type="radio" id="stuffed" name="crust" value="stuffed" required />
        <label for="stuffed">Stuffed</label><br />
        <br /><br />
        <label for="takeout-delivery">Choose one option:</label><br />
        <input type="radio" id="takeout" name="takeout-delivery" value="takeout" onchange="deliveryForm(this.id)" required />
        <label for="takeout">Take out</label><br />
        <input type="radio" id="delivery" name="takeout-delivery" value="delivery" onchange="deliveryForm(this.id)" required />
        <label for="delivery">Delivery</label><br />

        <div id="takeoutForm">
          <br /><br />
          <grid class="delivery-takeout-grid-css">
            <div class="right">
              <label for="name">Full name:</label><br />
              <label for="phone">Phone number:</label>
            </div>
            <div class="left">
              <input type="text" id="nameTakeout" name="name" required /><br />
              <input type="tel" id="phoneTakeout" name="phone" required /><br />
            </div>
          </grid>
        </div>
        <button class="send-button" type="submit" name="submit" id="submitButton">
          Send order
        </button>
      </div>
    </form>
  </main>

  <?php
  require_once('database.php');

  if (isset($_POST['submit'])) {

    $quantity = $_POST['quantity'];
    $size = $_POST['pizza-size'];
    $shape = $_POST['shape-pizza'];
    $topping = $_POST['toppings'];
    $crust = $_POST['crust'];
    $takeoutOrDelivery = $_POST['takeout-delivery'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $result = $database->execute($quantity, $size, $shape, $topping, $crust, $takeoutOrDelivery, $name, $phone);

    echo '<script language="javascript">';
    echo 'alert("Restaurant received your order!!")';
    echo '</script>';
  }
  ?>
  <footer>
    <p><small>© Pizza Restaurant.</small></p>
  </footer>
</body>

</html>