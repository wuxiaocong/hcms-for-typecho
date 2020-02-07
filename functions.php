<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $ttitle= new Typecho_Widget_Helper_Form_Element_Text('ttitle', NULL, NULL, _t('站点副标题'));
    $form->addInput($ttitle);
    
$run_style = new Typecho_Widget_Helper_Form_Element_Radio('run_style',
    array('0' => _t('酷炫黑'),
        '1' => _t('清新蓝')),
    '0', _t('风格选择'));
$form->addInput($run_style);
    $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('Showhdp' => _t('显示幻灯片'),
    'Showsns' => _t('显示SNS'),
    'Showcms' => _t('显示CMS'),),
    array('Showhdp', 'Showcms', 'Showsns'), _t('首页设置'));
    $form->addInput($sidebarBlock->multiMode());
    $cmslist = new Typecho_Widget_Helper_Form_Element_Text('cmslist', NULL, NULL, _t('CMS列表'), _t('输入分类id，使用,隔离。'));
    $form->addInput($cmslist);
    $hdplist = new Typecho_Widget_Helper_Form_Element_Text('hdplist', NULL, NULL, _t('幻灯片列表'), _t('输入文章id，使用,隔离。'));
    $form->addInput($hdplist);
    $sidead = new Typecho_Widget_Helper_Form_Element_Textarea('sidead', null, NULL, _t('侧边栏公告'), _t('放放广告啥的'));
    $form->addInput($sidead);
    $sns = new Typecho_Widget_Helper_Form_Element_Textarea('sns', null, NULL, _t('SNS代码'), _t('默认代码可以看文档'));
    $form->addInput($sns);
}

function cmslist($num) {
    $options = Typecho_Widget::widget('Widget_Options');
        if (!empty($options->cmslist)) {
            $text = $options->cmslist;
            $fa_arr = explode(",", $text);
            return $fa_arr[$num];
        }
        else {
            $text='';
            return $text;
        }
}

function pContent($obj){
    $options = Typecho_Widget::widget('Widget_Options');
    $obj->content = preg_replace("/<img src=\"([^\"]*)\" alt=\"([^\"]*)\" title=\"([^\"]*)\">/i", "<a href=\"\\1\" data-lightbox=\"img\" data-title=\"\\3\"><img src=\"\\1\" alt=\"\\2\" title=\"\\3\"></a>", $obj->content);
    $obj->content = preg_replace("/<a href=\"([^\"]*)\">/i", "<a href=\"\\1\" rel=\"nofollow\" target=\"_blank\">", $obj->content);
    echo trim($obj->content);
}

function get_post_view($archive) {
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
            
        }
    }
    echo $row['views'];
}
function thumb($cid) {
if (empty($imgurl)) {
$imgurl = "/usr/themes/hcms/images/log/".rand(1,5).".jpg";
}
$db = Typecho_Db::get();
$rs = $db->fetchRow($db->select('table.contents.text')
->from('table.contents')
->where('table.contents.type = ?', 'attachment')
->where('table.contents.parent= ?', $cid)
->order('table.contents.cid', Typecho_Db::SORT_ASC)
->limit(1));
$img = unserialize($rs['text']);
if (empty($img)){
return $imgurl;
}
else{
return $img['path'];
}
}
function getHotComments($limit = 10){
	$db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
		->where('status = ?','publish')
		->where('type = ?', 'post')
		->where('created <= unix_timestamp(now())', 'post') //添加这一句避免未达到时间的文章提前曝光
		->limit($limit)
		->order('commentsNum', Typecho_Db::SORT_DESC)
	);
	if($result){
		foreach($result as $val){			
			$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_title = htmlspecialchars($val['title']);
			$permalink = $val['permalink'];
			echo '<li><a href="'.$permalink.'" title="'.$post_title.'">'.$post_title.'</a></li>';		
		}
	}
}
function getRandomPosts($limit = 10){    
    $db = Typecho_Db::get();
    $result = $db->fetchAll($db->select()->from('table.contents')
		->where('status = ?','publish')
		->where('type = ?', 'post')
		->where('created <= unix_timestamp(now())', 'post')
		->limit($limit)
		->order('RAND()')
	);
	if($result){
		$i=1;
		foreach($result as $val){
			if($i<=3){
				$var = ' class="red"';
			}else{
				$var = '';
			}
			$val = Typecho_Widget::widget('Widget_Abstract_Contents')->push($val);
			$post_title = htmlspecialchars($val['title']);
			$permalink = $val['permalink'];
			echo '<li><a href="'.$permalink.'" title="'.$post_title.'">'.$post_title.'</a></li>';
			$i++;
		}
	}
}
function getcagename($id){
	if($id){
      	$getid = explode(',',$id);	
		$db = Typecho_Db::get();
		$result = $db->fetchAll($db->select()->from('table.metas')
			->where('mid in ?',$getid)
			->order('mid', Typecho_Db::SORT_DESC)		
		);
		if($result){
			foreach($result as $val){				
				$val = Typecho_Widget::widget('Widget_Metas_Category_List')->push($val);
				$name = $val['name'];
				echo $name;
			}}
		}
}
function getcageurl($id){
	if($id){
      	$getid = explode(',',$id);	
		$db = Typecho_Db::get();
		$result = $db->fetchAll($db->select()->from('table.metas')
			->where('mid in ?',$getid)
			->order('mid', Typecho_Db::SORT_DESC)		
		);
		if($result){
			foreach($result as $val){				
				$val = Typecho_Widget::widget('Widget_Metas_Category_List')->push($val);
				$url = $val['permalink'];
				echo $url;
			}}
		}
}
 function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
 
<ol class="commentlist">
  <li class="comment even thread-even depth-1" id="<?php $comments->theId(); ?>">
        <div id="div-comment-7" class="comment-body">
          <a name="<?php $comments->theId(); ?>"></a>
	<div class="comment-author vcard"><?php
            //头像CDN by Rich
            $host = 'https://dn-qiniu-avatar.qbox.me/avatar/'; //自定义头像CDN服务器
            $url = '/avatar/'; //自定义头像目录,一般保持默认即可
            $size = '40'; //自定义头像大小
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
            ?><img src="<?php echo $avatar ?>" class="avatar photo" height="40" width="40" original="<?php echo $avatar ?>"><div class="floor"># 网友评论</div>
	<strong><?php $comments->author(); ?></strong>:</div>
<p><?php $comments->content(); ?></p>
			<div class="clear"></div>
			<span class="datetime"><?php $comments->date('Y-m-d H:i'); ?></span>
			<span class="reply"><?php $comments->reply(); ?></span>

	</div>
<?php if ($comments->children) { ?>
<ul class="children">
        <?php $comments->threadedComments($options); ?>
    </ul>
<?php } ?>
    </li>
</ol>
<?php } ?>