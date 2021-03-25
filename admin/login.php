<?php include('config/constants.php'); ?>

<html>
    <head>
        <title>Login - Food Order System</title>
        <link rel="stylesheet" href="css/styl.css">
    </head>

    <body>
    <div class="logn">
        
            <h1 class="text-center">Login</h1>
            <br><br>

            <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
            <br><br>

            <!-- 
                Le formulaire de connexion commence HEre -->
          
            <form  action="" method="POST" class="text-center">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
            <br><br>
            </form>
            <!-- Le formulaire de connexion se termine HEre -->

        
        </div>

    </body>
</html>

<?php 

    //Vérifiez si le bouton Soumettre est cliqué ou NON

    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. 
// Obtenez les données du formulaire de connexion
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. 
// SQL pour vérifier si l'utilisateur avec le nom d'utilisateur et le mot de passe existe ou non
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. 
// COunt des lignes pour vérifier si l'utilisateur existe ou non
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //
// Utilisateur disponible et connexion réussie
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //
// Rediriger vers la page / tableau de bord HOme
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //
// Utilisateur non disponible et échec de connexion
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
//             //
// Rediriger vers la page / tableau de bord HOme
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>