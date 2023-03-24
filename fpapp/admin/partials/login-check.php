<?php
if(!isset($_SESSION['signed_in'])){
    $_SESSION["not_found"] = "<p class='text-danger text-center'>Please Log in to Access the system</p>";
    header("location:".URL."admin/portal/index.php");
}

?>