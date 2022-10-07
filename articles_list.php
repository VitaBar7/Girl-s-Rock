<?php 
include 'data.php';
include 'head.php';
include 'navbar.php';
?>
    <div class="container">
        <?php
        $reponse = $bdd->query("SELECT * FROM `girls_rock`");
        ?>
            <div class="tab-mar">
                <h1 class="title">Tous les articles</h1>
                <table class="table table-bordered">
                        <tr>
                            <th>id</th><th>Band</th><th>Bio</th><th>Discographie</th><th>Image</th>
                        </tr>
            <?php
            while($donnees = $reponse->fetch()){
            $text = nl2br($donnees['bio']);
            $text = substr($text, 0, 200);
            $text = $text.'...';
            $discog = nl2br($donnees['discography']);
            $discog = substr($discog, 0, 100);
            $discog = $discog.'...';
                echo '<tr>';
                echo '<td>'.$donnees['id'].'</td>';
                echo '<td>'.$donnees['band_name'].'</td>';
                echo '<td>'.$text.'</td>';
                echo '<td>'.$discog.'</td>';
                echo '<td><img class="img-xs" src="'.$donnees['image'].'" alt="'.$donnees['band_name'].'" width="100px" height="auto"></td>';
                echo '<td><a class="btn button" href="modify.php?id='.$donnees['id'].'">Modifier</a></td>';
                echo '<td><a class="btn button" href="delete.php?id='.$donnees['id'].'">Supprimer</a></td>';
                echo '</tr>';
            }
            ?>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="form.php" class="btn btn-danger button">Ajout + article</a>
                </div>
                <div class="col-md-6">
                    <a href="index.php" class="btn btn-danger button">Retour</a>
                </div>
            </div>
        
    </div>
<?php include 'footer.php'; ?> 
</body>
</html>