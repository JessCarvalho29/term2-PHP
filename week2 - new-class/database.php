<!DOCTYPE html>
<html>

<head>
    <title>Insert Page page</title>
</head>

<body>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn) {
    echo "Connection Successful<br>";
}

$fname = $_POST['fname'];
$lname = $_POST['lname'];


$sql = "INSERT INTO student (fname, lname) VALUES ('$fname', '$lname')";

if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
} 

mysqli_close($conn);
?>


</body>

</html>