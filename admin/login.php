<?php
include('../config/constants.php');

?>


<style>
    .login{
    width:30%;
    border: 1px solid grey;
    margin:10% auto;
    padding:2%;
}
.text-center{
    text-align:center;
}
.btn-primary{
    background-color: blue;
    color:white;
    width:27%;
    font-size:150%;
}
input{
    width:60%;
    height:6%;
    text-align:center;




}

.sucesss{
    color:green;
  }
  
  .error{
    color:red;
  }
</style>




<html>

<head>
     <title>
         Login - Food Ordering System
     </title>
     <link  rel="stylesheet" href="../css/admin.css">
</head>

    <body>

        <div class="login">
            <h1 class="text-center">Login</h1><br> <br>
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message'])){
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }

            ?>
            <br> <br>

            <!--Login Form Starts here -->
            <form action="" method="POST" class="text-center">
                Username:<br>
                <input type="text" name="username" placeholder="Enter User Name"> <br> <br>

                Password:<br>
                <input type="password" name="password" placeholder="Enter Password"> <br> <br>

                <input type="submit" name="submit" value="Login" class="btn-primary"><br> <br>
            </form>

             <!--Login Form Ends here -->

            <p class="text-center">
                Created By <a href="#">Bakary Jobe</a>
            </p>

        </div>

    </body>

</html>
<?php
//check whether teh submit button clicked or not
if(isset($_POST['submit']))
{
//process for login

//1. Get the data from login form 
 $username=$_POST['username'];
 $password=md5($_POST['password']);

 //2.Sql to Check whether the username and password exists or not
 $sql ="SELECT * FROM tbl_admin  WHERE username='$username' AND password='$password'";

 //3. Execute the query 
 $res = mysqli_query($conn,$sql);

 //4. Count rows whether the user exist or not

 $count = mysqli_num_rows($res);

 if($count==1)
 {
     //user available and login success

     $_SESSION['login']="<div class='success'>Login Successful.</div>";

     $_SESSION['user']=$username;//To check whether the user is logged in or not and logout will unset it

     //after login sucessful then redirect to Home page/Dashboard
     header('location:'.SITEURL.'admin/');

 }
 else{
     //user not available and login fail
     $_SESSION['login']="<div class='error text-center'>Username or Password did not match.</div>";

     //after login sucessful then redirect to Home page/Dashboard
     header('location:'.SITEURL.'admin/login.php');
  }

}

?>