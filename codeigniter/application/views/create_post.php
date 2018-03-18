<div>
	<h2>Exprimez vous <?php echo $this->visage_livre_model->get_user_connected();?></h2>

	
	<?php echo form_open('visage_livre/create_post') ?>
		<input type ="text" name ="create_content" required/>


		<input type ="submit" name ="submit" value ="Publier" />
	</form >
</div>