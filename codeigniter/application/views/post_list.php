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
		<h3>Les comss</h3>
		<?php echo 'iddoc = '.$iddoc; ?>
		<input type="text" style="display : hidden" value="<?php $iddoc ?>" name="coucou"/>
		<input type="submit" style="visibility:hidden;" name="sub" value="submit" />
		<?php $this->load->view('create_comment');?>
	</li>
	<?php }
	?>
	</ul>
</div>