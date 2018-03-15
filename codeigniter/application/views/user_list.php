<div>
	<h2>Liste des utilisateurs</h2>
	<ul >
	<?php foreach ($userlist as $user_item ){ ?>
		<li><?php echo $user_item['nickname']." "
		//.anchor('visage_livre/delete_comment/'.$post_item["iddoc"],'[supprimer]'); ?></li>
	<?php }
	?>
	</ ul >
</div>