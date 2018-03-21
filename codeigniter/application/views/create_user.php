<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 13/03/2018
 * Time: 21:42
 */
?>

<div>
    <div class="col-lg-12 row">
        <div class="col-lg-4">
            <h3>Avec Visage livre, partagez et restez en contact avec votre entourage.</h3>
            <img src="<?php echo base_url(); ?>application/public/images/home_image.png" alt="image accueil monde connecté" />
        </div>

<<<<<<< HEAD
	<?php echo validation_errors(); ?>
	<?php echo form_open('visage_livre/create_account') ?>
		<label for="create_nickname">Identifiant</label>
		<input type ="text" name ="create_nickname" required/>
=======
        <div class="col-lg-4">
            <h2>Inscription</h2>
            <h5>C’est gratuit (et ça le restera toujours)</h5>
>>>>>>> dev

            <?php echo validation_errors(); ?>
            <?php echo form_open('visage_livre/index') ?>
                <div class="form-group">
                    <label for="create_nickname">Identifiant</label>
                    <input type ="text" name ="create_nickname" class="form-control" required/>
                </div>

                <div class="form-group">
                    <label for="create_pass">Mot de passe</label>
                    <input type ="password" name ="create_pass" class="form-control" required/>
                </div>

                <div class="form-group">
                    <label for="create_email">Adresse mail</label>
                    <input type ="email" name ="create_email" class="form-control" required/>
                </div>
                    <input type ="submit" name ="submit" value ="Créer un compte" class="createUserButton"/>
            </form >
        </div>
    </div>
</div>
