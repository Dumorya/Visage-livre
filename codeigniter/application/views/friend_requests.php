<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 25/03/2018
 * Time: 12:53
 */

$requests = $this->visage_livre_model->visage_livre_display_request();

?>

<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-md-2 offset-lg-2 globalContent">
    <div class="col-lg-10 offset-lg-1">
        <a class="arrowReturn cursorPointer" onclick="window.location='<?php echo site_url("visage_livre/redirect_page_home");?>'">
            <i class="fa fa-long-arrow-left fa-4x"></i>
        </a>
        <?php
            if(count($requests) > 1)
            {
                echo '<h2 class="textAlign profileTitle">Répondre aux ';
                echo (count($requests));
                echo ' invitations</h2>';
            }
            elseif(count($requests) == 1)
            {
                echo '<h2 class="textAlign profileTitle">Répondre à l\'invitation</h2>';
            }
            else
            {
                echo '<h2 class="textAlign profileTitle">Vous n\'avez pas d\'invitation</h2>';
            }
        ?>
        <div class="requests paddingPost">
            <?php
                foreach($requests as $request)
                {
                    echo '<div class="alignItems">';
                        echo '<div>';
                            echo '<p class="requestName">'.$request['nickname'].'</p>';
                            echo '<p class="postDate">'.$request['request_date'].'</p>';
                        echo '</div>';
                        echo '<div class="alignItems buttonsFriendRequest">';
                        ?>
                                <button class="postSubmit confirmFriendRequest" onclick="window.location='<?php echo site_url("visage_livre/accept_friend_request/".$request['nickname'].'/'.$request['target']);?>'">Confirmer</button>
                                <button class="deleteAccount" onclick="window.location='<?php echo site_url("visage_livre/refuse_friend_request/".$request['nickname'].'/'.$request['target']);?>'">Supprimer l'invitation</button>
                        <?php
                        echo '</div>';
                    echo '</div>';
                    echo '<hr>';
                }

            ?>
        </div>

    </div>
</div>


