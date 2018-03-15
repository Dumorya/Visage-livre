<div>
	<h2>Liste des posts</h2>
	<ul >
	
	<?php 
	$iddoc = 0;
	foreach ($postlist as $post_item ){ ?>
		<li><?php echo $post_item['auteur']." a écrit : "; ?>
		<?php echo $post_item['content']." "."(".$post_item['iddoc'].")"." ";?>
		<?php $iddoc = $post_item['iddoc']; ?></li>
		<?php $this->load->view('create_comment',$iddoc);?>
	<?php }
	?>
	</ ul >
</div>