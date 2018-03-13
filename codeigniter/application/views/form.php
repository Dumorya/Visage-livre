<h2>Creer une tache</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('todo/index') ?>
<label for="title">Enonce de la tache </label>
<input type ="input" name ="title" />
<input type ="submit" name ="submit" value ="Creer une tache" />
</form >
