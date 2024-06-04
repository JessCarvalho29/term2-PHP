<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD in OOP PHP | Create & Read</title>
  <meta name="description" content="This week we will be using OOP PHP to create and read with our CRUD application">
  <meta name="robots" content="noindex, nofollow">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap"
    rel="stylesheet">
</head>

<body>
  <header>
    <nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./img/php-logo.png" alt="header logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="view.php">View</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="masthead">
    <div>
      <h1>Create, Read, & Validate with OOP PHP</h1>
    </div>
  </section>
  <main class="container">
    <section class="form-row row justify-content-center">
      <!-- the add.php will execute our CREATE function -->

      <!-- <form method="post" action="add.php" class="form-horizontal col-md-6 col-md-offset-3"> -->
      <form method="post" action="index.php" class="form-horizontal col-md-6 col-md-offset-3">
        <!-- I am using the wrong input types so that we can test our php validation with no road blocks -->
        <p><input type="text" name="name" placeholder="Your Name"></p>
        <p><input type="text" name="email" placeholder="Your Email"></p>
        <p><input type="number" name="age" placeholder="Your Age"></p>
        <!-- Validate if the number is 10 digits -->
        <p><input type="number" name="contact" placeholder="Your Contact Number"></p>
        <input class="btn btn-primary order" type="submit" name="Submit" value="Add">
        <input class="btn btn-dark reset" type="reset" value="Clear">
      </form>
    </section>
  </main>
  <?php
    include ('validate.php');
    require_once ('database.php');
    // create our class objects
    $valid = new validate();

    if (!empty($_POST['Submit'])) {
      // using our escape_string function
      // Getting the value insert into the input by passing the key and saving it in the variables
      $name = $_POST['name'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $contact = $_POST['contact'];
      // using our functions found in our validate class 
      // (checkEmpty validAge validEmail)
      // $msg = $valid->checkEmpty($_POST, array('name', 'age', 'email'));

      // Associative array: key (attribute_name for the input) value path
      // POST is an array!!
      // If I want to check for all the fields, we pass just the array: $_POST
      // If I want to check one of the fields, I can pass the key: $_POST['name']
      $msg = $valid->checkEmpty($_POST);
      $checkAge = $valid->validAge($_POST['age']);
      $checkEmail = $valid->validEmail($_POST['email']);
      $checkContact = $valid->validContact($_POST['contact']);
      // now handle any empty fields
      if ($msg != null) {
        echo '<p class="error-msg">'.$msg.'</p>';
      } elseif (!$checkEmail) {
        echo '<p class="error-msg">Please provide a valid email.</p>';
      } elseif (!$checkAge) {
        echo '<p class="error-msg">Please provide a valid age.</p>';
      } elseif (!$checkContact) {
        echo '<p class="error-msg">Please provide a valid contact.</p>';
      } else {
        // if all the fields are valid
        $result = $database->execute($name, $age, $email, $contact);
        // let the user know that the record has been added
        if ($result) {
          echo "<p>Data added successfully.</p>";
          echo "<a href='view.php'>View Result</a>";
        }

      }
    }
  ?>
</body>

</html>