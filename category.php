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
<nav class="navbar sticky-top navbar-expand-lg navbar-light nav_txt" style="background-color: rgba(23, 217, 136, 0.7);">
  <a class="navbar-brand" href="index.php"><img src="https://images.squarespace-cdn.com/content/v1/55240ca5e4b0ef65b027bcb8/1515442927108-1PC9EDB8U31MHWYZW52L/Girls+Rock+Lab_Page_1.png?format=750w" alt="girls rock logo" class="rounded mx-3" height="80" width="auto"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav nav-menu">
      <a class="nav-item nav-link active" href="index.php">Home</a>
      <a class="nav-item nav-link" href="pepites.php">Les articles</a>
      <a class="nav-item nav-link" href="category.php?category=oldies">Oldies</a>
      <a class="nav-item nav-link" href="category.php?category=solo">Solo girls</a>
    </div>
  </div>
</nav>

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