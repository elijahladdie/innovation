<?php
include("./partials/menu.php");  
$sql = mysqli_query($conn,"SELECT sum(payment) as payment from student");
$query = mysqli_fetch_assoc($sql);
$result = $query['payment'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title>Fees Pay App</title>
</head>
<!-- <frameset rows=3></frameset> -->
<style>
    .sod{
      width:29vh;
      height:20vh;
      background: white;
      position: absolute;
      display: none;
      align-items: center;
      justify-content: center;
      transition: all 2s ease-in-out
      }
      a{
        text-decoration:none;
      }
      .shadow:hover .sod{
        display: flex;
        background: white

      
      }
      h1{
        width:50vh;
        height:20vh;
        display: flex;
        align-items: center;
        justify-content: center;
        
      }
      .uniquee{
		position: absolute;
		top:0;
		left:0;
		background: #495057af;
		width:100%;
		height:99vh;
		display:flex;
		align-items:center;
		justify-content:center;

}
.card.m{
	display: flex;
	justify-content: center;
	align-items: center;
}
svg{
	font-size:34rem;
}
</style>

<body>
    <div class="container-fluid bg-secondary">
        <?php 
     

    if(isset($_SESSION['Invalid_Trde'])){
	echo $_SESSION['Invalid_Trde'];
	unset($_SESSION['Invalid_Trde']);
}
if(isset($_SESSION['register'])){
	echo $_SESSION['register'];
	unset($_SESSION['register']);
} 



?>
<div class="d-flex justify-content-between">

    <h1 class="p-5 text-dark">DASH<span class="text-light">BOARD</span></h1>
    <h1 class="p-5 text-white"><?= $result?>.RWF</h1>
</div>

        <div class="d-sm-flex ">

         
            <h1  class="  text-dark m-3 text-center shadow bg-light">
                <a href="./payment.php?trade=SOD" class="sod">GO</a>
                SOD 
            </h1>
           

            <h1  class="text-dark m-3 text-center shadow bg-light">
            <a href="./payment.php?trade=mas" class="sod">GO</a>
            BUC
        </h1>
       
        
            <h1   class="text-dark m-3 text-center shadow bg-light">
            <a href="./payment.php?trade=WOT" class="sod">GO</a>
            WOT
        </h1>
          
        
        <h1   class="text-dark m-3 text-center shadow bg-light">
            <a href="./payment.php?trade=CSA" class="sod">GO</a>
            CSA
        </h1>
   
        <h1   class="text-dark m-3 text-center shadow bg-light">
            <a href="./payment.php?trade=PLT" class="sod">GO</a>
            PLT
        </h1>
   
            <h1   class="text-dark m-3 text-center shadow bg-light"> 
               <a href="./paySearch.php" class="sod">GO</a>
               All
        </h1>
            </div>
        </div>
    </div>
</body>
</html>
<?php include("./partials/footer.php");  ?>