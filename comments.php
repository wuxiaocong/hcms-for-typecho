<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>
    
    <?php $comments->listComments(); ?>

    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
<div id="<?php $this->respondId(); ?>" class="respond">
<div id="comment-place">
	<div class="comment-post" id="comment-post">
	<div id="respond_box">
	<div id="respond">
		<h3>发表评论</h3>	

		<div class="cancel-comment-reply">
		<div id="real-avatar">
				<img src="http://www.gravatar.com/avatar/d41d8cd98f00b204e9800998ecf8427e?s=40&amp;d=mm&amp;r=g" class="avatar photo avatar-default" height="40" width="40" name="gravarimg">
					
		</div>	
		
		<div class="cancel-reply" id="cancel-reply"><?php $comments->cancelReply(); ?></div>
		</div>
		
		
		<p class="comment-header"><a name="respond"></a></p>
		<form method="post" name="commentform" action="<?php $this->commentUrl() ?>" id="commentform">
<?php if($this->user->hasLogin()): ?>
<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
<?php else: ?>
		<input type="hidden" name="gid" value="3">
				<div id="comment-author-info">
			<p>
				<input type="text" name="author" maxlength="49" value="<?php $this->remember('author'); ?>" size="22" tabindex="1">
				<label for="author">昵称</label>
			</p>
			<p>
				<input type="text" name="mail" onblur="gravatarimg()" maxlength="128" value="<?php $this->remember('mail'); ?>" size="22" tabindex="2">
				<label for="email">邮箱</label>
			</p>
			<p>
				<input type="text" name="url" maxlength="128" value="<?php $this->remember('url'); ?>" size="22" tabindex="3">
				<label for="url">网址</label>
			</p>
		</div>
<?php endif; ?>
					<div class="clear"></div>
			<p><textarea name="text" id="comment" rows="10" tabindex="4"><?php $this->remember('text'); ?></textarea></p>
			<p> <input type="submit" id="submit" value="发表评论" tabindex="6"><input class="reset" name="reset" type="reset" id="reset" tabindex="6" value="重写"></p>
			
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1">
		</form>
		<div class="clear"></div>
	</div>
	</div>
		</div>
	</div></div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
