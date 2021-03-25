


<?php include('partials/menu.php');  ?>
    <!-- menu Content section start -->
    <div class="main-content wrapper">
     <div class="wrapper"> 
     <h1>Dashboard</h1>
                <br><br>
                <?php 
                    if(isset($_SESSION['login']))
                    {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>
                <br><br>

                <div class="col-4 text-center">

                    <?php 
                        //Sql Query 
                        $sql = "SELECT * FROM tbl_category";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count Rows
                        $count = mysqli_num_rows($res);
                    ?>

                    <h1><?php echo $count; ?></h1>
                    <br />
                    Categories
                </div>

      
     </div>
   
             
     </div>
  <!-- menu Content section start -->
  <?php include('partials/footer.php'); ?>
 