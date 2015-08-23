<? if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('header'); ?>
<input type="hidden" name="selecttypeid" size="45" value="<?=$selecttypeid?>" />
<table cellspacing="0" cellpadding="0" width="100%">
<? if($forum['threadtypes']['expiration'][$selecttypeid]) { ?>
	<tr><th>信息有效期(必填)</th>
		<td>
			<select name="typeexpiration">
				<option value="259200">3天</option>
				<option value="432000">5天</option>
				<option value="604800">7天</option>
				<option value="2592000">1个月</option>
				<option value="7776000">3个月</option>
				<option value="15552000">半年</option>
				<option value="31536000">1年</option>
			</select>
		</td>
	</tr>
<? } if(is_array($optionlist)) { foreach($optionlist as $optionid => $option) { ?><tr>
	<th><?=$option['title']?>
	<? if($option['maxnum']) { ?>
		(最大值 <?=$option['maxnum']?>)
	<? } ?>
	<? if($option['minnum']) { ?>
		(最小值 <?=$option['minnum']?>)
	<? } ?>
	<? if($option['maxlength']) { ?>
		(最大长度 <?=$option['maxlength']?>)
	<? } ?>
	<? if($option['required']) { ?>
		(必填)
	<? } ?>
	<? if($option['unchangeable']) { ?>
		(不可修改)
	<? } ?>
	<? if($option['description']) { ?><br /><?=$option['description']?><? } ?>
	</th>
	<td>
		<? if(in_array($option['type'], array('number', 'text', 'email', 'calendar', 'image', 'url'))) { ?>
			<? if($option['type'] == 'calendar') { ?>
				<script src="include/javascript/calendar.js" type="text/javascript"></script>
				<input type="text" name="typeoption[<?=$option['identifier']?>]" size="45" value="<?=$option['value']?>" onclick="showcalendar(event, this, false)" <?=$option['unchangeable']?> />
			<? } else { ?>
				<input type="text" name="typeoption[<?=$option['identifier']?>]" size="45" value="<?=$option['value']?>" <?=$option['unchangeable']?> />
			<? } ?>
		<? } elseif(in_array($option['type'], array('radio', 'checkbox', 'select'))) { ?>
			<? if($option['type'] == 'select') { ?>
				<select name="typeoption[<?=$option['identifier']?>]" <?=$option['unchangeable']?>><? if(is_array($option['choices'])) { foreach($option['choices'] as $id => $value) { ?><option value="<?=$id?>" <?=$option['value'][$id]?>><?=$value?></option><? } } ?></select>
			<? } elseif($option['type'] == 'radio') { if(is_array($option['choices'])) { foreach($option['choices'] as $id => $value) { ?><input type="radio" class="radio" name="typeoption[<?=$option['identifier']?>]" size="45" value="<?=$id?>" <?=$option['value'][$id]?> <?=$option['unchangeable']?>> <?=$value?><? } } } elseif($option['type'] == 'checkbox') { if(is_array($option['choices'])) { foreach($option['choices'] as $id => $value) { ?><input type="checkbox" class="checkbox" name="typeoption[<?=$option['identifier']?>][]" size="45" value="<?=$id?>" <?=$option['value'][$id][$id]?> <?=$option['unchangeable']?>> <?=$value?><? } } } ?>
		<? } elseif(in_array($option['type'], array('textarea'))) { ?>
			<textarea name="typeoption[<?=$option['identifier']?>]" rows="10" cols="20" style="width:99%; height:60px" <?=$option['unchangeable']?>><?=$option['value']?></textarea>
		<? } ?>
	</td>
	</tr><? } } ?></table>
<? include template('footer'); ?>
