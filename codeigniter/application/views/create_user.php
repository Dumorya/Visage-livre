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
        <div class="col-lg-6">
            <img src="<?php echo base_url(); ?>application/public/images/home_image.png" alt="image accueil monde connecté" />
        </div>

        <div class="col-lg-6">
            <h2>Créer un compte</h2>

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
                    <input type ="submit" name ="submit" value ="Créer un compte" />
            </form >
        </div>
    </div>
</div>
