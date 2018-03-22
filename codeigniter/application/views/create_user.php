<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 13/03/2018
 * Time: 21:42
 */
?>

<div class="col-lg-10 offset-lg-1 globalContent">
    <div class="col-lg-12 row">
        <div class="col-lg-6">
            <div class="col-lg-12 textAlign">
                <h3>Avec Visage livre, partagez et restez en contact avec votre entourage.</h3>
                <img src="<?php echo base_url(); ?>application/public/images/home_image.png" alt="image accueil monde connecté" />
            </div>
        </div>

        <div class="col-lg-6">
            <h2>Inscription</h2>
            <h5>C’est gratuit (et ça le restera toujours)</h5>

            <?php echo validation_errors(); ?>
            <?php echo form_open('visage_livre/create_account'); ?>
                <div class="form-group">
                    <input type ="text" name ="create_nickname" class="form-control" placeholder="Identifiant" required/>
                </div>

                <div class="form-group">
                    <input type ="password" name ="create_pass" class="form-control" placeholder="Mot de passe" required/>
                </div>

                <div class="form-group">
                    <input type ="email" name ="create_email" class="form-control" placeholder="Adresse mail"  required/>
                </div>
                    <input type ="submit" name ="submit" value ="Créer un compte" class="createUserButton"/>
            </form >
        </div>
    </div>
</div>

