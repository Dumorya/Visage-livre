<div>
	<h2></h2>
	<ul >
	
	<?php foreach ($commentlist as $comment_item ){ ?>
		<?php echo $comment_item['auteur']; ?><br/>
		<?php echo $comment_item['create_date']; ?><br/>
		<?php echo $comment_item['content']." "."(".$comment_item['iddoc'].")"." ";?><br/>
	<?php }
	?>
	</ ul >
</div>