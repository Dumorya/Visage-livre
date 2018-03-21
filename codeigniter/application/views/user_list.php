<div>
	<h2>Liste des utilisateurs</h2>
	<ul >
	<?php 
	$this->load->model('visage_livre_model');
	$otheruser  = $this->visage_livre_model->visage_livre_get_notconnected_user();
	foreach ($otheruser as $user_item ){ ?>
		<li><?php echo $user_item['nickname']." "
		//.anchor('visage_livre/delete_comment/'.$post_item["iddoc"],'[supprimer]'); ?></li>
	<?php }
	?>
	</ ul >
</div>