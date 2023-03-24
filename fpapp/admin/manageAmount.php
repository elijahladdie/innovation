
<?php 
include("./partials/menu.php");
$sql = mysqli_fetch_assoc(mysqli_query($conn,"SELECT fees FROM admin"));
$count = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM student"));
$sql1 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(payment) as amount  FROM student"));
$money =  $sql['fees'] *  $count
?>
<head>

	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="icon" href="./img/sfms.png">
	<title>Details </title>
  
</head>
<body class="bg-secondary">
 <div  class="container bg-light col-5 card py-2 fs-2" style="width:35rem;position:relative; top:3rem">
 <form method="POST">
    <table class="table table-light table-striped fs-4">
		<tr>
		    <th colspan='4' class='text-center' > Details about payment</th>
        </tr>
        <tr >
            <td>Fee </td>
            <td>  </td>
            <td> <?=   $sql['fees'] ?>.00 RWF</td>
        </tr>
		
		<tr>
            <td  class='text-primary'>Students  </td>
			<td>  </td>
			<td  class='text-primary'> <?=   $count ?></td>
		</tr>
		<tr class='text-warning'>
            <td>Total</td>
			<td>  </td>
			<td> <?php echo $money ?>.00 RWF</td>
		</tr>
		<tr>
            <td  class='text-success'> Payed </td>
			<td>  </td>
			<td  class='text-success'><?= $sql1['amount']?>.00 RWF</td>
		</tr>
		<tr  class='text-danger'>
            <td> Remain </td>
			<td>  </td>
			<td><?= $money  -  $sql1['amount'] ?>.00 RWF</td>
		</tr>
    </table>
  </form>
 </div>

</body>
<br>

<br>
<br>
<br>
<?php include("./partials/footer.php"); ?>
