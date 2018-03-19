<div>
	<h2>Liste des posts de vos amis</h2>
	<ul>
	
	<?php
	foreach ($postlist as $post_item ){ ?>
	<li>
		<?php $iddoc = $post_item['iddoc']; ?>
		<?php echo $post_item['auteur']; ?>
		<?php echo " - ".$post_item['create_date']; ?><br/>
		<h4><?php echo $post_item['content']." "."(".$iddoc.")"." ";?></h4>
		<?php echo $iddoc;?>
		<h3>Les comss</h3>
		<!-- <input type="text" style="display : hidden" value="<?php $iddoc ?>" name="coucou"/> -->
		
		<?php $this->load->view('create_comment',$iddoc);?>
	</li>
	<?php }
	?>
	</ul>
</div>