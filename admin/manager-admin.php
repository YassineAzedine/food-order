<?php include('partials/menu.php');  ?>

    <!-- menu Content section start -->
    <div class="main-content wrapper">
         <div class="wrapper">
              <h1>Manage Admin</h1>
              <br>
              <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                //Remove Session Message
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            
        ?>
              <!-- btn to add admin -->
              <a href="add-admin.php"class = "btn-primary ">Add Admin</a>
              <br><br><br>
         <table style="width:80%" class="tbl-full">
         <tr>
         <th>I.D</th>

         <th>Full Name</th>
         <th>User name</th>
         <th>Actions</th>
         </tr>
<?php
// requête pour obtenir tous les administrateurs
   $sql = "SELECT * FROM tbl_admin";
  //  execute the query
  $res =mysqli_query($conn,$sql);
    // check whether the query is executed of not

    if($res == TRUE)
    {
      // count rows to check whether we have date in database or not 
      $count = mysqli_num_rows($res); //function to get all the rows in database 
      //check rhe num of rows

      $sn =1 ; //create a variables an assign the value 
      if($count>0){
       
        //we have data in datebase
        while($rows =mysqli_fetch_assoc($res))
        {
          // using while loop to get all the date from database
          // and while loop will run as long as we have data in database
          // get individual data 
          $id=$rows['id'];
          $full_name=$rows['full_name'];
          $username=$rows['username'];
          // display the values in our table


             ?>    
               

               <tr>
             <td><?php  echo $sn++;?></td>
             <td><?php echo $full_name;?></td>
             <td><?php echo $username;   ?></td>
             <td>
                <a href="<?php echo SITEURL ;?>admin/update-admin.php?id=<?php echo $id;?>"class="btn-secondery">Update Admin</a>
           

                 <a href="<?php  echo SITEURL;?>admin/delete-admin.php? id= <?php echo $id;?>" class='btn-danger'>Delete Admin</a>
             </td>
         
         
              </tr>


             <?php

        }
      }
    

     else{
     
      // we dont have data in datebase
    }


  }






?>










         
         
           </table>
     
     </div>   
           
           
    </div>
    <?php include('partials/footer.php'); ?>