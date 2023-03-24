
<?php 
include("./configs/constant.php");
if(!empty($_GET['id']) &&  !empty($_GET['class'])){
     $id = $_GET['id'];
     $tbl = strtolower($_GET['class']);

 }else{
    $_SESSION['Invalid_Trde'] = "<form class='uniquee' method='POST'>
    <div class='card m bg-white text-danger fs-1 p-5'>
    <svg class='bi flex-shrink-0 me-2' width='64' height='64' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    Unidentified Trade
    </div> 
   </form>";
  header("Location:".URL."admin/");
 }

 
 if(isset($_POST['btn'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$id=$_POST['id'];
 $phone=$_POST['phone'];
 $class=$_POST['class'];
 $phone1=$_POST['phone1'];
 


 $new =strtoupper($lname);
 $update = mysqli_query($conn,"UPDATE student set First_name='$fname',Last_name='$lname',class='$class',phone='$phone',phone1='$phone1' where class='$tbl' and No=$id");
 $_SESSION['register']="<form class='uniquee' method='POST'>
 <div class='card m bg-white  fs-1 p-4'>
 <svg class='bi flex-shrink-0 me-2 text-success' width='94' height='94' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg><br>
 <input type='submit' name='member' class=' btn btn-success' value='$new $fname UP-TO-DATE '>
 </div> 
</form>";

	header('location:'.URL."admin/update.php?class=$tbl");
}
$select= mysqli_query($conn,"SELECT *from student  where class='$tbl' AND No=$id");
while($all = mysqli_fetch_assoc($select)){


?>
<head>

	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="icon" href="./img/sfms.png">
	<title>Update <?=  $all['Last_name']?> Information </title>
  
</head>
<body class="bg-light">
 <div  class="container bg-dark col-md-4 card py-2" style="width:35rem;position:relative; top:3rem">
 <form method="POST">
    <table class="table table-dark table-striped">
		<tr>
		    <th colspan='2' >Update <?php echo $all['Last_name'] ?> Information</th><th> Enter New Values</th>
        </tr>
		<tr>
            <td>Firstname</td>
			<td><?php echo $all['First_name'] ?></td>
			<td><input type="text" name="fname" value="<?php echo $all['First_name'] ?> "></td>
		</tr>
		<tr>
            <td>Last Name</td>
			<td><?php echo $all['Last_name'] ?></td>
			<td><input type="text" name="lname" value="<?php echo $all['Last_name'] ?> "></td>
		</tr>
		
		<tr>
			<td>Phone 1.</td>
			<td><?php echo $all['phone'] ?></td>
			<td><input type="text" name="phone" value="<?php echo $all['phone'] ?>" ></td>
		</tr>
		<tr>
			<td>Phone 2.</td>
			<td><?php echo $all['phone1'] ?></td>
			<td><input type="text" name="phone1" value="<?php echo $all['phone1'] ?>" ></td>
		</tr>
		<tr>
			<td>Class </td>
			<td><?php echo strtoupper($all['class']) ?></td>
			<td><input type="text" name="class" value="<?php echo $all['class'] ?>" ></td>
		</tr>

		


	  
		<tr>
			<th colspan='3' class="text-center">
				<input type='hidden' class="btn btn-primary" name="id" value="<?=$id?>">
				<input type='submit' class="btn btn-primary" name="btn" value="Update">
			</th>
		</tr>
    </table>
  </form>
 </div>

</body>
<br>

<br>
<?php }include("./partials/footer.php"); ?>
