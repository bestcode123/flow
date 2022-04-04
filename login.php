<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    function inside() {
        echo "Hello" . $usrn;
    }
    
    function login() {
        $servername = "localhost";
        $username = "id18724764_root";
        $password = "kxgGvBwe57\$SzHw-";
        $database = "id18724764_main";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT uid, username, password FROM userinfo";

        $result = $conn->query($sql);
        
        $in = FALSE;
        $uid = 0;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row['username'] === $_POST['username'] && $row['password'] === $_POST['password']) {
                  $in = TRUE;
                  $usrn = $row['username'];
                  $psw = $row['password'];
                  $uid = $row['uid']; 
              }
            }
          } else {
            echo "0 results";
        }
        
        if($in) {
            inside();
        }

        $conn->close();
    }

    if(isset($_POST['submit'])) {
        login();
    }
    
    ?>
    <div class="login_panel">
        <form name="loginform" action="" method="post">
            <input type="text" placeholder="username" name="username" />
            <input type="password" placeholder="password" name="password" />
            <input type="submit" name="submit" />
        </form>
    </div>
    <a href="signin.php">Sign Up</a>
</body>
</html>