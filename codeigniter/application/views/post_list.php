<div>
	<h2 class="textAlign">Fil d'actualités</h2>

    <div class="marginPosts">
        <ul>
            <?php
            $this->load->model('visage_livre_model');
            $postlist = $this->visage_livre_model->visage_livre_get_post_format();

            foreach ($postlist as $post_item ) { ?>
                <li class="post">
                    <div class="paddingPost">
                        <?php $iddoc = $post_item['iddoc']; ?>
                        <?php echo '<h3>'.$post_item['auteur'].'</h3>'; ?>
                        <?php if($post_item['auteur'] === $this->visage_livre_model->get_user_connected())
                            {
                            ?>
                            <a class="trashIconPost cursorPointer"
                               onclick="window.location='<?php echo site_url("visage_livre/delete_post/" . $iddoc); ?>'">
                                <i class="fa fa-trash fa-2x"></i>
                            </a>
                        <?php
                            }
                        echo '<p class="postDate">'.$post_item['create_date'].'</p>'; ?><br/>
                        <p class="postContent">
                            <?php echo $post_item['content'];?>
                            <?php
                                $fullPostList = $this->visage_livre_model->visage_livre_get_full_user_post($iddoc);

                                foreach($fullPostList as $fullPostItem)
                                {
                                    if($fullPostItem['iddoc'] === $iddoc)
                                    {
                                        if(strlen($fullPostItem['content']) > 33)
                                        {
                                            ?>
                                                <div>
                                                    <a class="seeMoreLink cursorPointer" onclick="window.location='<?php echo site_url("visage_livre/see_more?iddoc=".$fullPostItem['iddoc']);?>'">Voir plus</a>
                                                </div>
                                            <?php
                                        }
                                    }

                                }
                            ?>
                        </p>
                    </div>

                    <hr>

                    <div class="comment">
                        <?php $res = $this->visage_livre_model->visage_livre_get_comment2($iddoc);
                        //niveau 1
                        foreach ($res as $item){
                            $ref = $item['iddoc'];
                            echo '<div>';
                                echo '<span class="coms">';
                                    echo '<label>'.$item['auteur'].'</label>'.'<label>'.$item['create_date'].'</label>';?><?php
                                    echo '<span>'.$item['content'].'</span>';?><?php
                                    $res2 = ($this->visage_livre_model->visage_livre_get_comment2($ref));
                                echo '</span>';
                                echo '<br/>';

                                echo '<a class="answerComment cursorPointer" onclick="displayNewComment()">Répondre</a>';
                                ?>
                                <?php if($item['auteur'] === $this->visage_livre_model->get_user_connected())
                                {
                                ?>
                                    <a class="trashIconComment cursorPointer"
                                       onclick="window.location='<?php echo site_url("visage_livre/delete_comment/" . $ref); ?>'">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                <?php
                                }
                            echo '</div>';
                        ?>

                            <div class="comment commentPartHidden">
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
                            </div>

                        <?php
                            echo '<br/>';
                            //niveau 2
                            foreach ($res2 as $item2){
                                $ref2 = $item2['iddoc'];
                                echo '<div>';

                                echo '<span class="coms">';
                                echo '<label>'.$item2['auteur'].' </label>'.'<label>'.$item2['create_date'].'</label>';?><?php
                                echo '<span>'.$item2['content'].'</span>';?><?php
                                $res3 = ($this->visage_livre_model->visage_livre_get_comment2($ref2));
                                echo '</span>';

                                echo '<a class="answerComment cursorPointer">Répondre</a>';
                                echo '</div>';

                                echo '<br/>';
                                //niveau 3
                                foreach ($res3 as $item3){
                                    echo '<div>';
                                    echo '<span class="coms">';
                                    echo '<label>'.$item3['auteur'].' </label>'.'<label>'.$item3['create_date'].'</label>';?><?php
                                    echo '<span>'.$item3['content'].'</span>';?><?php
                                    echo '</span>';
                                    echo '</div>';

                                }
                            }
                        } ?>
                    </div>

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
                    </div>
                </li>
            <?php }?>
        </ul>
    </div>
	
</div>
