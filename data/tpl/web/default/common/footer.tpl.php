<?php defined('IN_IA') or exit('Access Denied');?>	<div id="footer">
		<span class="pull-left">
			<p><?php  if(empty($_W['setting']['copyright']['footerleft'])) { ?>Powered by <a href="http://www.b2ctui.com"><b>微动力</b></a> V4.12 &copy; 2014 <a href="http://www.b2ctui.com">www.b2ctui.com</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerleft'];?><?php  } ?></p>
		</span>
		<span class="pull-right">
			<p><?php  if(empty($_W['setting']['copyright']['footerright'])) { ?><a href="http://bbs.b2ctui.com">关于微动力</a>&nbsp;&nbsp;<a href="http://bbs.b2ctui.com/wiki/">微动力手册</a><?php  } else { ?><?php  echo $_W['setting']['copyright']['footerright'];?><?php  } ?>&nbsp;&nbsp;<?php  if(!empty($_W['setting']['copyright']['statcode'])) { ?><?php  echo $_W['setting']['copyright']['statcode'];?><?php  } ?></p>
		</span>
	</div>
	<div class="emotions" style="display:none;"></div>
	<script>
		<?php  if(!empty($_W['weid']) && $_W['account']['level'] == 2) { ?>
			$.post('./account.php?act=fansync');
		<?php  } ?>
	</script>
</body>
</html>