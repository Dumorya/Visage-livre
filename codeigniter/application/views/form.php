<h2>Creer un post</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('visage_livre/index') ?>
<label for="title">Contenu du post / com</label>
<input type ="input" name ="content" />
<label for="title">Auteur du post / com</label>
<input type ="input" name ="auteur" />
<label for="title">a quel post fait référence le com</label>
<input type ="input" name ="ref" />
<input type ="submit" name ="submit" value ="Creer un post" />
</form >
