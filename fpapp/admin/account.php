
<?php 
include("./partials/menu.php");
$select= mysqli_query($conn,"select *from admin");

while($all = mysqli_fetch_assoc($select)){

$name = $all['a_names'];
$title = $all['a_title'];
$uname = $all['a_uname'];
$fees = $all['fees'];
$pw = $all['a_password'];
$id= $all['admin_id'];
?><head>
	<title><?php echo strtoupper($all['a_names']) ?> - Admin </title>

     	 	 	
</head>
<body class="bg-secondary">
<div  class="container bg-dark col-md-4 card py-2" style="width:35rem;position:relative; top:2rem">
    <form method="POST">
<table class="table table-dark table-striped">

    <tr><th colspan='3' class=' text-center fs-4 text-danger'> Be aware to change following information</tr>
    <tr>
        <th colspan='2'>Current Value</th><th> New Values</th>
        </tr>
            <tr class='text-capitalize'>
                <td >Name</td>
                <td  class='text-capitalize'><?= $name  ?></td>
                <td><input  class='text-capitalize form-control' type="text" name="name" value='<?= $name ?>'></td>
            </tr>
           

            <tr>
                <td>Title</td>
                <td  class='text-capitalize'><?= $title ?></td>
                <td><input  class='text-capitalize form-control' type="text" name="title" value='<?= $title ?>'></td>
            </tr>

            <tr>
                <td>Username</td>
                <td  class='text-capitalize'><?= $uname ?></td>
                <td><input  class='text-capitalize form-control' type="text"  name="uname" value='<?= $uname ?>'></td>
            </tr>
            <tr>
                <td>Fees</td>
                <td><?= $fees ?></td>
                <td><input type="number" name="fees"  class='form-control' value='<?= $fees ?>'></td>
            </tr>
            <tr>
                <td>Confirm</td>
                <td colspan='2'><input type="password" class='form-control' name="password" placeholder='Enter Password to confirm'></td>
            </tr>
            <tr>
                <th colspan='3' class="text-center">
                    <!-- <input type='submit' class="btn btn-primary" name="btn" value="Update"> -->
                    <input type='submit' class="btn btn-primary" name="btn" value="Update">
                </th>
            </tr>
            <?php 


}  



if(isset($_POST['btn'])){
$_name = $_POST['name'];
$_title = $_POST['title'];
$_uname = $_POST['uname'];
$_fees = $_POST['fees'];
$passw = md5($_POST['password']);



if($passw == $pw){
    
        $update = mysqli_query($conn,"UPDATE  admin set 
        a_names='$_name',
        a_title='$_title',
        a_uname='$_uname',
        fees='$_fees' where admin_id='$id' ");
        if($update != false){
          ?>
          <script>
                window.location.replace("http://localhost/ServerSide/@MyFiles/FPAPP/admin/index.php");
          </script>
          <?php
        }else{
            echo "<td colspan='3' class='text-center text-danger'>Unknown error occured</td>";
            
        }
    }
    else{
        echo "<td colspan='3' class='text-center text-danger'>Incorrect  Password </td>";
    }
}





?>
</table>
</form>
</div>
<br><br><br>
<?php include("./partials/footer.php"); ?>