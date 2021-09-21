<?php
//include constants file
include('../config/constants.php');

//echo "Delete Page";
//check whether the id value is set or not

if(isset($_GET['id'])){
    //get the value and delete
   // echo "Get Value and delete";
   $id = $_GET['id'];

   //delete data from database
   //sql query to delete data from database
   $sql = "DELETE FROM tbl_category WHERE id=$id";

   //execute the query
   $res =mysqli_query($conn, $sql);

   // check whether the data is deleted from database or not
   if($res==true){
       //set success message and redirect
       $_SESSION['delete'] = "<div class='success'>Category Deleted Successfully .</div>";
       //redirect to manage category
       header('location:'.SITEURL.'admin/manage-category.php');
   }
   else{
       //set fail message and redirect
       $_SESSION['delete'] = "<div class='error'>Failed to Delete Category.</div>";
       //redirect to manage category
       header('location:'.SITEURL.'admin/manage-category.php');
   }
}

else{
    //redirect to manage category page
    header('location:'.SITEURL.'admin/manage-category.php');

}
?>