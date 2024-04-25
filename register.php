<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/vms-style.css">
</head>
<body>
    <?php
        include("db.php");
        //Checking for self server method, to avoid undefined variables warning
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $passwordRepeat = $_POST['repeat_password'];

            $errors = array();
            //display errors   
            if (empty($name) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
            }
            if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
            }
            if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
            }

            //check if email already exists
            $query = "SELECT * FROM users_login WHERE email = '$email'";
            $result = mysqli_query($conn, $query);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
            array_push($errors,"Email already exists!");
            }

            //display errors(if any)
            if(count($errors) > 0){
                foreach($errors as $error){
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
            //succesfull registration
            else{
                $query = "INSERT INTO users_login (name, email, password) VALUES ('$name', '$email', '$password')";
                mysqli_query($conn, $query);
                echo "<div class='alert alert-success'>You are registered successfully</div>";
            }
            mysqli_close($conn);
        }
    ?>
    <!-- registration box -->
    <div class="screen-header">
        <span class="header-vms">VMS</span>
        <br>
        <span class="header-qs">Vendor Managment System</span>
    </div>
    <div class="container" style="
        margin-top: 30px;
    ">
        <h3>REGISTER</h3>
        <form action="register.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
            <a href="login.php">Back</a>
        </form>
    </div>
</body>
</html>