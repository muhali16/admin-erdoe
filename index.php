<?php 
require 'src/functions.php';
session_start();
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM `login` WHERE username='$username' ");
    // cek usernamae
    if(mysqli_num_rows($result) === 1){
        // cek password
        $row = mysqli_fetch_assoc($result);
        if($pass == $row["password"]){
            // set session
            $_SESSION["login"]= true;

            header("Location: dashboard.php");
            exit;
        } else {
            echo "
            <script>
            alert('Password Salah! Anda bukan admin Erdoe');
            document.location.href = 'index.php';
            </script>
            ";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login-Admin Erdoe</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="forms">
        <div class="head1">
                <h1>Admin Erdoe</h1>
        </div>
        <form action="" method="post">
            <input class="form-control" type="text" name="username" placeholder="Username"></input>
            <input class="form-control" type="password" name="password" placeholder="Password"></input>
            <div class="buttonn">
                <button type="submit" name="login">Login</button>
            </div>
        </form>
    </div>

</body>
</html>