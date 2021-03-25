<?php include('constant.php')  ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stl.css">
    <title>Restaurent Youcode</title>
</head>

<body>
    <!-- NavBar section star here  -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <!-- <img src="images/youcode_logo.png" alt="Resturent Logo" class="img"> -->
            </div>
            <div class="menu text-right">
                <ul>
                    <li> <a href="http://127.0.0.1:5500/home.html">Home</a> </li>
                    <li> <a href="http://127.0.0.1:5500/index.html">Foods</a> </li>
                    <li> <a href="  http://127.0.0.1:5500/categories.html">Categorie</a> </li>
                  
                    <li> <a href="#">Contact</a> </li>
                    <li> <a class="login" href="http://localhost/food-ORDER%20WEBSITE/admin/login.php">Login</a> </li>

                </ul>
            </div>
            <div class="clearfix"></div>

        </div>

    </section>

    <section class="categories">
        <div class="container">
            <h2 class="text-center">categories</h2>
            <div class="clearfix"></div>
            <?php 
            

//Display all the cateories that are active
//Sql Query
$sql = "SELECT * FROM tbl_category WHERE active='Yes'";

//Execute the Query
$res = mysqli_query($conn, $sql);

//Count Rows
$count = mysqli_num_rows($res);

//CHeck whether categories available or not
if($count>0)
{
    //CAtegories Available
    while($row=mysqli_fetch_assoc($res))
    {
        //Get the Values
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['images_name'];
        ?>
        
        <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
            <div class="box-3 float-container">
                <?php 
                    if($image_name=="")
                    {
                        //Image not Available
                        echo "<div class='error'>Image not found.</div>";
                    }
                    else
                    {
                        //Image Available
                        ?>
                        <img src="<?php echo SITEURL; ?>category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php
                    }
                ?>
                

                <h3 class="float-text text-white"><?php echo $title; ?></h3>
            </div>
        </a>

        <?php
    }
}
else
{
    //CAtegories Not Available
    echo "<div class='error'>Category not found.</div>";
}

?>
 
    </section>
   
    <section class="social">
        <div class="container text-center">
            <ul>
                <li>
                    <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/facebook.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/instagram-new.png" /></a>
                </li>
                <li>
                    <a href="#"><img src="https://img.icons8.com/cute-clipart/64/000000/twitter.png" /></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- footer section starts here -->

    <section class="footer">
        <div class="container text-center">
            <p>Restaurant  By <a href="">Yassine Azedine</a></p>
        </div>
    </section>
    <!-- footer section starts here -->
    

</body>
</html>