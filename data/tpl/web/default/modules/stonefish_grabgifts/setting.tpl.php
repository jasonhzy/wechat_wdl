<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<div class="main">
	<form action="" method="post" class="form-horizontal form">
		<h4>全民抢礼品高级认证设置<small>如果你的公众号没有oauth2接口权限，可以借用别人的接口权限使用。</small></h4>
		<table class="tb">
		　　<tr>
				<th>AppId：</th>
				<td><input type="text" name="appid" class="span3" value="<?php  echo $settings['appid'];?>" /></td>
		　　</tr>
			<tr>
				<th>AppSecret：</th>
				<td><input type="text" name="secret" class="span5" value="<?php  echo $settings['secret'];?>" /></td>
			</tr>			
			<tr>
				<th colspan="2">
					<div class="help-block">借用说明：必需设置借用高级认证号的OAuth2.0网页授权的回调域名为你公众号第三方平台的全域名。如：你的微动力域名为：www.b2ctui.com ，你必需让借用高级认证号设置OAuth2.0网页授权的回调域名为:www.b2ctui.com</div>
				</th>
			</tr>
			<tr>
				<th colspan="2">
					<input name="submit" type="submit" value="提交" class="btn btn-primary span3" />
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</th>
			</tr>
			<tr>
				<th colspan="2">
					<div class="help-block">使用的AppId和AppSecret在功能-高级功能-开发模式-开发者凭据中，可以找到。这个也是借用的高级证号</div>
				</th>
			</tr>
			<tr>
				<th colspan="2"><img src="./source/modules/stonefish_grabgifts/template/images/appidappsecret.jpg"></th>
			</tr>			
		</table>
	</form>
</div>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>