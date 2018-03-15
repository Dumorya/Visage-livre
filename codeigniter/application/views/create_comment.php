<div>
	<h5>Ajouter un commentaire</h5>

	<?php echo validation_errors(); ?>
	<?php echo form_open('visage_livre/create_comment') ?>
	
		<input type ="text" name ="content" required/>

		<input type ="submit" name ="submit" value ="Commenter" />
	</form >
</div>