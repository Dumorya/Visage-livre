<div class="userList">
    <h2>CONTACTS</h2>
    <hr>

    <ul>
        <!-- TEST -->
        <?php
            $test = 35;
            for($i = 0 ; $i < $test ; $i++)
            {
                ?>
                <li>
                    <span>test ami<span>
                    <button class="deleteFriend" onclick="window.location='<?php echo site_url("visage_livre/delete_friend");?>">
                        <i class="fa fa-ban"></i>
                    </button>
                </li>

        <?php
            }
        ?>
    </ul>

    <h2>UTILISATEURS</h2>
    <hr>
	<ul>
        <?php
        $this->load->model('visage_livre_model');
        $otheruser  = $this->visage_livre_model->visage_livre_get_notconnected_user();
        foreach ($otheruser as $user_item ){ ?>
            <li><?php echo $user_item['nickname'] ?></li>
        <?php }
        ?>
	</ul>
</div>