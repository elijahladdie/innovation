
<?php 
include("./configs/constant.php");
   
if(!empty($_GET['id']) &&  !empty($_GET['class'])){
    $id = $_GET['id'];
    $tbl = $_GET['class'];
  }else{
    $_SESSION['Invalid_Trde'] = "<form class='uniquee' method='POST'>
    <div class='card m bg-white text-danger fs-1 p-5'>
    <svg class='bi flex-shrink-0 me-2' width='64' height='64' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    Unidentified Class
    </div> 
   </form>";
    header("location:".URL."admin/");
  }
$select= mysqli_query($conn,"SELECT *from student  where class='$tbl' AND  No=$id");
$money_left= mysqli_fetch_assoc(mysqli_query($conn,"SELECT fees from admin"));
$money = 0;
while($all = mysqli_fetch_assoc($select)){
	

?><head>

	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="icon" href="./img/sfms.png">
	<title><?php echo  strtoupper($all['Last_name']) ?> - Payment </title>
  
</head>
<body class="bg-light">
<div  class="container bg-dark col-md-4 card py-2" style="width:35rem;position:relative; top:3rem">
    <table class="table table-dark table-striped">
        <form method="POST" >
            <tr>
                <th colspan='2' >Pay  <?php echo  $all['Last_name'] ?> Fees</th><th> Enter Amount</th>
            </tr>
            
            <tr>
                <td>Amount Payed</td>
                <td><?php echo $all['payment'] ?></td>
                <td><input type="number" name="amount" ></td>
            </tr>
            <tr>
                <th colspan='3' class="text-center">
                    <input type='hidden' class="btn btn-primary" name="btn" value="<?= $id?>">
                    <input type='submit' class="btn btn-primary" name="btn" value="Update">
                </th>
            </tr>
        </form>
    </table>
</div>
<br>
<br>
</body>
<?php 

include("./partials/footer.php"); 

$money = $all['payment'] - $money_left['fees'];

}
echo $money;

if(isset($_POST['btn'])){
    $amount = $_POST['amount'];
    if($amount > $money_left['fees']){
        $money = "(".$money.")";
    }
    if($amount == $money_left['fees'] ){
        $money = 0;
    }
    $sql = mysqli_query($conn, "UPDATE student set payment = payment+'$amount' , Amount_left = Amount_left - $amount  where class='$tbl' and No=$id");
     
    header("Location: ".URL."admin/update.php?class=$tbl");
}


?>
