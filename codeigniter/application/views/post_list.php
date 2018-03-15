<div>
	<h2>Liste des posts</h2>
	<ul >
	<?php foreach ($postlist as $post_item ){ ?>
		<li><?php echo $post_item['content']." "."(".$post_item['iddoc'].")"." "
		.anchor('visage_livre/delete_post/'.$post_item["iddoc"],'[supprimer]'); ?></li>
	<?php }
	?>
	</ ul >
</div>