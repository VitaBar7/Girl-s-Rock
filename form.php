<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'navbar.php'; ?>
<main class="container">
    <h2 class="white-bg">Ajouter un nouvel article</h2>
    
        <div>
        
            <form class="form-margin" action="add.php" method="post" id="myForm">
                <fieldset class="border rounded p-3">
                    <legend><h4 class="fs-3">Merci de remplir tous les champs<h4></legend><br/>
                    <div>
                        <label for="band_name">Bande</label><br/>
                        <input type="text" id="band_name" name="band_name" required>  
                    </div>
                    <div>
                        <label for="bio">Biographie</label><br/>
                        <textarea  type="text" id="bio" name="bio" rows="5" cols="50"  required></textarea>
                    </div>
                    <div>
                        <label  for="discography">Discographie</label><br/>
                        <textarea  type="text" id="discography" name="discography" rows="5" cols="50" required></textarea>
                    </div> 
                    <div>
                        <label for="image">Image URL</label><br/>
                        <input  type="text" id="image" name="image" required>
                    <div class="row">         
                        <div class="col-6">
                            <input class=" submit button" type="submit" name="submit" value="Ajouter">
                        </div>
                        <div class="col-6">
                            <a href="index.php" class="btn btn-danger button">Annuler</a>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div> 
    </main>  
<?php 
include 'footer.php'; ?>
</body>
</html>
