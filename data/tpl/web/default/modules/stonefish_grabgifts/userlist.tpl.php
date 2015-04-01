<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style>
.sub-search input,.sub-search select{margin-bottom:0;}
 #main{margin:100px auto;}
 #main .info{line-height:20px; border-bottom:1px dashed #FC0;}
 #main .info a{color:#666; text-decoration:none; position:relative; display:block;}
 #main .info a div{display:none;}
 #main .info a:hover{ visibility:visible; color:#333;}
 #main .info a:hover div{position:absolute; left:80px; top:-50px; border:1px solid #D4D4D4;background-color:#F2F2F2; display:block; width:200px; height:180px; color:#333; overflow:hidden;text-align:left; padding:10px;z-index:99;}
 </style>
    <div class="main">
		<div class="stat">
			<div class="stat-div">
				<div class="navbar navbar-static-top">
					<div class="navbar-inner">
						<span class="brand">全民抢礼品用户管理</span>
                        <!--<div class="pull-left">
							<ul class="nav">
								<li class="active"><a href="<?php  echo create_url('site/module', array('do' => 'download', 'name' => 'stonefish_grabgifts','rid'=>$rid))?>"><i class="icon-download-alt"></i>导出全民抢礼品用户数据</a></li>								
							</ul>
						</div>-->
						<?php  if($rid!='') { ?>
						<div class="pull-left">
							<ul class="nav">
								<li class="active"><a href="<?php  echo create_url('site/module', array('do' => 'userlist', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看粉丝达人</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'sharedata', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看分享数据</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'prizedata', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看奖品数据</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'rankinglist', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看爆表排行</a></li>								
							</ul>
						</div>
						<?php  } ?>
					</div>
				</div>
				<div class="sub-item">
					<form action="" method="post">
					<div class="pull-right">
						<input class="btn btn-primary" type="submit" value="搜索">
					</div>
					<div class="pull-left">
						<input name="act" type="hidden" value="<?php  echo $_GPC['act'];?>" />
						<input name="do" type="hidden" value="<?php  echo $_GPC['do'];?>" />
						微信昵称：<input type="text" class="span2 kw" name="keywordnickname" value="<?php  echo $_GPC['keywordnickname'];?>" placeholder="请输入微信昵称"><?php  if($rid=='') { ?>
						规则ID：<input type="text" class="span2 kw" name="keywordid" value="<?php  echo $_GPC['keywordid'];?>" placeholder="请输入规则ID"><?php  } ?>
					</div>
					</form>
				</div>
	
				<div class="sub-item" id="table-list">
					<h4 class="sub-title">全民抢礼品用户详细数据  |  总数:<?php  echo $total;?></h4>
					<form action="" method="post" onsubmit="">
					<div class="sub-content">
						<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:40px;" class="row-first">选择</td>
									<th style="width:50px;">头像</th>	
									<th style="width:150px;">昵称</th>
									<th>from_user</th>
									<?php  if($rid=='') { ?><th style="width:50px;">规则</th><?php  } ?>	
									<th style="width:60px;" class="row-hover">邀请值</th>
									<th style="width:60px;" class="row-hover">人气值</th>
									<th style="width:150px;">注册/分享时间</th>
									<th style="width:60px;">操作</th>
								</tr>
							</thead>
							<tbody id="main">
							<?php  $i=1;?>
								<?php  if(is_array($list_praise)) { foreach($list_praise as $row) { ?>
								<tr>
									<td class="row-first"><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
									<td><img src="<?php  echo $row['avatar'];?>" width="50px;"/></td>
									<td class="info"><a href="javascript:void(0);"><?php  echo $row['nickname'];?><div><?php  if(!empty($row['realname'])) { ?>姓名：<?php  echo $row['realname'];?><br/><?php  } ?><?php  if(!empty($row['mobile'])) { ?>电话：<?php  echo $row['mobile'];?><br/><?php  } ?><?php  if(!empty($row['weixin'])) { ?>微信号：<?php  echo $row['weixin'];?><br/><?php  } ?><?php  if(!empty($row['qqhao'])) { ?>QQ号：<?php  echo $row['qqhao'];?><br/><?php  } ?><?php  if(!empty($row['email'])) { ?>邮箱：<?php  echo $row['email'];?><br/><?php  } ?><?php  if(!empty($row['address'])) { ?>地址：<?php  echo $row['address'];?><br/><?php  } ?></div></a></td>				
									<td><?php  echo $row['from_user'];?></td>
									<?php  if($rid=='') { ?><td><a href="<?php  echo create_url('site/module/userlist', array('name' => 'stonefish_grabgifts','id'=>$row['rid']))?>"><?php  echo $row['rid'];?></a></td><?php  } ?>
									<td class="row-hover"><?php  echo $row['yaoqingnum'];?></td>
									<td class="row-hover"><a href="<?php  echo create_url('site/module/sharedata', array('name' => 'stonefish_grabgifts','uid' => $row['id'], 'rid' => $row['rid']))?>"><?php  echo $row['sharenum'];?></a></td>
									<td><?php  echo date('Y-m-d H:i:s', $row['datatime']);?></br><?php  echo date('Y-m-d H:i:s', $row['sharetime']);?></td>
									<td style="width:60px;font-size:12px; color:#666;">
														<?php  if($row['status']) { ?>
					<a href="<?php  echo create_url('site/module/dos', array('name' => 'stonefish_grabgifts','rid' => $row['rid'], 'id' => $row['id'], 'ac' => 'userlist', 'status' => 0))?>" class="">未屏蔽</a>
				<?php  } else { ?>
					<a href="<?php  echo create_url('site/module/dos', array('name' => 'stonefish_grabgifts','rid' => $row['rid'], 'id' => $row['id'], 'ac' => 'userlist','status' => 1))?>" class="">已屏蔽</a>
				<?php  } ?>
									</td>
								</tr>
								<?php  $i++;?>
								<?php  } } ?>
							</tbody>
						</table>
						<table class="table">
							<tr>
								<td style="width:40px;" class="row-first"><input type="checkbox" onclick="selectall(this, 'select');" /></td>
								<td>
									<input type="submit" name="delete" value="删除" class="btn btn-primary" />
									<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
								</td>
							</tr>
						</table>
					</div>
				</form>
				<?php  echo $pager;?>
				</div>
			</div>
		</div>
    </div>

<script>
$(function() {
	//详细数据相关操作
	var tdIndex;
	$("#table-list thead").delegate("th", "mouseover", function(){
		if($(this).find("i").hasClass("")) {
			$("#table-list thead th").each(function() {
				if($(this).find("i").hasClass("icon-sort")) $(this).find("i").attr("class", "");
			});
			$("#table-list thead th").eq($(this).index()).find("i").addClass("icon-sort");
		}
	});
	$("#table-list thead th").click(function() {
		if($(this).find("i").length>0) {
			var a = $(this).find("i");
			if(a.hasClass("icon-sort") || a.hasClass("icon-caret-up")) { //递减排序
				/*
					数据处理代码位置
				*/
				$("#table-list thead th i").attr("class", "");
				a.addClass("icon-caret-down");
			} else if(a.hasClass("icon-caret-down")) { //递增排序
				/*
					数据处理代码位置
				*/
				$("#table-list thead th i").attr("class", "");
				a.addClass("icon-caret-up");
			}
			$("#table-list thead th,#table-list tbody:eq(0) td").removeClass("row-hover");
			$(this).addClass("row-hover");
			tdIndex = $(this).index();
			$("#table-list tbody:eq(0) tr").each(function() {
				$(this).find("td").eq(tdIndex).addClass("row-hover");
			});
		}
	});
});
</script>
<?php  include $this->template('common/footer', TEMPLATE_INCLUDEPATH);?>