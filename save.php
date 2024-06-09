<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio";

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare an insert statement
    $stmt = $con->prepare("INSERT INTO `contact` (`NAME`, `EMAIL`, `MSG`) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "data submitted";
    } else {
        echo "ERROR: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
mysqli_close($con);
?>
