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
		<?php echo 'iddoc actuel = '.$iddoc; ?><br/>
		
		<h3>Les commentaires</h3>
		<?php $res = ($this->visage_livre_model->visage_livre_get_comment2($iddoc));
		foreach ($res as $item){
			$ref = $item['iddoc'];
			echo $item['auteur']." : ".$item['content'];?><br/><?php
			echo $item['create_date'];?><br/><br/><?php
			$res2 = ($this->visage_livre_model->visage_livre_get_comment2($ref));
			foreach ($res2 as $item2){
				echo $item2['auteur']." : ".$item2['content'];?><br/><?php
				echo $item2['create_date'];?><br/><br/><?php
			}
		} ?>

	<?php $this->load->view('create_comment');?>
	</li>
	<?php }?>
	</ul>
</div>