<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 13/03/2018
 * Time: 21:42
 */
?>

<div>
	<h2>Créer un compte</h2>

	<?php echo validation_errors(); ?>
	<?php echo form_open('visage_livre/index') ?>
		<label for="create_nickname">Identifiant</label>
		<input type ="text" name ="create_nickname" required/>

		<label for="create_pass">Mot de passe</label>
		<input type ="password" name ="create_pass" required/>

		<label for="create_email">Adresse mail</label>
		<input type ="email" name ="create_email" required/>

		<input type ="submit" name ="submit" value ="Créer un compte" />
	</form >
</div>
