<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div id="wrapper" class="clearfix"><div id="breadcrumbs" class="con_box clearfix">
		<div class="bcrumbs"><strong><a href="<?php $this->options->siteUrl(); ?>" title="返回首页">home</a></strong>
						<a><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></a>
		
				</div>
</div>
<!--普通显示-->
<div id="art_container clearfix">
<div id="art_main" class="fl">
<?php while($this->next()): ?> 
<div class="art_img_box clearfix">
	<div class="fl innerimg_box">
	  <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"  ><img src="<?php echo thumb($this->cid); ?>"></a>
	</div>
    <div class="fr box_content">
	  <h2><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"  ><?php $this->title() ?></a></h2>        		
		<div class="info">
        <span>发布日期：<?php $this->date('Y-m-d'); ?></span>|                        
		<span>点击：<small> <?php get_post_view($this) ?> 次</small></span>|
		<span><a href="<?php $this->permalink() ?>#comments" title="《<?php $this->title() ?>》上的评论"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a></span>
		</div>
        
		<ul class="clearfix">
        <li>所属栏目：<?php $this->category(','); ?></li>
        <li class="art_tag">标签：<?php $this->tags(' ', true, '没有标签'); ?></li>
        </ul>   
                        
		<p class="intro"><?php $this->excerpt(50,'...'); ?></p>
    </div>
</div>	
<div class="page_navi"></div><?php endwhile; ?>
</div><!--内容-->
</div>
	<?php $this->need('sidebar.php'); ?>
	<?php $this->need('footer.php'); ?>
