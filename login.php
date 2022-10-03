<?php
include('connexion.php');
include('header.php');



//if user is already member, verify with database and send him to personnalized homepage via the ID
if(isset($_POST['connection'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $okbdd = $connect->query("SELECT * FROM users WHERE email = '$email' AND password= '$password'");
 

    if($resultat = $okbdd->fetch()) {
        echo "Login OK";
        session_start();
        $_SESSION["email"] = $resultat['email'];
        $_SESSION["password"] =$resultat['password'];
        $_SESSION["id"] = $resultat['id'];
        $_SESSION["firstName"] = $resultat['firstName'];
        //je veux rediriger avec le ID pour avoir une page personnalisée
        // $url = "loginCRUD.php?id=".$resultat['id']; 
        $url = "loginCRUD.php?id=".$_SESSION["id"]; 
        header("location: $url");
        

    } else {
        echo 'script type = "text/javascript">';
        echo 'alert(Votre email et/ou mot de passe est incorrect")';
        echo 'window.location.href = "login.php"';
        echo '</script>';
    }
}

//user is signing up, 1. create account in database and 2. check with database and send him to personalized homepage via the ID
if(isset($_POST['firstName1']) && 
isset($_POST['lastName1']) && 
isset($_POST['email1']) && 
isset($_POST['password1'])) {
  
    $email = $_POST['email1'];

    $addUser = $connect->prepare("INSERT INTO visiteur (firstName, lastName, email, password) VALUES (:firstName1, :lastName1, :email1, :password1)");
    $addUser->execute(array(
        'firstName1' => $_POST['firstName1'], 
        'lastName1' => $_POST['lastName1'],
        'email1' => $_POST['email1'],
        'password1' => $_POST['password1']));
    
    if($addUser) {
        echo "OK connect";
        $okcreation = $connect->query("SELECT * FROM visiteur WHERE email = '$email'");
        if($newuser = $okcreation->fetch()) {
        session_start();

        header("location: loginCRUD.php?id=".$newuser['id']);
        }
        // Je veux recupérer l'ID pour avoir une page personnalisée

    } else {
        echo "NOT SIGNED UP";
    }
}

?>

<section class="login-bg">
    <div class="radio">
        <h3 class="titre">Je veux</h3>
                <input type="radio" name="user" value="login" id="loginBtn" checked />
                <label for="login">me connecter</label>
                <input type="radio" name="user" value="signup" id="signupBtn" />
                <label for="signup">m'inscrire</label>
    </div>
    <div class="">
        <form action="login.php" method="POST" id="login">
            <fieldset>
                <legend>Merci de vous identifier</legend>
                <input type="text" name="id" id="id" hidden />
                <input type="text" name="firstName" id="firstName" hidden />
                <div class="col-md-6 line">
                    <label for="email" class="label">Votre email</label>
                    <input type="email" name="email" id="email" autofocus>
                </div>
                <div class="col-md-6 line">
                <label for="password" class="label">Votre mot de passe</label>
                <input type="password" name="password" id="password">
                </div>
                <input type="submit" value="connection" name="connection">
            </fieldset>
        </form>
    </div>
    <div class="row">
        <form action="login.php" method="POST" id="signup">
            <fieldset> 
                    <legend>Merci de créer un compte</legend>
                    <input type="text" name="id" id="id" hidden />
                    <div class="col-md-6 line">
                        <label for="firstName1" class="label">Votre prénom</label>
                        <input type="text" name="firstName1" id="firstName1" required autofocus>
                    </div>
                    <div class="col-md-6 line">
                        <label for="lastName1" class="label">Votre nom de famille</label>
                        <input type="text" name="lastName1" id="lastName1" required>
                    </div>
                    <div class="col-md-6 line">
                        <label for="email1" class="label">Votre email</label>
                        <input type="email" name="email1" id="email" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password1" class="label">Votre mot de passe</label>
                        <input type="password" minlength="5" maxlength="10" name="password1" id="password1" required>
                    <div id="passwordHelpBlock" class="form-text">Votre mot de passe doit être entre 5 à 10 charactères.</div>
                    <input type="submit" value="s'inscrire" name="signup">
                    </div>
            </fieldset>
        </form>
    </div>
   
</section>
<script type="text/javascript" src="Javascript/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="Javascript/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#login").validate(); //ajouter les rules
            $("#signup").validate();
        });
        

<?php
include('footer.php');
?>