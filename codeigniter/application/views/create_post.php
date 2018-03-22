<div>
    <h1 class="textAlign">Bonjour <?php echo $this->visage_livre_model->get_user_connected();?> !</h1>

    <div class="col-lg-10 offset-1 createPost">
        <?php echo form_open('visage_livre/create_post') ?>
            <textarea type ="text" name ="content" placeholder="Exprimez vous..." class="form-control" required></textarea>
            <input type ="submit" name ="submit" value ="Publier" class="postSubmit"/>
        </form>
    </div>

    <hr>
</div>

