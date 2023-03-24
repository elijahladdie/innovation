<?php
include("./partials/menu.php");  


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="./css/bootstrap.css">
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none">

    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path
        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>

    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
      <path
        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
  </svg>
  <title> Payment | Fees Pay App </title>
</head>
<style>
  .sod {
    width: 50vh;
    height: 20vh;
    background: white;
    position: absolute;
    display: none;
    align-items: center;
    justify-content: center;
    transition: all 2s ease-in-out
  }

  a {
    text-decoration: none;
  }

  .shadow:hover .sod {
    display: flex;
    background: white
  }

  h1 {
    width: 50vh;
    height: 20vh;
    display: flex;
    align-items: center;
    justify-content: center;

  }

  .uniquee {
    position: absolute;
    top: 0;
    left: 0;
    background: #495057af;
    width: 100%;
    height: 99vh;
    display: flex;
    align-items: center;
    justify-content: center;

  }

  .card.m {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  svg {
    font-size: 34rem;
  }

  .search{
    padding: 1pc 0pc;
    width: 100%;
    display: flex;
    justify-content: center;

  }
  input[type='search']{
    outline: none;
    width: 80%;
    border: transparent;
    padding: 5px 10px;
    margin: 0em  1em
    /* border-radius: 30px; */

  }
  .radius {
    border-radius: 50px;
  }
  .btn-search{
    border-radius: 50px;
    padding: 10px 40px; 
  }
  .btn-primary:hover{
    background: white;
    color: blue;
  }
</style>

<body class="bg-primary">
  <div class="container-fluid bg-primary">


    <?php
        $sql = mysqli_query($conn,"SELECT *FROM student ");
        $count = mysqli_num_rows($sql);
        $pay = mysqli_query($conn,"SELECT Sum(payment) as amount from student ");
        $payAns = mysqli_fetch_assoc($pay);
    ?>



      <div class="search  justify-content-evenly sticky-top">
      <form class="d-flex col-5 bg-white p-1 radius  justify-content-between" action="" method="POST">
              <input class=" " type="search" name="search" placeholder="Search Member"
                aria-label="Search">
              <input class="btn btn-search btn-primary " type="submit" name="submit" value="Search">
            </form>
      </div>

     
      
        <?php  

if(isset($_POST['submit'])){
  $search =mysqli_real_escape_string($conn,$_POST['search']);
  $sql = "SELECT  * FROM student where   First_name  LIKE '%$search%' or  Last_name  LIKE '%$search%'  or class like '%$search%' ";
  $res = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($res);
  
  if(empty($search)){
    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div>Please Fill The Search Field to Find Records</div>
  </div>";
  die();
  }
  if( $count > 0){
    echo "
    <div class='alert alert-success d-flex align-items-center' role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
      <div>
       Member on Your Search \"$search\"
      </div>
    </div>";


    echo " <table class='table table-dark table-striped px-2'>
    <tr class=' text-center fs-5 col'>
     <th >Result</th> </tr>

    <tr class=' fs-5 w-4 '>
      <th>No</th>
      <th>Names</th>
      <th colspan='2' class='text-center border'>Phone</th>
      <th>Payment</th>
      <th>Class</th>
      <th>Action</th>
    </tr>
";
  
    $n =1;
    while($row = mysqli_fetch_assoc($res)){
      
     
     echo "<tr><td>".$n."</td><td>".$row['First_name']." ".$row['Last_name']."</td><td>".$row['phone']."</td>
     <td>".$row['phone1']."</td><td>".$row['payment']."</td><td>".$row['class']."</td><td>
            <a href='payStudent.php?id=".$row['No']."&class=".$row['class']."' class='btn btn-success'>Pay</a>
            <a href='updateStudent.php?id=".$row['No']."&class=".$row['class']."' class='btn btn-primary'>Update</a>
            <a href='leavestudent.php?id=".$row['No']."&class=".$row['class']."' class='btn btn-danger'>Delete</a>
          </td></tr>";
      
    $n++;
  }
  }else{
    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div>No Member Found on Your Search \"$search\"</div>
  </div>";
  die();
  }
  }




?>

      </table>


</body>

</html>
<?php include("./partials/footer.php");  ?>

