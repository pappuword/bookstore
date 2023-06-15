<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db4";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . $mysql->connect_error());
  }

  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $userId = $_POST['userId'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $contactNumber = $_POST['contactNumber'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];

    
  $sql = "INSERT INTO users (userId, firstName, lastName, contactNumber, password) 
          VALUES ('$userId', '$firstName', '$lastName', '$contactNumber', '$password')";

if (mysqli_query($conn, $sql)) {
    header ("Location: registration.html");
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Close database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="userId">User ID:</label>
                <input type="text" id="userId" name="userId" required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="contactNumber">Contact Number:</label>
                <input type="tel" id="contactNumber" name="contactNumber" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword" required>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>
</body>

</html>