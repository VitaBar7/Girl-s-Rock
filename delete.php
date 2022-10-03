<?php
include 'data.php';

if (isset($_GET['id'])) {
    $id=$_GET['id'];

    
// On supprime une entrée dans la table liste_livres
    $del_article = $bdd->prepare("DELETE FROM girls_rock WHERE id= $id");
    $del_article->execute(array($id));
} else {
    echo "...";
}
?>
<!DOCTYPE html>
<?php
include 'head.php';
?>
<body>
<?php
include 'navbar.php';
?>
    <main class="container">
        <h2>C'est fait!</h2>
        <br>
        <p>L'entrée à bien été supprimé !</p>
        <br>
        <a href="articles_list.php" class="btn btn-danger button">Voir tous les articles</a>
    </main>

<?php include 'footer.php'; ?>
</body>
</html>