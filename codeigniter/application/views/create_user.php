<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 13/03/2018
 * Time: 21:42
 */

$firstname = null;
$lastname= null;
$eamil = null;

?>

<h2>Créer un compte</h2>

<?php echo validation_errors(); ?>
<?php echo form_open('todo/index') ?>
    <label for="nickname">Identifiant</label>
    <input type ="input" name ="nickname" />

    <label for="pass">Mot de passe</label>
    <input type ="input" name ="pass" />

    <label for="mail">Adresse mail</label>
    <input type ="input" name ="mail" />

    <input type ="submit" name ="submit" value ="Créer un compte" />
</form >
