<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<input type="hidden" name="trade" value="yes" />
<div class="specialpost s_clear">
<div class="specialinfo">
<dl>
<dt>商品图片:</dt>
<dd>
<div id="tradeattach_preview">
<? if($tradeattach['attachment']) { ?>
<a href="<?=$tradeattach['url']?>/<?=$tradeattach['attachment']?>" target="_blank">
<? if($tradeattach['thumb']) { ?>
<img class="goodsimg" src="<?=$tradeattach['url']?>/<?=$tradeattach['attachment']?>.thumb.jpg" alt="" />
<? } else { ?>
<img class="goodsimg" src="<?=$tradeattach['url']?>/<?=$tradeattach['attachment']?>" alt="" />
<? } ?>
</a>
<? } ?>
</div><? if($tradeattach['attachment']) { ?><input name="tradeaid" type="hidden" value="<?=$tradeattach['aid']?>"><? } ?>
<input type="file" name="tradeattach[]" onchange="attachpreview(this, 'tradeattach_preview', 80, 80)" tabindex="1" />
<div id="tradeattach_preview_hidden" style="position: absolute; top: -100000px; filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image'); width: 80px; height: 80px"></div>
</dd>
<dt><label for="item_name">商品名称:</label></dt>
<dd class="s_clear">
<span class="float_typeid"><input type="text" id="item_name" name="item_name" value="<?=$trade['subject']?>" class="splonginput txt" tabindex="1" /></span>
<? if($tradetypes && !empty($forum['tradetypes'])) { ?>
<span class="float_typeid">
<select id="tradetypeid" name="tradetypeid" change="ajaxget('post.php?action=threadsorts&tradetype=yes&sortid='+$('tradetypeid').value, 'tradesorts', 'tradesortswait')">
<option value="0">商品分类</option><? if(is_array($tradetypes)) { foreach($tradetypes as $typeid => $name) { if($forum['tradetypes'] == -1 || @in_array($typeid, $forum['tradetypes'])) { ?>
<option value="<?=$typeid?>"<? if($typeid == $tradetypeid) { ?> selected="selected"<? } ?>><? echo strip_tags($name);; ?></option>
<? } } } ?></select>
<? } ?>
</span>
</dd>
<dt></dt>
<dd class="float_postinfo">
<span class="float_typeid short_select">
<select id="item_quality" name="item_quality" tabindex="1">
<option value="1" <? if($trade['quality'] == 1) { ?>selected="selected"<? } ?>>全新</option>
<option value="2" <? if($trade['quality'] == 2) { ?>selected="selected"<? } ?>>二手</option>
</select>
</span>
<span class="float_typeid short_select">
<select id="item_type" name="item_type" tabindex="1">
<option value="1" <? if($trade['itemtype'] == 1) { ?>selected<? } ?>>商品</option>
<option value="2" <? if($trade['itemtype'] == 2) { ?>selected<? } ?>>服务</option>
<option value="3" <? if($trade['itemtype'] == 3) { ?>selected<? } ?>>拍卖</option>
<option value="4" <? if($trade['itemtype'] == 4) { ?>selected<? } ?>>捐赠</option>
<option value="5" <? if($trade['itemtype'] == 5) { ?>selected<? } ?>>邮费</option>
<option value="6" <? if($trade['itemtype'] == 6) { ?>selected<? } ?>>奖金</option>
</select>
</span>
</dd>
<dt><label for="item_costprice">商品原价:</label></dt>
<dd>
<span class="float_typeid"><em><input id="item_costprice" name="item_costprice" type="text" class="spmediuminput txt" value="<?=$trade['costprice']?>" tabindex="1" /></em></span>
<strong class="left"><label for="initialprice">商品现价:</label></strong>
<input id="item_price" name="item_price" class="spmediuminput txt" type="text" value="<?=$trade['price']?>" tabindex="1" />
</dd>
<dt><label for="item_number">商品数量:</label></dt>
<dd>
<input id="item_number" name="item_number" type="text" class="spmediuminput txt" value="<?=$trade['amount']?>" tabindex="1"  />
</dd>
<dt><label for="paymethod">交易方式:</label></dt>
<dd>
<span class="float_typeid">
<select id="paymethod" name="paymethod" class="spmediuminput" tabindex="1">
<option value="0" <? if(!$trade['account']) { ?>selected<? } ?>>线下交易</option>
<option value="1" <? if($trade['account']) { ?>selected<? } ?>>支付宝在线交易</option>
</select>
</span>
<strong class="left"><label for="seller">支付宝账户:</label></strong>
<input type="text" id="seller" name="seller" value="<?=$trade['account']?>" class="spmediuminput txt" tabindex="1" />
</dd>
</dl>
<div class="classifieds classifieds_narrow">
<table cellpadding="0" cellspacing="0" class="formtable">
<tbody id="tradesorts"><span id="tradesortswait"></span></tbody>
</table>
</div>
</div>
<div class="specialaddons">
<dl class="s_clear">
<dt><label for="item_locus">所在地点:</label></dt>
<dd><input id="item_locus" name="item_locus" type="text" value="<?=$trade['locus']?>" class="spmediuminput txt" tabindex="1" /></dd>
<dt><label for="transport">物流方式:</label></dt>
<dd>
<select id="transport" name="transport" onchange="$('logisticssetting').style.display = this.value == 'virtual' ? 'none' : ''" class="spmediuminput">
<option value="virtual" <? if($trade['transport'] == 3) { ?>selected<? } ?>>虚拟物品</option>
<option value="seller" <? if($trade['transport'] == 1) { ?>selected<? } ?>>卖家承担运费</option>
<option value="buyer" <? if($trade['transport'] == 2) { ?>selected<? } ?>>买家承担运费</option>
<option value="logistics" <? if($trade['transport'] == 4) { ?>selected<? } ?>>支付给物流公司</option>
</select>
</dd>
<dt></dt>
<dd id="logisticssetting" class="s_clear" style="display:<? if($trade['transport'] == 3) { ?>none<? } ?>">
<p><label for="postage_mail">平邮</label> <input id="postage_mail" name="postage_mail" type="text" class="spshortinput txt" value="<?=$trade['ordinaryfee']?>" tabindex="1" /></p>
<p><label for="postage_express">快递</label> <input id="postage_express" name="postage_express" type="text" class="spshortinput txt" value="<?=$trade['expressfee']?>" tabindex="1" /></p>
<p><label for="postage_ems">EMS</label> <input id="postage_ems" name="postage_ems" type="text" class="spshortinput txt" value="<?=$trade['emsfee']?>" tabindex="1" /></p>
</dd>
</dl>
<p><label for="item_expiration">有效期至:</label></p>
<p class="hasdropdownbtn">
<input type="text" onclick="InFloat=InFloat_Editor;showcalendar(event, this, false)" id="item_expiration" name="item_expiration" autocomplete="off" value="<?=$trade['expiration']?>" class="txt" tabindex="1" />
<a href="javascript:;" class="dropdownbtn" onclick="InFloat=InFloat_Editor;showselect(this, 'item_expiration', 1)">^</a>
</p>
</div>
</div>
<script type="text/javascript" reload="1">
loadselect('item_quality', 0, 'floatlayout_<?=$action?>');
loadselect('item_type', 0, 'floatlayout_<?=$action?>');
loadselect('paymethod', 0, 'floatlayout_<?=$action?>');
//note loadselect('transport', 0, 'floatlayout_<?=$action?>');
<? if($tradetypes && !empty($forum['tradetypes'])) { ?>
loadselect('tradetypeid', 0, 'floatlayout_<?=$action?>');
<? if($tradetypeid) { ?>
ajaxget('post.php?action=threadsorts&tradetype=yes&sortid=<?=$tradetypeid?>&pid=<?=$pid?>', 'tradesorts', 'tradesortswait');
<? } } ?>
</script>
</div>
</div>