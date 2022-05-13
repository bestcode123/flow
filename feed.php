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
        // Simple Feed Implementation:
        $servername = "localhost";
        $username = "id18924381_root";
        $password = "GSkN|x55\Jrh+]48";
        $database = "id18924381_main";
        $conn = new mysqli($servername, $username, $password, $database);
        if($conn->connect_error) {
            die("connection Error: " . $conn->connect_error);
        }

        // 1 - Fetch:
        $feed_fetch_sql = "SELECT * FROM posts";
        $result = $conn->query($feed_fetch_sql) or die($conn->error);

        // 2 - Analysis ? idk lol:
        if(TRUE) {
            while($row = $result->fetch_assoc()) {
                echo "Post " . $row['postid'] . ", title " . $row['title'] . ", body " . $row['body'] . ", by " . $row['alias'] . " (alias)!";
            }
        }

        $conn->close();
    ?>
</body>
</html>