<?php echo validation_errors(); ?>
<?php echo form_open('visage_livre/index') ?>
	<input type="button" value="Déconnexion" name="logout"/>
</form>

<div>
	<label>Nom: </label>
	<p><?php echo $this->session->userdata('connect_nickname'); ?></p>
	<label>Mot de passe: </label>
	<p><?php echo $this->session->userdata('connect_pass'); ?></p>
	<label>Adresse mail: </label>
	<p><?php echo $this->session->userdata('connect_email'); ?></p>
</div>
