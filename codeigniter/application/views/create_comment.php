<div class="comment">
	<?php echo form_open('visage_livre/create_comment'); ?>
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