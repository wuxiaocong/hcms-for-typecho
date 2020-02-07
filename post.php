<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="wrapper" class="clearfix">	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php $this->options->siteUrl(); ?>" title="返回首页">home</a></strong>
				<?php $this->category(','); ?>
			<a><?php $this->title() ?></a>
		</div>
	</div>

<div id="art_container clearfix">
<div id="art_main1" class="art_white_bg fl"> 
	 <div class="art_title clearfix">
	             <span class="face_img"><?php echo $this->author->gravatar(50);?></span>
			<h1><?php $this->title() ?></h1>
			<p class="info">
			<small>时间:</small>：<?php $this->date('Y-m-d'); ?> 
			<small>栏目:</small><?php $this->category(','); ?>
				<small>作者:</small> <a href="<?php $this->author->permalink(); ?>" ><?php $this->author(); ?></a> 
			<small>评论:</small> <?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?>			<small>点击:</small> <?php get_post_view($this) ?> 次
			</p><!-- /info -->  
			</div>
<div class="article_content">
		<div class="article-tag">
		<p><strong>本文标签</strong>： <?php $this->tags(' ', true, '没有标签'); ?></p>
		</div>
		<div class="clear"></div>
				
<?php pContent($this); ?>

		<div class="clear"></div>		
		         			
		<div class="postcopyright">
			<p><strong> 声明: </strong> 本文由(<a href="<?php $this->author->permalink(); ?>" ><?php $this->author(); ?></a>)原创编译，转载请保留链接: <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->title() ?></a></p>
		</div>
</div><!--正文--> 
	
	<div class="con_pretext clearfix"><ul>		<li class="first">上一篇：<?php $this->thePrev('%s','没有了'); ?></li>
			<li class="last">下一篇：<?php $this->theNext('%s','没有了'); ?></li>
	</ul></div>
	<!--上一篇 下一篇--> 
	
		
	<div class="clear"></div> 
			
<h3 id="comments" style="margin-bottom:10px"><?php $this->title() ?>：<?php $this->commentsNum('等您坐沙发呢！', '1 条评论', '%d 条评论'); ?></h3>
<?php $this->need('comments.php'); ?>
	  <div class="clear"></div>
</div><!--内容-->
	
</div><!--end #art_container-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
