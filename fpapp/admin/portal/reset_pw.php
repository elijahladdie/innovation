    <?php
    include("../configs/constant.php");
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $sql = mysqli_query($conn,"SELECT * FROM admin where a_uname='$username'");
        if(mysqli_num_rows($sql) >0 ){
            $insert = mysqli_query($conn,"UPDATE admin set a_password='$password' where a_uname
            ='$username'");
            $_SESSION['pw_updated'] = " <p class='text-center text-success'>Password Changed</p>";
            header("location: ./index.php");
        }else{
            $_SESSION["N_found"] = "<p class='text-danger text-center'>  Username Not Found</p>";
            header("location: ./reset_pw.php");

            
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/sfms.png">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>SFMS | Reset Password</title>
</head>
<body class="bg-secondary">
    <div class="container col-5  ">
        <form action="" method="POST" class="form-control  was-validated my-5 bg-dark text-white align-items-center">
            <div class=" row justify-content-center ">
                <img src="../img/sfms.png" class="col-4" alt="">
                
            </div>
            <hr>
            <div>
                <h1 class="text-center">Reset Password</h1>
                <?php
                if(isset($_SESSION["N_found"])){
                    echo $_SESSION["N_found"];
                    unset($_SESSION["N_found"]);
                                }
                ?>
                <label for="" class="form-label">Username</label>
                <input type="text" required  name="username" class="form-control ">
            </div>
            <div>
                <label for="" class="form-label">Password</label>
                <input type="password" required  name="password" class="form-control">
            </div>
            <div class="row justify-content-center">
                <input type="submit" value="Reset" name="login" class="btn btn-primary px-4 m-4 col-4" > </button>
            </div> 
             

        </form>
    </div>
    
</body>

</html>