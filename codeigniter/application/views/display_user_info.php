<div>
	<label>Nom: </label>
	<p><?php echo $this->session->userdata('connect_nickname'); ?></p>
	<label>Mot de passe: </label>
	<p><?php echo $this->session->userdata('connect_pass'); ?></p>
	<label>Adresse mail: </label>
	<p><?php echo $this->session->userdata('connect_email'); ?></p>
</div>
