<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div class="specialpost s_clear">
<div class="specialinfo">
<h4><label for="affirmpoint">正方:</label></h4>
<div><textarea name="affirmpoint" id="affirmpoint" class="txtarea" tabindex="1"><?=$debate['affirmpoint']?></textarea></div>
<h4><label for="negapoint">反方:</label></h4>
<div><textarea name="negapoint" id="negapoint" class="txtarea" tabindex="1"><?=$debate['negapoint']?></textarea></div>
</div>
<div class="specialaddons">
<label for="endtime">结束时间:</label>
<p class="hasdropdownbtn">
<input onclick="InFloat=InFloat_Editor;showcalendar(event, this, true)" type="text" autocomplete="off" id="endtime" name="endtime" class="txt" value="<?=$debate['endtime']?>" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat=InFloat_Editor;showselect(this, 'endtime')">^</a>
</p>
<label for="umpire">裁判:</label>
<p><input type="text" id="umpire" class="splonginput txt" name="umpire" onblur="checkuserexists(this.value, 'checkuserinfo')" value="<?=$debate['umpire']?>" tabindex="1" /></p>
<span id="checkuserinfo"></span>
</div>
</div>

<script type="text/javascript" reload="1">
function checkuserexists(username, objname) {
if(!username) {
$(objname).innerHTML = '';
return;
}
var x = new Ajax();
username = is_ie && document.charset == 'utf-8' ? encodeURIComponent(username) : username;
x.get('ajax.php?inajax=1&action=checkuserexists&username=' + username, function(s){
var obj = $(objname);
obj.innerHTML = s;
});
}
</script>
</div></div>