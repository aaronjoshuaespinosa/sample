<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $uname = addslashes($_POST['uname']);
        $pword = addslashes($_POST['pword']);
        
        if(!empty($uname) && !empty($pword)) {
            // FETCH FROM DATABASE
            $query = "SELECT * FROM users WHERE uname = '$uname' limit 1";
            $result = mysqli_query($con, $query);

            if($result) {
                if($result && mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['pword'] == $pword) {
                        $_SESSION['ID'] = $user_data['ID'];
                        // REDIRECT IF LOGIN IS SUCCESSFUL
                        header("Location: welcome.php");
                        die;
                    }
                }
            }
            echo "wrong username/password.";
        }
        else {
            echo "wrong username/password.";
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="main">
        <h4>LOGIN</h4>
        <form action="" method="post" class="form">
            <label>username</label>
            <input name="uname" id="uname" />
            <label>password</label>
            <input name="pword" id="pword" />
            <input type="submit" value="Login" class="btn">
        </form>
        <a href="register.php">I want to join.</a>
    </div>
</body>
</html>
