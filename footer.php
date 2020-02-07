<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div id="footer" class="clearfix">
    <div class="con_box ">
	    	<div class="flink">
			<strong>友情链接:</strong>
		<?php Links_Plugin::output(); ?>
		<a target="_blank" title="点击此处申请友情链接" href="" class="curflink">申请友链</a>
		    	</div>
<div class="footer_bug">
<a rel="nofollow" href="<?php $this->options->feedUrl(); ?>" target="_blank">RSS订阅</a> | <a rel="nofollow" href="">关于</a> | <a rel="nofollow" href="">自定义</a> | <a rel="nofollow" href="">自定义</a></div>
    </div>
    
	<div class="copyright">
    <p>本站为个人站点，内容仅供观摩学习交流之用，将不对任何资源负法律责任。如有侵犯您的版权，请及时联系管理员，我们将尽快处理。</p>
<p class="powered">Copyright &copy; <?php $this->options->title() ?>丨驱动 : <a href="http://typecho.org" title="由Typecho强力驱动" target="_blank" rel="nofollow">Typecho</a> </p> 
<!-- /powered -->
   </div>
   
   <div class="footer_right">
      <a href=""><img src="<?php $this->options->themeUrl('images/footer_logo.jpg'); ?>" width="150" height="50" title="点击查看<?php $this->options->title() ?>的相关资料" alt="<?php $this->options->title() ?>"></a>
      </div>
<div id="shangxia">
<div id="shang" title="↑ 返回顶部"></div>
<div id="cmt" onclick="location.href='#respond'" title="我要留言"></div>
<div id="xia" title="↓ 移至底部"></div>
<div id="myrss" title="Hi! 我是小宠物，欢迎光临主人的博客，赶快订阅一下吧O(∩_∩)O~" onClick="window.open('<?php $this->options->feedUrl(); ?>','_blank');"></div>
</div>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery_cmhello.js'); ?>"></script>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/jquery.cycle.all.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/md5.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">HcmsLazyload("<?php $this->options->themeUrl('images/space.gif'); ?>");</script>
<script src="<?php $this->options->themeUrl('js/lightbox.min.js'); ?>"></script>
</body>
</html>