<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="sider" class="fr">
<div class="feed-mail">
<?php if (!empty($this->options->sidebarBlock) && in_array('Showsns', $this->options->sidebarBlock)): ?>
		<div class="box">
		<ul id="contact-li">
<?php echo $this->options->sns;?>
		</ul>
	</div>
<?php endif; ?>
	<div class="gg">
<p>------======<strong> 本站公告 </strong>======------<br/>
<?php echo $this->options->sidead;?></p>
</div>
</div>
<div class="clear"></div>
	<div class="con_box htabs_art clearfix"> 
		<ul class="cooltab_nav sj_nav clearfix">
			<li><a href="#" class="active" title="new_art">最新文章</a></li>
			<li><a href="#" title="hot_art">热门文章</a></li>
			<li><a href="#" title="rand_art">随机推荐</a></li>
		</ul>   
		<div id="new_art" class="com_cont">   
		<ul>
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
			</ul>                    
		</div>
        <div id="hot_art" class="com_cont">  
            <ul>
<?php getHotComments('10');?>
				</ul>      
		</div>
		<div id="rand_art" class="com_cont">  
			<ul>
<?php getRandomPosts('10');?>
				</ul>
		</div>   
	</div>
	<div class="con_box hot_box">
	<h3>存档</h3>
	<ul id="record">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
		</ul>
	</div>
	<div class="con_box hot_box">
		<h3>最新评论</h3>
		<div class="r_comments">
			<ul>
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
		<li><?php
$host = 'https://dn-qiniu-avatar.qbox.me/avatar/'; //自定义头像CDN服务器
$url = '/avatar/'; //自定义头像目录,一般保持默认即可
$size = '32'; //自定义头像大小
$rating = Helper::options()->commentsAvatarRating;
$hash = md5(strtolower($comments->mail));
$avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
?><img src="<?php echo $avatar ?>" height="32" width="32" original="<?php echo $avatar ?>">
	<a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?>:
	<p><?php $comments->excerpt(35, '...'); ?></p></a></li>
        <?php endwhile; ?>
	</ul>
		</div>				
	</div>
<div class="clear"></div>
<div id="rollstart"></div>
</div><!--end #siderbar--></div><!--end #wrap-->
