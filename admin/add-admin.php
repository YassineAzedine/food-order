<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>

     

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
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

<?php include('partials/footer.php'); ?>


<?php 
    //Traitez la valeur du formulaire et enregistrez-la dans la base de données

    //Vérifiez si le bouton d'envoi est cliqué ou non

    if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Button Clicked";

        //1.Obtenez les données du formulaire
        $full_name = ($_POST['full_name']);
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Chiffrement de mot de passe avec MD5
        
        //2. Requête SQL pour enregistrer les données dans la base de données
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password'
        ";
          //3. Exécution de la requête et enregistrement des données dans la base de données
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        
           //4. Vérifiez si les données (La requête est exécutée) sont insérées ou non et affichez le message approprié
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Créer une variable de session pour afficher le message
            $_SESSION['add '] = "Admin Added Successfully.";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'admin/manager-admin.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/add-admin.php');
        }

    }

    
?>
  
  
  
  
  
  
  