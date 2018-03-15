<div>
	<h2>Liste des posts de vos amis</h2>
	<ul >
	
	<?php
	
	foreach ($postlist as $post_item ){ ?>
		<?php $iddoc = $post_item['iddoc']; ?></li>
		<?php echo $post_item['auteur']; ?><br/>
		<?php echo $post_item['create_date']; ?><br/>
		<?php echo $post_item['content']." "."(".$iddoc.")"." ";?>
		<?php $this->load->view('create_comment',$iddoc);?>
	<?php }
	?>
	</ ul >
</div>