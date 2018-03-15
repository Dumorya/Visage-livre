<div>
	<h2>Ajouter un post</h2>

	<?php echo validation_errors(); ?>
	<?php echo form_open('visage_livre/create_post') ?>
		<input type ="text" name ="create_content" required/>


		<input type ="submit" name ="submit" value ="Publier" />
	</form >
</div>