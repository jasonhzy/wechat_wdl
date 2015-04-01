<?php defined('IN_IA') or exit('Access Denied');?><?php  if(empty($item)) { ?>
<?php  $namesuffix = '-new[(wrapitemid)]';?>
<?php  $namesuffixid = '-new(wrapitemid)';?>
<?php  $itemid = '(itemid)';?>
<?php  } else { ?>
<?php  $namesuffix = '['.$item['id'].']';?>
<?php  $namesuffixid = $item['id'];?>
<?php  $itemid = 'ccc-item-' . $item['id'];?>
<?php  } ?>

<div class="alert alert-info reply-market-list" id="prize_list_div">
	<table class="tb reply-news-edit">
		<tr>
			<th>奖品类型：</th>
			<td id="award-inkind">
				<span class="pull-right"><?php  if(empty($item)) { ?><a href="javascript:;" onclick="doDeleteItem('<?php  echo $itemid;?>')">删除</a><?php  } ?></span>
				<label for="radio_1_<?php  echo $itemid;?>" class="radio inline" data-placement="bottom" data-toggle="popover" data-content="领奖需后台确认，适用于O2O" data-original-title="" style="width:50px;"><input type="radio" name="award-inkind<?php  echo $namesuffix;?>" id="radio_1_<?php  echo $itemid;?>" value="1" <?php  if($item['inkind'] == 1) { ?> checked="checked"<?php  } ?><?php  if(!empty($item)) { ?> disabled=true<?php  } ?> /> 实物</label><label for="radio_0_<?php  echo $itemid;?>" class="radio inline" data-placement="bottom" data-toggle="popover" data-content="粉丝自主领奖无需后台确认，适用于普通卡密发放" data-original-title="" style="margin-left:0; width:70px;"><input type="radio" name="award-inkind<?php  echo $namesuffix;?>" id="radio_0_<?php  echo $itemid;?>" value="0" <?php  if($item['inkind'] == 0) { ?> checked="checked"<?php  } ?><?php  if(!empty($item)) { ?> disabled=true<?php  } ?> /> 卡密</label>
			</td>
		</tr>		
		<tr>
			<th>邀请人数：</th>
			<td><div class="input-prepend input-append">
                    <span class="add-on">需要邀请</span>
                    <input type="text" class="span1" name="award-break<?php  echo $namesuffix;?>" id="award-break<?php  echo $namesuffix;?>" value="<?php  echo $item['break'];?>" />
                    <span class="add-on">位朋友参与活动可领取此奖品</span>
                </div>		
			</td>
		</tr>		
		<tr>
			<th>奖品名称：</th>
			<td>
				<input type="text" value="<?php  echo $item['title'];?>" style="width:385px;" name="award-title<?php  echo $namesuffix;?>" placeholder="填写奖品名称">				
				<label <?php  if($item['inkind'] == 0) { ?>style="display:none;"<?php  } else { ?>style="display:inline-block;"<?php  } ?> class="num"> 奖品数量：<input type="text" value="<?php  echo $item['total'];?>" style="width:53px;" name="award-total<?php  echo $namesuffix;?>"></label>
			</td>
		</tr>
		<tr>
			<th>奖品描述：</th>
			<td>
				<textarea style="height:100px;" class="span7 richtext-clone" name="award-description<?php  echo $namesuffix;?>" cols="70" id="reply-add-text"  placeholder="填写奖品描述，颜色、类型、规格等以及商家广告等第二次编辑可以图文排版"><?php  echo $item['description'];?></textarea>				
			</td>
		</tr>
		<?php  if($item['inkind'] == 0) { ?>
		<tr>
			<th>兑 换 码：</th>
			<td>
				<textarea style="height:80px;" class="span7" cols="70" id="" name="award-activation-code<?php  echo $namesuffix;?>" placeholder="填写兑换码或者其他密文类SN码，一行一个"><?php  echo $item['activation_code'];?></textarea>
			</td>
		</tr>
		<tr>
			<th>兑换方式：</th>
			<td>
				<input type="text" id="" class="span7" value="<?php  echo $item['activation_url'];?>" name="award-activation-url<?php  echo $namesuffix;?>" placeholder="填写激活地址或者其他领奖方法">
			</td>
		</tr>
		<?php  } ?>
		<tr>
			<th>兑换密码：</th>
			<td>
				<input type="text" id="" class="span7" value="<?php  echo $item['awardpass'];?>" name="award-pass<?php  echo $namesuffix;?>" placeholder="手机端兑奖密码">
			</td>
		</tr>
		<?php  if(!empty($item)) { ?>
		<tr>
			<th>奖品图片：</th>
			<td><div style="display:block; margin-top:5px;" class="input-append">
						<input type="text" value="<?php  echo $item['awardpic'];?>" name="awardpic<?php  echo $namesuffix;?>" id="upload-image-url-awardpic<?php  echo $namesuffixid;?>" class="span3" autocomplete="off">
						<input type="hidden" value="<?php  echo $item['awardpic'];?>" name="awardpic<?php  echo $namesuffixid;?>_old" id="upload-image-url-awardpic<?php  echo $namesuffixid;?>-old">
						<button class="btn" type="button" id="upload-image-awardpic<?php  echo $namesuffixid;?>">选择图片</button>
						</div>
						<div id="upload-image-preview-awardpic<?php  echo $namesuffixid;?>" style="margin-top:10px;"><img src="<?php  echo $_W['attachurl'];?><?php  echo $item['awardpic'];?>" width="180" /></div><div class="help-block">奖品图片建议尺寸：900像素 * 500像素</div>
			
			</td>
		</tr>
		<?php  } else { ?>
		<tr>
			<th>奖品图片：</th>
			<td>
			<div class="fileupload fileupload-new item-image" tabindex="-1" data-provides="fileupload" style='margin-top:5px;width:425px;'>
       		<div id="thumb0_span" tabindex="-1" class="fileupload-preview thumbnail" style="float:left;;width: 180px; height: 180px;">
           	    <img src="./source/modules/stonefish_chailihe/template/images/award.jpg" width="180" /></div>
      		    <div style='float:left;margin-left:5px;'>
           		    <span class="btn btn-file">
                  	<span class="fileupload-new">选择图片</span><span class="fileupload-exists">更改</span><input name="awardpic<?php  echo $namesuffixid;?>" type="file"  class='vote_img_file'/></span>
            	    <br/><a href="#" class="btn fileupload-exists" data-dismiss="fileupload" style='margin-top:5px'>移除</a>
        		</div>   		     
			</div>			
			</td>
		</tr>
		<?php  } ?>
	</table>
</div>
