
<?php include("./partials/menu.php");
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
	$payment=$_POST['payment'];
	$year=$_POST['year'];
	$describe = mysqli_real_escape_string($conn,$_POST['describe']);
	$phone=$_POST['phone'];
	$phone1=$_POST['phone1'];
	


	$new =strtoupper($lname);
	$update = mysqli_query($conn,"INSERT  INTO inactivestudent (First_name,Last_name,phone,phone1,class,payment,Description,AC)VALUES('$fname','$lname','$phone','$phone1','$tbl','$payment','$describe','$year')");
	$update = mysqli_query($conn,"DELETE from student where class='$tbl' and No='$id' ");

	$_SESSION['register']="<form class='uniquee' method='POST'>
	<div class='card m bg-white  fs-1 p-4'>
	<svg class='bi flex-shrink-0 me-2 text-success' width='94' height='94' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg><br>
	<input type='submit' name='member' class=' btn btn-success' value='$new $fname UP-TO-DATE '>
	</div> 
	</form>";

		header('location:'.URL."admin/");
}
$select= mysqli_query($conn,"SELECT *from student  where class='$tbl' AND No=$id");
while($all = mysqli_fetch_assoc($select)){


?>
<head>

	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="icon" href="./img/sfms.png">
	<title><?php echo $all['First_name']." ".$all['Last_name'] ." From ".$all['trade']; ?> - Info </title>
  
</head>
<body class="bg-light">
 <div  class="container bg-dark col-md-4 card py-2" style="width:35rem;position:relative; top:3rem">
 <form method="POST">
    <table class="table table-dark table-striped">
		<tr>
		    <th colspan='2' >Confirm <?php echo $all['Last_name'] ?> Request for Leaving</th>
        </tr>
		<tr>
            <td>Firstname</td>
			<td><?php echo $all['First_name'] ?> <?php echo $all['Last_name'] ?></td>
		</tr>
		
		<tr>
			<td>Phone 1/2</td>
			<td><?php echo $all['phone'] ?> | <?php echo $all['phone1'] ?></td>
          
		</tr>
		<tr>
			<td> Academic Year</td>
			<td>
				<?php
				$currently_selected = date('Y'); 
				$earliest_year = 2011; 
				$latest_year = date('Y'); 
				print "<select name='year' class='form-select '>";
				foreach ( range( $latest_year, $earliest_year ) as $i ) {
					echo '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
				}
				echo "<option value='Unspecified'>Unspecified</option>";

				print '</select>';
				?>
			</td>
		</tr>
		<tr>
			<td>Reason For Leaving</td>
			<td>
                <select name="describe" id="" class="form-select">
                        <option value="Not Specified">Mention Reason</option>
                        <option value="Finished School Year">Finished School Year</option>
                        <option value="Fired By School Displine Master">Fired By School Displine Master</option>
                        <option value="Moved to New School">Moved to New School</option>
                        <option value="Can't Pay School Fees">Can't Pay School Fees</option>
                </select>
            </td>
		</tr>
            <tr>
			<th colspan='3' class="text-center">
        

		<input type="hidden" name="fname" value="<?php echo $all['First_name'] ?> ">
		<input type="hidden" name="lname" value="<?php echo $all['Last_name'] ?> ">
		<input type="hidden" name="phone" value="<?php echo $all['phone'] ?>">
		<input type="hidden" name="payment" value="<?php echo $all['payment'] ?>">
		<input type="hidden" name="phone1" value="<?php echo $all['phone1'] ?>">


				<input type='submit' class="btn btn-primary" name="btn" value="Confirm">

            </th>
		</tr>
    </table>
  </form>
 </div>



		



</body>
<br>
<br>
<?php }include("./partials/footer.php"); ?>