<?php
session_start();

    include("connection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {

        $fname = addslashes($_POST['fname']);
        $lname = addslashes($_POST['lname']);
        $uname = addslashes($_POST['uname']);
        $email = addslashes($_POST['email']);
        $pword = addslashes($_POST['pword']);

        $query = "INSERT INTO users (ID, fname, lname, uname, email, pword) VALUES ('$ID', '$fname', '$lname', '$uname', '$email', '$pword')";

        mysqli_query($con, $query);

        // REDIRECT IF REGISTER IS SUCCESSFUL
        header("Location: index.php");
        die;
        echo "tite"; 
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
        <h4>REGISTER</h4>
        <form action="" method="post" class="form">
            <label>fName</label>
            <input type="text" name="fname" id="fname" />
            <label>lName</label>
            <input type="text" name="lname" id="lname" />
            <label>username</label>
            <input type="text" name="uname" id="uname" />
            <label>email</label>
            <input type="text" name="email" id="email" />
            <label>password</label>
            <input type="password" name="pword" id="pword" />
            <input type="submit" value="Register" class="btn">
        </form>
        <a href="index.php">I have an account.</a>
    </div>
</body>
</html>