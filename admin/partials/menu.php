
<style>
    .added{
    color:green;
}

.fail{
    color:red;
}
.success{
    color:green;
}

.error{
    color:red;
}

.btn-secondary{
  background-color:#7bed9f;
  padding: 1%;
  color:black;
  text-decoration: none;
  font-weight:bold;
}
.btn-secondary:hover{
  background-color:#2ed573;

}
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
</style>
<?php
include('../config/constants.php');

include('login-check.php');
?>



<html lang="en">
<head>
    
    <title>Food Oder Website -HomePage</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Menu sections starts-->
    <div class="menu"> 
        <div class="wrapper">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin </a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        </div>
    
    </div>
     <!-- Menu sections ends-->