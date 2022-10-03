<?php
session_start();
include 'data.php';

$id="";

if(isset($_GET['id'])){ 
    $id = $_GET['id']; 
$reponse = $bdd->query("SELECT * FROM girls_rock WHERE id=$id");    
$donnees = $reponse->fetch();
    
$text = nl2br($donnees['bio']);
$discog = nl2br($donnees['discography']);
   
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'navbar.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="<?php echo $donnees['image']; ?>" class="card-img-top img-size" alt="...">
                <h1><?php echo $donnees['band_name']; ?></h1>
                <p><?php echo $text; ?></p>
                <br>
                <h3 class="article">Albums:</h3>
                <br>
                <p><?php echo $discog; ?></p>
                <br>
                <h3 class="article">Vidéo:</h3>
                <br>
                <div><?php echo $donnees['video']; ?></div>
            </div>
        </div>
    </div>
    <div class="container row centered">
        <div class="col-6">
            <a href="modify.php?id=<?php echo $donnees['id'];?>" class="btn btn-danger button">Edition</a>
        </div>
        <div class="col-6">
            <a href="articles_list.php" class="btn btn-danger button">voir la liste</a>
        </div>
    </div>
    
    <?php } ?>

    <?php include 'footer.php'; ?>
</body>
</html>