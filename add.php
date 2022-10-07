
<?php
include 'data.php';

    if(isset($_POST['submit'])){
        $band_name = $_POST['band_name'];
        $bio = $_POST['bio'];
        $discography = $_POST['discography'];
        $image = $_POST['image'];      
        
 // On ajoute une entrée dans la table girls_rock
    $req = $bdd->prepare("INSERT INTO girls_rock (band_name, bio, discography, image) VALUES ('$band_name','$bio', '$discography', '$image')");

    $req->execute();

    // header("location: index.php");
    }

include 'head.php';
include 'navbar.php';
?>
    <main class="container">
        <h2>Super!</h2>
        <br>
        <p>L'entrée à bien été ajouté !</p>
        <br>
        <a href="articles_list.php" class="btn btn-danger">Voir tous les articles</a>
    </main>

<?php include 'footer.php'; ?>
</body>
</html>

