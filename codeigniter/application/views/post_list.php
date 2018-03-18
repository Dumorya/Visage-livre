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
		<?php echo form_open('visage_livre/get_list_comment',$post_item['iddoc']); ?>
			<?php echo form_hidden('iddoc');?>
			
		<?php echo form_close();?>
		<?php $this->load->view('create_comment',$iddoc);?>
	</li>
	<?php }
	?>
	</ul>
</div>