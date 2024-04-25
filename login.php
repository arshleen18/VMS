<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/vms-style.css">
</head>
<body>
    <?php
        include("db.php");
        $login = false;
        $showError = false;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
        
            $query = "SELECT * FROM users_login WHERE email='$email' AND password='$password' ";
            $result = mysqli_query($conn, $query);
    
            $num = mysqli_num_rows($result);
            if ($num == 1){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;
                header("location: dashboard.html");

            } 
            else{
                $showError = "Invalid Credentials";
            }
        }
            if($showError){
                echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> '. $showError.'
                </div> ';
            }
    ?>
    <div class="screen-header">
        <span class="header-vms">VMS</span>
        <br>
        <span class="header-qs">Vendor Managment System</span>
    </div>
    <div class="container" style="
        margin-top: 30px;
    ">
    <h3>LOGIN</h3>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div>
            <p>Not registered yet? <a href="register.php">Register Here</a></p>
        </div>
    </div>
</body>
</html>