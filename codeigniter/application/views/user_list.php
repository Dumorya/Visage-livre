<div class="userList">
    <h2>CONTACTS</h2>
    <hr>

    <ul>
        <?php
            $this->load->model('visage_livre_model');
			$frienduser  = $this->visage_livre_model->visage_livre_get_user_friend();
            foreach ($frienduser as $user_item){?>
					<li><?php echo $user_item['nickname']?></li>
                    <button class="deleteFriend" onclick="window.location='<?php echo site_url("visage_livre/delete_friend");?>">
                        <i class="fa fa-ban"></i>
                    </button>
            <?php
            } ?>

        
    </ul>

    <h2>UTILISATEURS</h2>
    <hr>
	<ul>
        <?php
        
        $otheruser  = $this->visage_livre_model->visage_livre_get_notconnected_user();
        foreach ($otheruser as $user_item ){ ?>
            <li><?php echo $user_item['nickname'] ?></li>
        <?php }
        ?>
	</ul>
</div>