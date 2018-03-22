<div id="login" class="alignItems">
	<?php echo validation_errors(); ?>
	<?php echo form_open('visage_livre/connect') ?>
		<label for="connect_nickname" class="labelLogin">Identifiant</label>
		<input type="text" name="connect_nickname" required/>
		
		<label for="connect_pass" class="labelLogin">Mot de passe</label>
		<input type="password" name="connect_pass" required/>
		
		<input type="submit" name="submit" value="Connexion" class="loginButton"/>
	</form>
</div>
