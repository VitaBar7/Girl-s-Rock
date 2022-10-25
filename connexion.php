<?php
session_start();
include('data.php');

                                                                                                                                                                                                                                                          
if(isset($_POST['submit'])) { 
    $pseudo = $_POST['name'];
    $email = $_POST["email"];
    $password = $_POST['password'];


    $reponse = $bdd->query("SELECT * FROM `users` WHERE `name` LIKE '$pseudo' AND `email` LIKE '$email' AND `password` LIKE '$password'");
    if($donnees = $reponse->fetch()) {
        echo "Login réussi!";
        header("location:articles_list.php");
    }else{
        echo "L'authentification n'a pas réussi";
    }
}
?>

<?php include 'head.php'; ?>
<?php include 'navbar.php'; ?>
<section style="padding:150px"> <!--formulaire authentification des admins-->
    <form id="connect" action="connexion.php" method="post">
        <h2>Formulaire d'authentification</h2>
        <div>
            <!-- <label for="name">Pseudo</label> -->
            <input type="text" name="name" id="name" placeholder="Entrez votre pseudo">
        </div>
        <div>
            <!-- <label for="email">Email</label> -->
            <input type="email" name="email" id="email" placeholder="Entrez votre email">
        </div>
        <div>
            <!-- <label for="password">Mot de passe</label> -->
            <input type="password" name="password" id="password" placeholder="Entrez le mot de passe">
        </div>
        <button class="button btn-danger save" type="submit" name="submit">Valider</button>
    </form>
</section>
