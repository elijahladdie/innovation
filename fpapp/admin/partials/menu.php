<?php

include('./configs/constant.php'); 
include('login-check.php'); 


?>

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="icon" href="./img/sfms.png" >
<svg xmlns="http://www.w3.org/2000/svg" style="display: none">
      
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>

      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 py-3">
      <div class="container-fluid">
     
        
        
        <div class="collapse navbar-collapse" id="navbarScroll">
          
          <ul class="navbar-nav me-auto  my-lg-0 navbar-nav-scroll">
          <li class=" fs-5 bg-dark text-white px-5 text-center py-1 ">
                    <span id="hh">11</span> :
                    <span id="mm">11</span> :
                    <span id="ss">11</span>

                </li>
          </ul>

          <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
            style="--bs-scroll-height: 100px">
            
            <li class="nav-item nav-tabs">
               <a href="./index.php" class="nav-link">Home</a>
            </li>
            
            <li class="nav-item nav-tabs">
               <a href="./manageAmount.php" class="nav-link"> Manage</a>
            </li>
            <li class="nav-item nav-tabs">
               <a href="./absentStudent.php" class="nav-link">Inactive</a>
            </li>
            <li class="nav-item nav-tabs">
               <a href="./account.php" class="nav-link">Profile</a>
            </li>
         
           
             </li>
            <li class="nav-item nav-tabs">
                <a href="./portal/logout.php" class="nav-link">logout</a> 
             </li>
            
                <script type="text/javascript" src="./js/time.js"></script>
           
          <ul>         
        </div>
      </div>
    </nav>
