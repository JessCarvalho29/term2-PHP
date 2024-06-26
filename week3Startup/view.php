<?php
	// First: run the select query using the read method inside the database class
	require_once ('database.php');
	// getting the return of the method
	$res = $database->read();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CRUD in OOP PHP | Read</title>
	<meta name="description" content="This week we will be using OOP PHP to create our CRUD application">
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
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="view.php">View</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="row">
			<table class="table">
				<tr>
					<th>#</th>
					<th>Full Name</th>
					<th>Age</th>
					<th>Email</th>
				</tr>
				<?php
					// method mysqli_fetch_assoc to get the records one by one associetive array
					// $r is the loop variable
					while($r = mysqli_fetch_assoc($res)){
					?>
						<tr>
							<!-- syntax: method_echo loop_variable['database_colunm_name / key'] -->
							<td><?php echo $r['id']; ?></td>
							<td><?php echo $r['fname'] . " " . $r['lname']; ?></td>
							<td><?php echo $r['age']; ?></td>
							<td><?php echo $r['email']; ?></td>
						<tr>
					<?php
					}
	
				?>
			</table>
		</div>
	</div>

</body>

</html>