<?php
include('partials/menu.php');
?>


<style>
    .tbl-30{
        width:30%;
    }
    .btn-secondary{
  background-color:#7bed9f;
  padding: 1%;
  color:black;
  text-decoration: none;
  font-weight:bold;
}

table ,tr ,th {
    
    padding: 1%;
    text-align: left;
}

table ,tr td{
    padding: 1%;
}
.btn-secondary:hover{
  background-color:#2ed573;
}


</style>



<div class="main-content"> 

<div class="wrapper">
<h1>
    Add Admin
</h1>
<br>

<?php
if(isset($_SESSION['add'])) //checking whether the session is set or not
{
    echo $_SESSION['add']; //Display session message if set
    unset($_SESSION['add']);//remove session message
}
?>

<form action="" method="POST">
<table class="tbl-30">
    <tr>
        <td>Full Name:</td>
        <td><input type="text" name="full_name" placeholder="Enter your name"></td>
    </tr>

    <tr>
        <td>Username:</td>
        <td>
            <input type="text" name="username" placeholder="Your Username">
        </td>
    </tr>
    <tr>
        <td>Password:</td>
        <td>
            <input type="password" name="password" placeholder="Your Password">
        </td>
    </tr>
    <tr>
        <td colspan="2">
<input type="submit" name="submit" value="Add Admin" class="btn-secondary">
        </td>
    </tr>
</table>
</form>
</div>

</div>


<?php
include('partials/footer.php');
?>


  <?php

//process the value from Form and save it in database

//check whether the submit button is clicked or not

if(isset($_POST['submit']))

{
    
    

    //  Button click
    //echo "Button Clicked";

    //1.get the data from form
    $full_name=$_POST['full_name'];
   $username=$_POST['username'];
   $password= md5($_POST['password']); //password encription with md5


    //2.sql query to save the data into database 

   $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
   username='$username',
   password='$password'
    ";

  

   //echo  $sql;

//executing query and saving data into database
 
 $res = mysqli_query($conn, $sql) or die (mysqli_error());
   //4. check whether the (query is executed or not )data is inserted or not and display appropriate message

    if($res==TRUE)
      {
       //data inserted
     // echo "Data inserted";

     $_SESSION['add'] = "<div class='added'>Admin Added Successfully </div>";

     //redirect page to manage admin
     header("location:".SITEURL.'admin/manage-admin.php');

          }

          else{
            
     $_SESSION['add'] = "<div class='fail'>Fail to Add Admin  </div>";

     //redirect page to add admin
     header("location:".SITEURL.'admin/add-admin.php');
   
      }


 }  




?>

