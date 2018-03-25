<?php
/**
 * Created by PhpStorm.
 * User: Clara
 * Date: 25/03/2018
 * Time: 12:53
 */

$requests = $this->visage_livre_model->visage_livre_display_request();

?>

<div class="col-lg-8 offset-lg-2 globalContent">
    <div class="col-lg-10 offset-lg-1">
        <?php
            if(count($requests) > 1)
            {
                echo '<h2>Répondre aux ';
                echo (count($requests));
                echo ' invitations</h2>';
            }
            elseif(count($requests) == 1)
            {
                echo '<h2>Répondre à l\'invitation</h2>';
            }
            else
            {
                echo '<h2>Vous n\'avez pas d\'invitation</h2>';
            }
        ?>
        <div class="alignItems">
            <?php
                foreach($requests as $request)
                {
                    echo '<div>';
                        echo '<p class="requestName">'.$request['nickname'].'</p>';
                        echo '<p class="postDate">'.$request['request_date'].'</p>';
                    echo '</div>';
                    echo '<div class="alignItems">';
                    ?>
                        <button onclick="window.location='<?php echo site_url("visage_livre/accept_friend_request/".$request['nickname'].'/'.$request['target']);?>'">Confirmer</button>
                        <button onclick="window.location='<?php echo site_url("visage_livre/refuse_friend_request/".$request['nickname'].'/'.$request['target']);?>'">Supprimer l'invitation</button>
                    <?php
                    echo '</div>';
                }
            ?>
        </div>
    </div>
</div>


