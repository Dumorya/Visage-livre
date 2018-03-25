<div class="col-lg-8 offset-lg-2 globalContent">
    <div class="col-lg-10 offset-lg-1">
        <h2 class="textAlign profileTitle">Mon profil</h2>

        <div class="userInfos">
            <h3>Mes informations</h3>
            <label>Nom: </label>
            <p><?php echo $this->session->userdata('connect_nickname'); ?></p>
            <label>Mot de passe: </label>
            <p><?php echo $this->session->userdata('connect_pass'); ?></p>
            <label>Adresse mail: </label>
            <p><?php echo $this->session->userdata('connect_email'); ?></p>

            <hr>

            <button class="deleteAccount" onclick="window.location='<?php echo site_url("visage_livre/delete_user");?>'">Supprimer mon compte</button>
        </div>

        <hr>

        <div>
            <h2 class="textAlign">Mes posts</h2>
        </div>

        <div class="marginPosts">
            <ul>
                <?php
                $this->load->model('visage_livre_model');
                $postlist = $this->visage_livre_model->visage_livre_get_user_post();
                foreach ($postlist as $post_item ) { ?>
                    <li class="post">
                        <div class="paddingPost">
                            <?php $iddoc = $post_item['iddoc']; ?>
                            <?php echo '<h3>'.$post_item['auteur'].'</h3>'; ?>
                            <?php echo '<p class="postDate">'.$post_item['create_date'].'</p>'; ?><br/>
                            <p class="postContent"><?php echo $post_item['content'];?></p>
                        </div>

                        <hr>

                        <?php $res = ($this->visage_livre_model->visage_livre_get_comment2($iddoc));
                        //niveau 1
                        foreach ($res as $item){
                            $ref = $item['iddoc'];
                            echo $item['auteur']." : ".$item['content'];?><br/><?php
                            echo $item['create_date'];?><br/><br/><?php
                            $res2 = ($this->visage_livre_model->visage_livre_get_comment2($ref));
                            //niveau 2
                            foreach ($res2 as $item2){
                                $ref2 = $item2['iddoc'];
                                echo $item2['auteur']." : ".$item2['content'];?><br/><?php
                                echo $item2['create_date'];?><br/><br/><?php
                                $res3 = ($this->visage_livre_model->visage_livre_get_comment2($ref2));
                                //niveau 3
                                foreach ($res3 as $item3){
                                    echo $item3['auteur']." : ".$item3['content'];?><br/><?php
                                    echo $item3['create_date'];?><br/><br/><?php
                                }
                            }
                        } ?>

                        <div class="comment">
                            <?php echo form_open('visage_livre/create_comment?iddoc='.$iddoc);?>
                            <div class="input-group mb-3">
                                <input type ="text" name ="content" placeholder="Votre commentaire..." class="newComment form-control" required/>
                                <div class="input-group-append">
                                    <button class="sendCommentButton cursorPointer" type="submit" name="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                            </form >
                        </div>                    </li>
                <?php }?>
            </ul>
        </div>
    </div>

</div>
