<!DOCTYPE HTML>
<html>
<?php
  function runMyFunction() {

    $servername = "localhost";
    $username = "id18724764_root";
    $password = "kxgGvBwe57\$SzHw-";
    $database = "id18724764_main";

// Create connection
    $conn = new mysqli($servername, $username, $password, $database);

// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    $sql = "CREATE TABLE MyGuests (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        if ($conn->query($sql) === TRUE) {
          echo "Table MyGuests created successfully";
        } else {
          echo "Error creating table: " . $conn->error;
        }
        
        $conn->close();
  }

  if (isset($_GET['hello'])) {
    runMyFunction();
  }
?>

Hello there!
<a href='index.php?hello=true'>Connect</a>
</html>