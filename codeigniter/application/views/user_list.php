<h2> <? php echo $title ? > </h2>
<ul >


<?php foreach ($postlist as $post_item ){ ?>
	<li><?php echo $post_item['nickname']." "
	//.anchor('visage_livre/delete_comment/'.$post_item["iddoc"],'[supprimer]'); ?></li>
<?php }
?>
</ ul >


