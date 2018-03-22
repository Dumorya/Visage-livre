<div>
	<h2 class="textAlign">Fil d'actualité</h2>

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

                <?php $this->load->view('create_comment');?>
                </li>
            <?php }?>
        </ul>
    </div>
	
</div>
