<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 24/03/2018
 * Time: 17:08
 */

$fullPostList = $this->visage_livre_model->visage_livre_get_full_user_post($iddoc);

?>

<div class="col-lg-8 offset-lg-2 globalContent">
    <div class="col-lg-10 offset-lg-1">

        <h2 class="textAlign">Détail du post</h2>

        <ul>
            <?php
            $this->load->model('visage_livre_model');
            $postlist = $this->visage_livre_model->visage_livre_get_post_format();

            foreach ($fullPostList as $fullPostItem ) { ?>
                <li class="post">
                    <div class="paddingPost">
                        <?php $iddoc = $fullPostItem['iddoc']; ?>
                        <?php echo '<h3>'.$fullPostItem['auteur'].'</h3>'; ?>
                        <?php echo '<p class="postDate">'.$fullPostItem['create_date'].'</p>'; ?><br/>
                        <p class="postContent">
                            <?php echo $fullPostItem['content'];?>
                        </p>
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
                    </div>
                </li>
            <?php }?>
        </ul>
    </div>
</div>
