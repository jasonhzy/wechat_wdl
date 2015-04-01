<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
	<script type="text/javascript" src="./resource/script/jquery.zclip.min.js"></script>

	<div class="main">
		<div class="account">
		<p>
<h4>我的账户金额:</h4>
</p>
        <div class="navbar-inner thead">
		
        <h4>
<span class="pull-left">用户余额：<font color="#FF0000"><?php  echo $money['money'];?></font>元</span><br>
<span class="pull-left">已使用金额：<font color="#FF0000"><?php  echo $money['usemoney'];?></font>元</span>
</h4>
<br/>
	</div>
		</div>
	</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
