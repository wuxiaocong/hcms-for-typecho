<?php
/**
 * 一款很老的主题。
 * 
 * @package Hcms
 * @author 吴尼玛
 * @version 1.1
 * @link https://feed.cc
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div id="wrapper" class="clearfix"><div id="art_container clearfix">
<div id="art_main" class="fl"> 
<?php if (!empty($this->options->sidebarBlock) && in_array('Showhdp', $this->options->sidebarBlock)): ?>
<!--幻灯-->
<div id="slideshow">
<div class="slideshow">
	<div id="featured_tag"></div>
	<div id="tag_c"></div>
	<div id="slider_nav"></div>
	<div id="slider" class="clearfix">

<?php 
$lunbo=$this->options->hdplist;
$hang = explode(",", $lunbo);
$n=count($hang);
$html="";
for($i=0;$i<$n;$i++){
$this->widget('Widget_Archive@lunbo'.$i, 'pageSize=1&type=post', 'cid='.$hang[$i])->to($ji);
if($i==0){$no=" sx_no";}else{$no="";}
$html=$html.'<div class="featured_post" >
	<div class="slider_image">			
	<a href="'.$ji->permalink.'" title="'.$ji->title.'"><img src="'.thumb($ji->cid).'" alt="'.$ji->title.'" border="0" width="420" height="332" /></a>
	</div>
	<div class="slider_post">
	<h3><a href="'.$ji->permalink.'" rel="bookmark" title="'.$ji->title.'">'.$ji->title.'</a></h3> 
	<div class="archive_info">
	</div>    
		
	<p>'.$ji->description.'</p>
		
	<div class="clear"></div>
	</div>
</div>';
}
echo $html;
?>
	</div>
 </div>
 </div>					
<?php endif; ?>
<!--新日志-->
<?php while($this->next()): ?>
<div class="art_img_box clearfix">
	<div class="fl innerimg_box">
	  <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"  ><img src="<?php echo thumb($this->cid); ?>"></a>
	</div>
    <div class="fr box_content">
	  <h2><a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"  ><?php $this->title() ?></a></h2>        		
		<div class="info">
        <span>发布日期：<?php $this->date('Y-m-d'); ?></span>|                        
		<span>点击： <?php get_post_view($this) ?> 次</span>|
		<span><a href="<?php $this->permalink() ?>#comments" title="《<?php $this->title() ?>》上的评论"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a></span>
		</div>
		<ul class="clearfix">
        <li>所属栏目：<?php $this->category(','); ?></li>
        <li class="art_tag">标签：<?php $this->tags(' ', true, '没有标签'); ?></li>
        </ul> 
		<p class="intro"><?php $this->excerpt(50,'...'); ?></p> 
    </div>
		<div class="news"></div>
</div>	
<?php endwhile; ?>
<?php if (!empty($this->options->sidebarBlock) && in_array('Showcms', $this->options->sidebarBlock)): ?>
<!--分类日志-->
<?php
$str = $this->options->cmslist;
$retArr = explode(',', $str);
$count = count($retArr);
$a=0;
while($a < $count): 
$b=$a+1;
?>
<div class="con_box fl resouse_artile qd_aritle" id="cat-<?php echo $b ;?>"  >
<h2><span class="i6"><a class="more fr" rel="nofollow" href="<?php getcageurl(cmslist($a));?>" title="查看 <?php getcagename(cmslist($a));?> 中的全部文章">更多 <?php getcagename(cmslist($a));?> 文章</a></span>
<?php getcagename(cmslist($a));?></h2><div>
<?php
$this->widget('Widget_Archive@index'.$b, 'pageSize=6&type=category', 'mid='.cmslist($a))->to($list);
$c=0;
while($list->next()):
?>
<?php
if($c == 0){?>
<ul class="column list clearfix"> 
<li class="post-1"> 	
<cite><a href="<?php $list->permalink() ?>" title="<?php $list->title() ?>"  ><img src="<?php echo thumb($list->cid); ?>" title="点击查看原图" alt="<?php $list->title() ?>" border="0" width="1645" height="2220" /></a></cite>
<em class="emtitle"><a href="<?php $list->permalink() ?>" rel="bookmark" title="<?php $list->title() ?>" ><?php $list->title() ?></a></em>
<br/>
<em class="excerpt"><?php $this->excerpt(50,'...'); ?></em>
</li>
</ul>
<?php }else{ ?>
		<ul class="index_resourse_list qd_list clearfix"> <li> <span class="fr"><?php $list->date('Y-m-d'); ?></span>			
		<a href="<?php $list->permalink() ?>" title="<?php $list->title() ?>"><?php $list->title() ?></a>
		</li></ul>
<?php } $c++;
endwhile;
?>
</div></div>
<?php $a++;
endwhile;
?>

<?php endif; ?>
</div><!-- art_main end-->

</div> 
<?php $this->need('sidebar.php'); ?>
<?php $this->need('footer.php'); ?>
