<?php
include "class/AccountManager.php";
include "class/Account.php";
$manager=new AccountManager("user.json");
$nameErr = NULL;
$emailErr = NULL;
$phoneErr = NULL;
$passwordErr=NULL;
$repeatPasswordErr=NULL;
$name = NULL;
$email = NULL;
$phone = NULL;
$password= NULL;
$repeatPassword=NULL;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password=$_POST["password"];
    $repeatPassword=$_POST["repeatPassword"];
    $has_error = false;

    if (empty($name)) {
        $nameErr = "Username cannot be empty!";
        $has_error = true;
    }
    if (!$manager->validateUserName($name)){
        $nameErr="Not a valid username.";
        $has_error = true;
    }

    if (empty($email)) {
        $emailErr = "Email cannot be empty!";
        $has_error = true;
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Wrong email format (xxx@xxx.xxx.xxx)!";
            $has_error = true;
        }
    }

    if (empty($phone)) {
        $phoneErr = "Phone number cannot be empty!";
        $has_error = true;
    }
    else if (!$manager->validatePhoneNumber($phone)){
        $phoneErr="Not a valid phone number!";
        $has_error=true;
    }
    if (empty($password)){
        $passwordErr="Password cannot be empty!";
        $has_error=true;
    }else if (!$manager->validatePassword($password)){
        $passwordErr="Password must contains at least one Uppercase, one number and one special character";
        $has_error=true;
    }
    if(empty($repeatPassword)){
        $repeatPasswordErr="Please re-enter your password here";
        $has_error=true;
    }else if (!$manager->validatePassword($repeatPassword)){
        $repeatPasswordErr="You entered a wrong repeat.";
        $has_error=true;
    }


    if ($has_error === false) {
        $newUser=[$name,$email,$phone,$password];
        $manager->saveDataJSON("user.json", $newUser);
        $name = NULL;
        $email = NULL;
        $phone = NULL;
        $password=NULL;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .divider-text {
        position: relative;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .divider-text span {
        padding: 7px;
        font-size: 12px;
        position: relative;
        z-index: 2;
    }
    .divider-text:after {
        content: "";
        position: absolute;
        width: 100%;
        border-bottom: 1px solid #ddd;
        top: 55%;
        left: 0;
        z-index: 1;
    }
</style>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">


<div class="container">
    <br>
    <hr>





    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
                        <p class="divider-text">
                <span class="bg-light">OR</span>
            </p>
            <form method="post">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="name" class="form-control" placeholder="Full name" type="text">
                    <span class="error">* <?php echo $nameErr; ?></span>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input name="email" class="form-control" placeholder="Email address" type="email">
                    <span class="error">* <?php echo $emailErr; ?></span>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                    </div>
                    <select class="custom-select" style="max-width: 120px;">
                        <option selected="">Vinaphone</option>
                        <option value="1">Mobiphone</option>
                        <option value="2">Viettel</option>
                    </select>
                    <input name="phone" class="form-control" placeholder="Phone number" type="number">
                    <span class="error">* <?php echo $phoneErr; ?></span>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                    </div>
                    <select class="form-control">
                        <option selected=""> Select job type</option>
                        <option>Designer</option>
                        <option>Manager</option>
                        <option>Accounting</option>
                    </select>
                </div> <!-- form-group end.// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="password" class="form-control" placeholder="Create password" type="password">
                    <span class="error">* <?php echo $passwordErr; ?></span>
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input name="repeatPassword" class="form-control" placeholder="Repeat password" type="password">
                    <span class="error">* <?php echo $repeatPasswordErr; ?></span>
                </div> <!-- form-group// -->
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                </div> <!-- form-group// -->
                <p class="text-center">Have an account? <a href="">Log In</a> </p>
            </form>
        </article>
    </div> <!-- card.// -->

</div>
<!--container end.//-->

<br><br>
</body>
</html>
