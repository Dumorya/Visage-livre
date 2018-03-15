<div>
	<?php echo validation_errors(); ?>
	<?php echo form_open('todo/index') ?>
		<label for="connect_nickname">Identifiant</label>
		<input type="text" name="connect_nickname" required/>
		
		<label for="connect_pass">Mot de passe</label>
		<input type="password" name="connect_pass" required/>
		
		<input type="submit" name="submit" value="Connexion"/>
	</form>
</div>
