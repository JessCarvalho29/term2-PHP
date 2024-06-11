<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD With PHP</title>
  <meta name="description" content="This week we will be building a CREATE and READ CRUD system with PDO">
  <meta name="robots" content="noindex, nofollow">
  <!--  Add our Google fonts  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap"
    rel="stylesheet">
  <!--  Add our Bootstrap  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--  Add our custom CSS  -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <header>
    <h1>Full CRUD With OOP</h1>
  </header>
  <main class="container">
    <?php
    if (isset($_GET['msg1']) == "insert") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration added successfully
            </div>";
    }
    // Getting the value of msg2 passed from database.php
    // isset(): Checking if we have value (if its set or not), return true or false
    // If I do not want to validate if have value I can just compare the $_GET['msg2'] == "update"
    if (isset($_GET['msg2']) == "update") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Your Registration updated successfully
            </div>";
    }
    if (isset($_GET['msg3']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert'>×</button>
              Record deleted successfully
            </div>";
    }
    ?>
    <section>
      <h2>View Records
        <a href="add.php" style="float:right;"><button class="btn btn-success"><i class="fas fa-plus"></i></button></a>
      </h2>

      <?php
      // Include database file
      include_once 'database.php';
      
      $customers = $customerObj->displayData(); ?>
      <table class="table table-hover table-dark table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($customers != null) {
            foreach ($customers as $customer) {
              ?>
              <tr>
                <td><?php echo $customer['id'] ?></td>
                <td><?php echo $customer['name'] ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td><?php echo $customer['salary'] ?></td>
                <td>
                  <!-- Indirect we are using the get when sending information from one page to another 
                   To pass more than one parameter, just use & -->
                  <button class="btn btn-danger"><a href="edit.php?editId=<?php echo $customer['id'] ?>">
                      <i class="fa fa-pencil text-white"></i></a></button>
                  <button class="btn btn-danger"><a href="index.php?deleteId=<?php echo $customer['id'] ?>"
                      onclick="return confirm('Are you sure?');">
                      <i class="fa fa-trash text-white"></i>
                    </a></button>
                    <!-- https://www.w3schools.com/jsref/met_win_confirm.asp -->
                </td>
              </tr>
            <?php }
          } else { ?>
            <tr>
              <td colspan=5 align="center">No Records Found</td>
            </tr>
          <?php }
          // Delete record from table
          if (!empty($_GET['deleteId'])) {
            $deleteId = $_GET['deleteId'];
            $customerObj->deleteRecord($deleteId);
          }
          ?>
        </tbody>
      </table>
    </section>
  </main>
</body>

</html>