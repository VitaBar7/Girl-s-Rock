<?php
include 'head.php';
?>
<footer>
    <div class="container footer mt-3">
        <div class="row">
            <div class="col-md-6 ">
                <p>Copyright &copy; 2022 - AdaCodeless - All Rights Reserved.</p>
                <p>Photo de João  Jesus: <a href="https://www.pexels.com/fr-fr/photo/silhouette-d-herbe-sous-ciel-blanc-925743/">Pexels</a></p>
            </div>
            <div class="col-6">
                <a href="connexion.php" class="btn btn-danger button admin is-hidden ">Admin</a>
                <!-- <button class="signin-btn is-hidden">Log in </button>
                <button class="signout-btn">Log out </button> -->

            </div>
        </div>
    </div>
</footer>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> 
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function(){
        $('#myForm').validate();
        $('#myForm2').validate();
        });

        jQuery.extend(jQuery.validator.messages, {
            required: "Ce champ est obligatoire",
            band_name: "Renseigne le nom de la bande",
            bio: "Renseigne la bio de la bande",
            discography : "Renseigne ta profession",
            image : "Renseigne le URL de l'image",
            maxlength: jQuery.validator.format("votre message {0} caractéres."),
            minlength: jQuery.validator.format("votre message {0} caractéres."),
            rangelength: jQuery.validator.format("votre message  entre {0} et {1} caractéres."),
            range: jQuery.validator.format("votre message  entre {0} et {1}."),
            max: jQuery.validator.format("votre message  inférieur ou égal à {0}."),
            min: jQuery.validator.format("votre message  supérieur ou égal à {0}."),
        });
</script>   
