<?php defined('IN_IA') or exit('Access Denied');?><?php  include $this->template('common/header', TEMPLATE_INCLUDEPATH);?>
<style>
.sub-search input,.sub-search select{margin-bottom:0;}
 </style>
    <div class="main">
		<div class="stat">
			<div class="stat-div">
				<div class="navbar navbar-static-top">
					<div class="navbar-inner">
						<span class="brand">全民抢礼品爆表排行榜管理</span>
                        <!--<div class="pull-left">
							<ul class="nav">
								<li class="active"><a href="<?php  echo create_url('site/module', array('do' => 'download', 'name' => 'stonefish_chailihe','rid'=>$rid))?>"><i class="icon-download-alt"></i>导出全民抢礼品爆表排行榜数据</a></li>								
							</ul>
						</div>-->
						<?php  if($rid!='') { ?>
						<div class="pull-left">
							<ul class="nav">
								<li><a href="<?php  echo create_url('site/module', array('do' => 'userlist', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看粉丝达人</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'sharedata', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看分享数据</a></li>
								<li><a href="<?php  echo create_url('site/module', array('do' => 'prizedata', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看奖品数据</a></li>
								<li class="active"><a href="<?php  echo create_url('site/module', array('do' => 'rankinglist', 'name' => 'stonefish_grabgifts','id'=>$rid))?>">查看爆表排行</a></li>								
							</ul>
						</div>
						<?php  } ?>						
					</div>
				</div>			
	
				<div class="sub-item" id="table-list">
					<h4 class="sub-title">全民抢礼品用户详细数据  |  总数:<?php  echo $total;?></h4>
					<form action="" method="post" onsubmit="">
					<div class="sub-content">
						<table class="table table-hover">
							<thead class="navbar-inner">
								<tr>
									<th style="width:50px;" class="row-first row-hover">排行</th>	
									<th style="width:50px;">头像</th>	
									<th style="width:150px;">昵称</th>
									<th>from_user</th>
									<?php  if($rid=='') { ?><th style="width:40px;">规则</th><?php  } ?>
									<th style="width:60px;">邀请值</th>
									<th style="width:60px;">人气值</th>
									<th style="width:150px;">注册/分享时间</th>
									<th style="width:60px;">状态</th>
								</tr>
							</thead>
							<tbody id="main">
							<?php  $i=1;?>
								<?php  if(is_array($list_praise)) { foreach($list_praise as $row) { ?>
								<tr>
									<td class="row-first row-hover"><?php  echo $i+(($page-1)*$psize)?></td>
									<td><img src="<?php  echo $row['avatar'];?>" width="50px;"/></td>
									<td class="info"><?php  echo $row['nickname'];?></td>
									<td><?php  echo $row['from_user'];?></td>
									<?php  if($rid=='') { ?><td><a href="<?php  echo create_url('site/module/rankinglist', array('name' => 'stonefish_grabgifts','id'=>$row['rid']))?>"><?php  echo $row['rid'];?></a></td><?php  } ?>
									<td><?php  echo $row['yaoqingnum'];?></td>
									<td><a href="<?php  echo create_url('site/module/sharedata', array('name' => 'stonefish_grabgifts','uid' => $row['id'], 'rid' => $row['rid']))?>"><?php  echo $row['sharenum'];?></a></td>
									<td><?php  echo date('Y-m-d H:i:s', $row['datatime']);?></br><?php  echo date('Y-m-d H:i:s', $row['sharetime']);?></td>
									<td style="width:60px;font-size:12px; color:#666;"><?php  if($row['status']) { ?>未屏蔽<?php  } else { ?>已屏蔽<?php  } ?></td>
								</tr>
								<?php  $i++;?>
								<?php  } } ?>
							</tbody>
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