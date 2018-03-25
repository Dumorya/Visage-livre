<div class="userList">
    <h4>MES AMIS</h4>
    <hr>

    <ul>
        <?php
            $this->load->model('visage_livre_model');
			$frienduser  = $this->visage_livre_model->visage_livre_get_user_friend();
            foreach ($frienduser as $user_item){?>
					<li>
                        <span><?php echo $user_item['nickname']?></span>
                        <button class="deleteFriend" onclick="window.location='<?php echo site_url("visage_livre/delete_friend");?>">
                            <i class="fa fa-user-times"></i>
                        </button>
                    </li>
            <?php
            } ?>

        
    </ul>

    <h4>AUTRES UTILISATEURS</h4>
    <hr>
	<ul>
        <?php
        
        $otheruser  = $this->visage_livre_model->visage_livre_get_user_notfriend();
        foreach ($otheruser as $user_item ){ ?>
            <li>
                <span><?php echo $user_item['nickname'] ?></span>
                <button class="addFriend" onclick="window.location='<?php echo site_url("visage_livre/send_friend_request/".$user_item['nickname']."/".$this->visage_livre_model->get_user_connected());?>'">
                    <i class="fa fa-user-plus"></i>
                </button>
            </li>
        <?php }
        ?>
	</ul>
</div>