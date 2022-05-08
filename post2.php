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
    function inside() {}

    function login() {
        // Connection To Database:
        $servername = "localhost";
        $username = "id18724764_root";
        $password = "kxgGvBwe57\$SzHw-";
        $database = "id18724764_main";
        $conn = new mysqli($servername, $username, $password, $database);
        if($conn->connect_error) {
            die("connection Error: " . $conn->connect_error);
        }

        // Login Credential Retreival:
        $login_sql = "SELECT uid, username, password FROM userinfo";
        $result = $conn->query($login_sql);

        // Login Credential Authentication:
        $in = FALSE;
        $uid = 0;
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['username'] === $_POST['secure_username'] && $row['password'] === $_POST['secure_password']) {
                    $in = TRUE;
                    $usrn = $row['username'];
                    $psw = $row['password'];
                    $uid = $row['uid'];
                }
            } if(!$in) {
                echo("Error: Your Credentials Do Not Match Our Records");
            }
        }

        // Post Information Retreival;
        $post_title = $_POST['post_title'];
        $post_body = $_POST['post_body'];
        $post_alias = $_POST['post_alias'];

        // Post Database Implementation:
        $post_sql = "INSERT INTO posts (title, body, alias) VALUES (" . $post_title . ", " . $post_body . ", " . $post_alias . ")"
        $conn->query($post_sql)
    }
    ?>
    <div class="enter_info">
        <form name="post_form" action="" method="post">
            Username: <input type="text" name="secure_username" />
            Password: <input type="password" name="secure_password" /><br />
            Post Data: <hr />
            Title: <input type="text" name="post_title" />
            Body: <input type="text" name="post_body" />
            Alias: <input type="text" name="post_alias" />
            <input type="submit" name="submit" />
        </form>
    </div>
</body>
</html>