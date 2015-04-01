<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style>
.sub-search input,.sub-search select{margin-bottom:0;}
</style>
    <div class="main">
		<div class="stat">
			<div class="stat-div">
				<div class="navbar navbar-static-top">
					<div class="navbar-inner">						
						<span class="brand">全民抢礼品分享数据管理</span>
						<?php  if($rid!='') { ?>
						<div class="pull-left">
							<ul class="nav">
								<li><a href="<?php  echo create_url('site/module', array('do' => 'userlist', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看粉丝达人</a></li>
								<li class="active"><a href="<?php  echo create_url('site/module', array('do' => 'sharedata', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看分享数据</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'prizedata', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看奖品数据</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'rankinglist', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看爆表排行</a></li>								
							</ul>
						</div>
						<?php  } ?>
					</div>
				</div>
	
				<div class="sub-item" id="table-list">
					<h4 class="sub-title">全民抢礼品分享详细数据  |  总数:<?php  echo $total;?></h4>
					<form action="" method="post" onsubmit="">
					<div class="sub-content">
						<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:40px;" class="row-first">选择</td>
									<th style="width:60px;">访客头像</th>
									<th style="width:150px;">访客昵称</th>
									<th style="width:60px;">状态</th>
									<?php  if($rid=='') { ?><th style="width:40px;">规则</th><?php  } ?>
									<th style="width:150px;">分享人昵称</th>									
									<th>访客openid</th>
									<th style="width:100px;">访客IP</th>
									<th style="width:150px;" class="row-hover">访问时间</th>
									<th style="width:60px;">操作</th>
								</tr>
							</thead>
							<tbody>
								<?php  if(is_array($list_praisedata)) { foreach($list_praisedata as $row) { ?>
								<tr>
									<td class="row-first"><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
									<td><img src="<?php  echo $row['avatar'];?>" width="50px;"/></td>
									<td><?php  echo $row['nickname'];?></td>	
									<td><?php  if($row['isin']==4) { ?><font color="red">邀请参与</font><?php  } else if($row['isin']==3) { ?><font color="blue">好友助威</font><?php  } else if($row['isin']==2) { ?><font color="green">参与访问</font><?php  } else if($row['isin']==1) { ?><font color="purple">参与互访</font><?php  } else if($row['isin']==-1) { ?><font color="brown">未参互访</font><?php  } else { ?>未参与<?php  } ?></td>
									<?php  if($rid=='') { ?><td><a href="<?php  echo create_url('site/module/sharedata', array('name' => 'stonefish_grabgifts','id'=>$row['rid']))?>"><?php  echo $row['rid'];?></a></td><?php  } ?>
									<td><?php  echo $row['fnickname'];?></td>									
									<td><?php  echo $row['from_user'];?></td>
									<td><?php  echo $row['visitorsip'];?></td>
									<td><?php  echo date('Y-m-d H:i:s', $row['visitorstime']);?></td>
									<td style="width:40px;font-size:12px; color:#666;">	
					<a href="<?php  echo create_url('site/module/deldata', array('name' => 'stonefish_grabgifts','rid' => $row['rid'], 'id' => $row['id'], 'status' => 0))?>" class="">删除</a>
									</td>
								</tr>
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