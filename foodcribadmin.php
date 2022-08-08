<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '' , 'db_login') or die ('Unable to connect');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="foodcribadmin.css">
    <title>Admin</title>
</head>
<body>
    <div class="container">
        <div>
            <h2 class="bg-text">Please Login</h2>
        </div>
        <div class="loginform">
            <div>
                <form action = "foodcribadmin.php" method = "post">
                    <input type = "text" class = "field" name = "Username" placeholder = "Username" required = ""><br/>
                    <input type = "password" class = "field" name = "Pass" placeholder = "Password" required = ""><br/>
                    <input type = "submit" class = "field2" name = "login" value = "Login">
                </form>
            </div>
        </div>
    </div>

    

<?php
    if (isset($_POST['login'])){
        $Username = $_POST['Username'];
        $Pass = $_POST['Pass'];

    $select = mysqli_query($conn," SELECT * FROM tb_user WHERE Username = '$Username' AND Pass = '$Pass' ");
    $row  = mysqli_fetch_array($select);

    if(is_array($row)) {
        $_SESSION["Username"] = $row['Username'];
        $_SESSION["Pass"] = $row['Pass'];
    }   else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Username or Password!");';
        echo 'window.location.href = "foodcribadmin.php" ';
        echo '</script>';
    }
    }
    if(isset($_SESSION["Username"])){
        header("Location:login.php");
    }
?>

</body>
</html>