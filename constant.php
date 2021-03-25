<?php
  //start sission
  session_start();

// créer des constantes pour stocker des valeurs non répétitives
define('SITEURL','http://localhost/food-ORDER%20WEBSITE/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');




// database connexion
       $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error()); 
    //    selecting database
       $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());  


       if($conn){
          echo "connected";
       }
         else{
            echo"eror";
         }



 

?>

