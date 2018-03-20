<div>
	<h2>Les commentaires</h2>
	<ul >
	<?php $res = ($this->visage_livre_model->visage_livre_get_comment2($iddoc));
		foreach ($res as $item){
			echo $item['auteur'];
			echo $item['create_date'];
			echo $item['content'];?><br/>
			
	
	<?php }
	?>
	</ ul >
</div>