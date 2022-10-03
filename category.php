<?php 
session_start();
include 'data.php'; 


        if(isset($_GET['category'])){
            $categorie = $_GET['category'];
        }else{
            $categorie = "";
        }

        $reponse = $bdd->query("SELECT * FROM girls_rock WHERE category='$categorie'");

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'navbar.php'; ?>

<div class="header fixed-bg">
    <h1 class="ml-3">Girls Rock !</h1>
</div>
<div class="container">
    <h2 class="ml-3 white-bg "><h2>Notre sélection de femmes <?php echo $categorie;?> :</h2>
    <div class="row container-fluid cards-bg">
        <?php   
            while ($donnees = $reponse->fetch()) {
                $text = nl2br($donnees['bio']);
                $text = substr($text, 0, 280);
                $text = $text.'...';  
                ?>
                    <div class ="col-md-6 col-sm-12 py-2">
                    <div class="card m-5 shadow" style="width: 24rem;">
                            <img src="<?php echo $donnees['image']; ?>" class="card-img-top img-size" alt="<?php echo $donnees['band_name']; ?>'s picture">
                            <div class="card-body">
                                <h1 class="card-title fs-2"><?php echo $donnees['band_name']; ?></h1>
                                <p class="card-text card-index fs-6"><?php echo $text; ?></p>
                                <a href="article.php?id=<?php echo $donnees['id'];?>" class="btn btn-danger">Lire la suite</a>
                            </div>
                        </div>
                    </div>
                
            <?php } ?>
        <?='</div>'; ?>  <!-- row -->
</div>
    
<?php include 'footer.php'; ?>    
</body>
</html>