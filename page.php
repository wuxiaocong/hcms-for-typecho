<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="wrapper" class="clearfix">	<div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php $this->options->siteUrl(); ?>" title="返回首页">home</a></strong>
		<a>ces</a>
		</div>
	</div>

<div id="art_container clearfix">
<div id="art_main1" class="art_white_bg fl"> 

	 <div class="art_title clearfix">
	 <h1><?php $this->title() ?></h1>
	 </div>
	
	 <div class="article_content">
	 <div class="clear"></div>
	 <?php pContent($this); ?>
	<div class="clear"></div>

</div><!--正文--> 
<h3 id="comments" style="margin-bottom:10px"><?php $this->title() ?>：<?php $this->commentsNum('等您坐沙发呢！', '1 条评论', '%d 条评论'); ?></h3>
<?php $this->need('comments.php'); ?>

	  <div class="clear"></div>

</div><!--内容-->
	
</div><!--end #art_container-->

<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
