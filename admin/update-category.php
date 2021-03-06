<?php
 include('partials/menu.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>
            Update Category

        </h1>


        <br> <br>

        <?php

          //check whether the id is set or not
          if(isset($_GET['id'])){

            // get the ID and all other detail
            //echo "getting the data";
            $id =$_GET['id'];
            //create sql query to get all other detail
            $sql = "SELECT * FROM tbl_category WHERE id=$id";

            //execute the query
            $res  = mysqli_query($conn,$sql);

            //count the rows to check whether the id is added or not
            $count =mysqli_num_rows($res);

            if($count==1){
                //Get all the data 
                $row = mysqli_fetch_assoc($res);
                $current_image=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active'];

            }
            else{
                //redirect to manage category with session message
                
                $_SESSION['no-category-found'] ="<div class='error'>Category not found </div>";
            
                header('location:'.SITEURL.'admin/manage-category.php');
            }
          }

          else{
              //redirect to manage categoery
              header('location:'.SITEURL.'admin/manage-category.php');
          }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td><input type="text" name="title" value="<?php echo $title;?>"></td>

            </tr>

            <tr>
                <td>
                    Current Image:
                </td>
                <td>
                    <?php
                            if($current_image !=""){
                                //display the image
                                ?>

                                <img src="<?php  echo SITEURL; ?>images/category/<?php echo $current_image;?>" width="150px" >

                                <?php


                            }
                            else{
                                //display message
                                echo "<div class='error'> Image not Added.</div>";
                            }
                           ?>
                </td>

            </tr>

            <tr>
                <td>
                    New Image:
                </td>

                <td>
                <input type="file" name="image">
                </td>
            </tr>

            <tr>
                <td>
                    Featured:
                </td>
                <td>
                    <input <?php if($featured=="Yes"){echo "Checked";}?>   type="radio"  name="featured" value="Yes">Yes

                    <input <?php if($featured=="No"){echo "Checked";}?> type="radio"  name="featured" value="No">No
                </td>


            </tr>

            <tr>
                <td>
                    Active:
                </td>
                <td>
                    <input <?php if($active=="Yes"){echo "Checked";}?>  type="radio"  name="active" value="Yes">Yes
                    <input <?php if($active=="No"){echo "Checked";}?>  type="radio"  name="active" value="No">No
                </td>
            </tr>

            <tr>
                <td>
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name ="id" value ="<?php echo $id; ?>">


                <input type="submit" name="submit" value="Update Category" class="btn-secondary">
                </td>
            </tr>

        </table>

        </form>

        <?php
                if(isset($_POST['submit']))
                {
                    //echo "Clicked";
                    //1. Get all the values from our form
                    $id = $_POST['id'];
                    $title = $_POST['title'];
                    $current_image=$_POST['current_image'];
                    $featured = $_POST['featured'];
                    $active = $_POST['active'];

                    //2.Updating new image if selected
                    //  check whether image is selected or not
            /*        if(isset($_FILES['image']['name']))
                    {
                        //get the image details 
                        $image_name=$_FILES['image']['name'];

                        //check whther the image is availble or not 
                        if($image_name !=""){
                            //image available

                             //Rename the image
                                $image_name ="$image_name";

                            //upload the new image
                            $source_path=$_FILES['image']['tmp_name'];

                            $destination_path= '../images/category/'.$image_name;
      
                             //finally upload the image
                            $upload = move_uploaded_file($source_path, $destination_path);
      
                            // echo "upload";
      
                             //check whether the image is uploaded or not 
                             //and if not uploaded the stop the process and redirect with error message
                           if($upload==false)
                           {
                                 //set message
                             $_SESSION['upload'] = "<div class='error'>Failed to upload image.</div>";
      
                                 //Redirect to add category page
                             header('location:' .SITEURL. 'admin/manage-category.php');
      
                                 //stop the process
                           die();
                         }

                            //remove the current image if available 
                            if($image_name !="")
                            {
                                $remove_path="../images/category/".$image_name;

                                $remove =unlink($remove_path);
    
                                //check whether the image is remove or not
    
                                //if fail to remove then display messageand stop the process
    
                                if($remove==false)
                                {
                                    //fail to remove image
                                    $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image.</div>";
                                    header('location:' .SITEURL. 'admin/manage-category.php');
                                    die(); //stop the process
                                }

                            }
                            

                        }
                        else{
                            $image_name=$current_image;
                        }
                    }
                    else
                    {
                        $image_name=$current_image;
                    }
        */
                    //3.Update the database
                    $sql2 ="UPDATE tbl_category SET 
                    title ='$title',
               
                    featured ='$featured',
                    active ='$active'
                    WHERE id=$id";

                    //execute the query
                    $res2=mysqli_query($conn, $sql2);


                    
                    //4.redirect to  manage category with message
                    //check whether query executed or not
                    if($res2==true)
                    {
                        //category update
                        $_SESSION['update']="<div class='success'>Category Updated Successfully. </div>";
                        header('location:' .SITEURL.'admin/manage-category.php');
                    }
                    else{
                        //failed to category
                        $_SESSION['update']="<div class='error'>Failed to Update Category. </div>";
                        header('location:' .SITEURL.'admin/manage-category.php');

                    }
                    
                }
        ?>
    </div>
</div>

<?php
 include('partials/footer.php');
?>

