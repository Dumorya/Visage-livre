<h2> <?php echo $title ?> </h2>
<ul>
<?php foreach ($todolist as $todo_item ): ?>
	<li><?php echo $todo_item['title']." "
	.anchor('todo/delete/'.$todo_item["id"],'[supp]'); ?></li>
<?php endforeach ?>
</ul>
