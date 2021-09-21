
<?php
include('partials/menu.php');
?>

<style>
  table{
    width: 100%;
  }
  table ,tr ,th {
    border-bottom: 1px solid black;
    padding: 1%;
    text-align: left;
}

table ,tr td{
    padding: 1%;
}

.btn-primary{
  background-color:#1e90ff;
  padding: 1%;
  color:white;
  text-decoration: none;
  font-weight:bold;
}
.btn-primary:hover{
  background-color:#3742fa;
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

.btn-danger{
  background-color:#ff7f50;
  padding: 1%;
  color:white;
  text-decoration: none;
  font-weight:bold;
}
.btn-danger:hover{
  background-color:#ff6348;
}



</style>

    <!-- Main  content sections starts-->
    <div class="main-content"> 

        <div class="wrapper">
           <h1>
             Manage Admin
            </h1>
            <br> <br>

            <?php
              if(isset($_SESSION['add']))
              {
                  echo $_SESSION['add']; // displaying session message
                  unset($_SESSION['add']); //removing session message

              }

              if(isset($_SESSION['delete']))
              {

                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);

              }

              if(isset($_SESSION['update']))
              {
               echo $_SESSION['update'];
                unset($_SESSION['update']);
              }

              if(isset($_SESSION['user-not-found']))
              {
               echo $_SESSION['user-not-found'];
                unset($_SESSION['user-not-found']);
              }

              if(isset($_SESSION['password-not-match']))
              {
               echo $_SESSION['password-not-match'];
                unset($_SESSION['password-not-match']);
              }

              if(isset($_SESSION['change-password']))
              {
               echo $_SESSION['change-password'];
                unset($_SESSION['change-password']);
              }
            ?>

            <br> <br> <br>


            <!-- Button to add Admin-->
              <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br> <br> <br>


            <table >
                <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username </th>
                <th>Actions</th>
                </tr>
                

              
                <?php
                    // query getting all admin from database and display it on the table

                    $sql ="SELECT * FROM tbl_admin";

                    // Executing th query
                    $res = mysqli_query($conn, $sql);

                    //check whether the query is executed or not
                    if($res==TRUE)
                    {
                      // count rows to check whether we have data in database or not
                      $count =mysqli_num_rows($res); //function to get all the rows in database

                      $sn=1;  //create a variable and assign the value


                      //check the number of rows

                      if($count>0){
                        //means we have data in database
                        while($rows=mysqli_fetch_assoc($res))
                        {
                          //using while loop to get all the data from database
                          //add while loop willrun as long as we have data in database

                          //Get individual data
                          $id=$rows['id'];
                          $full_name=$rows['full_name'];
                          $username=$rows['username'];

                          //display the value in our table
                          ?>

                     <tr>
                       <td><?php echo $sn++ ?>.</td>
                      <td><?php  echo $full_name ?></td>
                      <td><?php  echo $username?></td>
                      <td>
                        <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                        <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                        <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                    
                    
                      </td>
                      </tr>

                          <?php

                        }
                      }
                      else{
                        //we do not have data in database
                      }
                    }
                ?>

                

                      
              </table>


    
        </div>
        
   
    </div>
    <!-- Main content sections ends-->


   <?php
   include('partials/footer.php');
   ?>