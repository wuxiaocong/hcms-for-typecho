<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->is('index') && $this->_currentPage == 1): ?><?php if ($this->options->ttitle): ?> - <?php $this->options->ttitle(); ?><?php endif; ?><?php endif; ?></title>
<link href="<?php $this->options->themeUrl('style'); ?><?php if($this->options->run_style){echo '2';}else{echo '';}?>.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/lightbox.css'); ?>">
<?php $this->header(); ?>
</head>
<!--[if lt IE 7]>
<div style="clear:both;height:59px;padding:0 0 0 15px;position:relative;">
		<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"> <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0027_Simplified Chinese.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /> </a></div>
<![endif]-->
<body>
<div id="header">
	<div id="header_inner">
					<strong class="logo">
			<a href="<?php $this->options->siteUrl(); ?>" rel="home" title="<?php $this->options->title() ?>"><?php $this->options->title() ?></a>
			</strong>
				<div class="header_bg"></div>
		<div class="toplinks">
			<div id="_userlogin">	
				<a href="<?php $this->options->feedUrl(); ?>" title="欢迎订阅<?php $this->options->title() ?>" target="_blank">RSS订阅</a><span>|</span>
              <a href="<?php $this->options->adminUrl(); ?>" title="<?php if($this->user->hasLogin()): ?>管理<?php else: ?>登录<?php endif; ?>" target="_blank"><?php if($this->user->hasLogin()): ?>管理<?php else: ?>登录<?php endif; ?></a>
							</div>
			<div id="top_nav">
				<form name="keyform" method="get" action="<?php $this->options->siteUrl(); ?>">
					<div class="form clearfix">
						<label for="s" ></label>
						<input name="s"  type="text" class="search-keyword" onfocus="if (this.value == '请输入关键字进行搜索') {this.value = '';}" onblur="if (this.value == '') {this.value = '请输入关键字进行搜索';}" value="请输入关键字进行搜索" />
						<button type="submit" class="select_class" onmouseout="this.className='select_class'" onmouseover="this.className='select_over'" />搜索</button>
					</div>
				</form>
			</div>
		</div>
		<div id="navmenu"><ul class="menu">			<li>
			<a href="<?php $this->options->siteUrl(); ?>" >首页</a>
			            		</li>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <li><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                    <?php endwhile; ?>
			<?php if($this->user->hasLogin()): ?><?php else: ?><li><a href="<?php $this->options->adminUrl(); ?>" >登录</a></li><?php endif; ?>
	</ul></div>
		<div class="clearfix"></div>
    </div>
</div>
