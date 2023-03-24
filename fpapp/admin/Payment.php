<?php
include("./partials/menu.php");  

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <title> Payment | Fees Pay App </title>
</head>
<style>
    .sod{
      width:50vh;
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
</style>

<body>
    <div class="container-fluid bg-primary">

        <h2 class="p-3 text-white ">
            <?php 
       
                
        if(!empty($_GET['trade'])){
            $trade = $_GET['trade'];
          }else{
            $_SESSION['Invalid_Trde'] = "<form class='uniquee' method='POST'>
            <div class='card m bg-white text-danger fs-1 p-5'>
            <svg class='bi flex-shrink-0 me-2' width='64' height='64' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            Unidentified Trade
            </div> 
           </form>";
            header("location:".URL."admin/");
          }

  

        if($trade == "SOD"){
            echo "Software Development";
        }else if($trade == "mas"){
            echo "Building Construction";
        }
        if($trade == "WOT"){
            echo "Wood Techonology";

        }
        if($trade == "CSA"){
            echo "Computer System Architecture ";

        }
        if($trade == "PLT"){
            echo "Plumbing Technology";

        }
        ?></h1>

       

        <div class="d-sm-flex ">

         
            <h1  class="  text-dark m-3 text-center shadow bg-light">
                <a href="./update.php?trade=<?=$trade?>&level=L3" class="sod">GO</a>
                L3 
            </h1>
           

            <h1  class="text-dark m-3 text-center shadow bg-light">
                
                <?php 
            if( $trade == "mas"){
              echo "<span class='sod'><a href='./update.php?trade=$trade"."_a&level=L4'> A</a>"." 
              &nbsp;  "."<a href='./update.php?trade=$trade"."_b&level=L4'> B </a></span>";
            
            }
            
            if( $trade != "mas"){
                echo "<a href='./update.php?trade=$trade&level=L4' class='sod'>GO</a>";
            }
            ?>
            L4
        </h1>
       
        
            <h1   class="text-dark m-3 text-center shadow bg-light">
            <a href="./update.php?trade=<?=$trade?>&level=L5" class="sod">GO</a>
            L5
        </h1>
          
        
            </div>
        </div>
    </div>
</body>
</html>
<?php include("./partials/footer.php");  ?>