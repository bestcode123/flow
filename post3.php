<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $ison = false

    function inside() {
        $ison = true
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
            echo "There is not an account linked to this username";
        }
        
        if($in) {
            inside();
        }

        $conn->close();
    }

    if(isset($_POST['submit'])) {
        login();
    } if(isset($_POST['submit2'])) {
        if($ison == true) {
            post();
        } else {
            echo ""
        }
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
    <a href="post.php">Post</a>
    <p>Note: if you are wanting to use the post function, you will have to login first</p>
</body>
</html>
    <div class="post_panel">
        <form name="postform" action="" method="post">
            Title: <input type="text" name="title" placeholder="Enter Title" />
            Body: <input type="text" name="body" placeholder="Body" />
            <input type="submit" name="submit2" />
        </form>
</body>
</html>