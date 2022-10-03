<?php
include 'data.php';
?>
<!-- Modification -->
 <?php
        if (isset($_POST['bandName']) && 
        isset($_POST['bio2']) && 
        isset($_POST['discog2']) && 
        isset($_POST['image2'])) {

        $post_id = $_POST['id'];
        $newBandname = $_POST['bandName'];
        $newBio = $_POST['bio2'];
        $newDiscog = $_POST['discog2'];
        $newImage = $_POST['image2'];
        
        $modif_article = $bdd->prepare("UPDATE girls_rock SET  
        band_name='$newBandname', 
        bio='$newBio', 
        discography='$newDiscog', 
        image='$newImage' WHERE id='$post_id'");


var_dump($modif_article);

        $modif_article->execute();
        
        header("location: article.php?id=$post_id");
        }

        //on récupère l'id dans l'url afin d'afficher les données dans le formulaire.
        $id = $_GET['id'];
        $info_article = $bdd->query('SELECT * FROM girls_rock WHERE id='.$id);
        while ($donnees =  $info_article->fetch())
        {
    ?>
    <!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>
<body>
<?php
include 'navbar.php';
?>

<div class="container">
    <form class="form-margin" action="modify.php" method="post" id="myForm2">
        <fieldset class="border rounded border-danger p-3">
            <legend>Formulaire de modification</legend><br/>
            <input type="text" name="id" value="<?php echo $donnees['id'];?>" hidden/>
            <div>
                <label for="band_name">Nom de la bande</label><br/>
                <input type="text" id="band_name" name="bandName" value="<?php echo $donnees['band_name'];?>">  
            </div>
            <div>
                <label for="bio">Biographie</label><br/>
                <textarea  type="text" id="bio" name="bio2" col="80" rows="2" class="adaptatifTextarea" oninput="updateTextareaHeight(this);"><?php echo $donnees['bio'];?></textarea>
            </div>
            <div>
                <label  for="discography">Discographie</label><br/>
                <textarea  type="text" id="discography" name="discog2" col="80" rows="2" class="adaptatifTextarea" oninput="updateTextareaHeight(this);"><?php echo $donnees['discography'];?></textarea>
            </div> 
            <div>
                <label for="image">Image URL</label><br/>
                <input  type="text" id="image" name="image2" value="<?php echo $donnees['image'];?>">
            <br/>         
            <div>
                <input class="rounded border-danger bg-danger my-3 submit button" type="submit" name="submit" value="Modifier">
            </div>
            <div class="row">  
                <div class="col-md-6">
                    <a href="article.php?id=<?php echo $donnees['id'];?>" class="btn btn-danger button">annuler</a>
                </div>
                <div class="col-md-6">
                    <a href="delete.php?id=<?php echo $donnees['id'];?>" class="btn btn-danger button">supprimer</a>
                </div>
            </div>
        </fieldset>
      </form>
</div>
<?php  } $info_article ->closeCursor(); 
?>

<?php
include 'footer.php';
?>
</body>
</html>
