<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    function login() {
        $servername = "localhost";
        $username = "id18924381_root";
        $password = "GSkN|x55\Jrh+]48";
        $database = "id18924381_main";

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO userinfo (username, password) VALUES (\"" . $_POST['username'] . "\", \"" . $_POST['password'] . "\");";

        if($conn->query($sql) === FALSE) {
            die($conn->error);
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
        </form><br />
        <a href="login.php">Login</a>
    </div>

</body>
</html>