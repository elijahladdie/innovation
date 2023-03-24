<?php
include("../configs/constant.php");
 if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($conn,"SELECT * FROM admin where a_uname='$username' AND a_password='$password' ");
    if(mysqli_num_rows($sql) == 1){
        $_SESSION['signed_in'] = "Welcome Economat";
        header("location: ./load.html");
    }else{
        $_SESSION["not_found"] = "<p class='text-danger text-center'> Incorrect Username or Password</p>";
        header("location: ".URL."admin/portal/index.php");

        
    }
 }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="../css/bootstrap.css">
      <title>FEES PAY APP | Login</title>
</head>

<body class="bg-secondary">
    <div class="container col-5  ">
        <form action="" method="POST" class="form-control  was-validated my-5  bg-dark text-white align-items-center">
            <div class=" row justify-content-center ">
                <img src="../img/sfms.png" class="col-4" alt="">

            </div>
            <hr>
            <div>
                <h1 class="text-center">Login</h1>
            <?php
            if(isset($_SESSION['signed_in'])){
            header("location: ./load.html");
               }
               
               if(isset($_SESSION["not_found"])){
               echo $_SESSION["not_found"];
               unset($_SESSION["not_found"]);
               }
               if(isset($_SESSION['pw_updated'])){
               echo $_SESSION['pw_updated'];
               unset($_SESSION['pw_updated']);
               }
                ?>

                <label for="" class="form-label">Username</label>
                <input type="text" required name="username" class="form-control ">
            </div>
            <div>
                <label for="" class="form-label">Password</label>
                <input type="password" required name="password" class="form-control">
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="Login" name="login" class="btn btn-primary px-4 m-4 col-4">
                <a href="./reset_pw.php" class="text-center py-1">Forgot Password</a>
            </div>


        </form>
    </div>

</body>

</html>