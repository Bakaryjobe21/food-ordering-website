<style>

</style>


<?php

//Include constants.php file here
 include ('../config/constants.php');

//1. gett the ID of the admin to be deleted
  echo $id =$_GET['id'];
//2. create SQL Query to delete Admin
$sql ="DELETE FROM tbl_admin WHERE id=$id";

//execute the query
$res = mysqli_query($conn,$sql);

// Check whether the query executed sucessfully or not

if($res==TRUE){
    //Query executed Successfully and admin deleted
   // echo "Admin Deleted";

   //create session variable to display message
$_SESSION['delete']= "<div class='sucesss' color='green'>Admin Deleted Successfully.</div>";

//Redirect to Manage admin page
header('location:'.SITEURL.'admin/manage-admin.php');

}

else{
    //fail to delete admin
   // echo "Fail To Delete Admin";

   $_SESSION['delete']="<div class='error'>Fail to Delete Admin Try Again Later</div>";


   header('location:'.SITEURL.'admin/manage-admin.php');

}

//3. Redirect to manage Admin page with message (success or error)
?>