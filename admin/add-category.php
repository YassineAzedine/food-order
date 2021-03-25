<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>

        <br><br>

        <?php 
        
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        
        ?>

        <br><br>

        <!--  Ajouter CAtegory Form Starts-->
        <form action="" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes"> Yes 
                        <input type="radio" name="featured" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes 
                        <input type="radio" name="active" value="No"> No 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- Ajouter CAtegory Form end -->





  <!-- star php -->
        <?php 
        
            //
      // Vérifier si le bouton Soumettre est cliqué ou non
            if(isset($_POST['submit']))
            {
                //echo "Clicked";

                //1. obtenez la valeur de category form
                $title = $_POST['title'];

                //Pour l'entrée radio, nous devons vérifier si le bouton est sélectionné ou non
                if(isset($_POST['featured']))
                {
                    // obtenir la valeur a partir du formailaire

                    $featured = $_POST['featured'];
                }
                else
                {
                    //SEt the Default VAlue
                    $featured = "No";
                }

                if(isset($_POST['active']))
                {
                    $active = $_POST['active'];
                }
                else
                {
                    $active = "No";
                }

                //Check whether the image is selected or not and set the value for image name accoridingly
                // print_r($_FILES['image']);

                //die();//Break the Code Here

                if(isset($_FILES['image']['name']))
                {
                    //Upload the Image
                
                      // Pour télécharger l'image, nous avons besoin du nom de l'image, du chemin source et du chemin de destination
                    $image_name = $_FILES['image']['name'];
                    
                    // Téléchargez l'image uniquement si l'image est sélectionnée
                    if($image_name != "")
                    {

                        
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "images/" . $image_name;

                        //Enfin, téléchargez l'image
                        $upload = move_uploaded_file($source_path, $destination_path);

                      
                        // Vérifiez si l'image est téléchargée ou non
                         //
                        // Et si l'image n'est pas téléchargée, nous arrêtons le processus et la redirigerons avec un message d'erreur
                        //
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:'.SITEURL.'admin/add-category.php');
                            //STop the Process
                            die();
                        }

                    }
                }
                else
                {
                    //Don't Upload Image and set the image_name value as blank
                    $image_name="";
                }

                //2. Créer une requête SQL pour insérer CAtegory dans la base de données
                $sql = "INSERT INTO tbl_category SET 
                    title='$title',
                    images_name='$image_name',
                    featured='$featured',
                    active='$active'
                ";

                //3. Execute the Query and Save in Database
                $res = mysqli_query($conn, $sql);

                //4. Vérifiez si la requête a été exécutée ou non et les données ajoutées ou non
                if($res==true)
                {
                    //Requête exécutée et catégorie ajoutée
                    $_SESSION['add'] = "<div class='success'>Category Added Successfully.</div>";
                    // Redirection vers la page de gestion des catégories

                    header('location:'.SITEURL.'admin/manager-category.php');
                }
                else
                {
                    // Échec de l'ajout de CAtegory
                       
                    
                    $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                    
                                   
                    //    Redirection vers la page de gestion des catégories


                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }
        
        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>