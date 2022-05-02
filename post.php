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
    function post() {
        echo "hi";
    }

    if(isset($_POST['submit'])) {
        post();
    }
    
    ?>
    <div class="post_panel">
        <form name="postform" action="" method="post">
            Title: <input type="text" name="title" placeholder="Enter Title" />
            Body: <input type="text" name="body" placeholder="Body" />
            Enter Password to Submit: <input type="password" name="post_password" />
            <input type="submit" name="submit" />
        </form>
</body>
</html>