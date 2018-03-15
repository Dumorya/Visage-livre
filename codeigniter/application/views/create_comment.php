<div>
	<h2>Ajouter un commentaire</h2>

	<?php echo validation_errors(); ?>
	<?php echo form_open('visage_livre/create_comment') ?>
		<label for="create_content">Contenu</label>
		<input type ="text" name ="create_content" required/>


		<label for="create_ref">Référence</label>
		<input type ="text" name ="create_ref" required/>

		<input type ="submit" name ="submit" value ="Créer un commentaire" />
	</form >
</div>