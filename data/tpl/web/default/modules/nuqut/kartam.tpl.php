<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
	<script type="text/javascript" src="./resource/script/jquery.zclip.min.js"></script>

	<div class="main">
		<div class="account">
<p>
<h4>我管理的账户:</h4>
</p>
			<div class="navbar-inner thead">
				<h4>
					<span class="pull-right">
					<a href="<?php  echo create_url('site/module', array('do' => xufei,'name' => nuqut,'weid' => $row['weid']))?>">续费</a></span>
					<span class="pull-left"><?php  echo $member['username'];?> <small>（公众号数量：<?php  echo $accountnum;?>）</small></span>
				</h4>
   等级 :       <?php  echo $member['groupid'];?>   		
   <?php  if($member['groupid']==1 ) { ?>	基础版本  <?php  } else { ?>
   开通日期：    <?php  echo date('Y-m-d H:i:s', $member['stattime']);?>      				
   到期日期：    <?php  echo date('Y-m-d H:i:s', $member['endtime']);?>  
   <?php  } ?>

			</div>

		</div>
	</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>
