<? if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<div style="clear: both; margin-top: 5px">
<table width="<?=TABLEWIDTH?>" align="center" style="border: #FF9200 solid 1px;">
    <tr class="header" style="background-color:#FFD297">
    <td width="25%" align="center"><b>≡ 最新图片 ≡</b></td>
    <td width="25%" align="center"><b>≡ 最新主题 ≡</b></td>
    <td width="25%" align="center"><b>≡ 最新回复 ≡</b></td>
    <td width="25%" align="center"><b>≡ 本周焦点 ≡</b></td>
    <td><div class="right"><a href="#" onclick="toggle_collapse('top10');"><img id="top10_img" src="<?=IMGDIR?>/collapsed_no.gif" border="0" alt="" /></a></td>
  </tr>

<tbody id="top10">
  <tr>
    <td align="middle" valign="bottom">
<script src="pic.php" type="text/javascript"></script>
    </td>

    <td valign="top">
     <div>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td width="24" background="images/rank.gif"></td>
          <td background="images/rankbg.gif" style="line-height:20px" valign="top">
<!--#最新主题循环开始-->
<script src="./api/javascript.php?key=bbstop_threads_1" type="text/javascript"></script>
<!--#循环结束-->
          </td>
        </tr>
      </tbody>
      </table>
     </div>
    </td>

    <td valign="top">
     <div>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td width="24" background="images/rank.gif"></td>
          <td background="images/rankbg.gif" style="line-height:20px" valign="top">
<!--#最新回复循环开始-->
<script src="./api/javascript.php?key=bbstop_threads_2" type="text/javascript"></script>
<!--#循环结束-->
          </td>
        </tr>
      </tbody>
      </table>
     </div>
    </td>

    <td valign="top">
     <div>
      <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody>
        <tr>
          <td width="24" background="images/rank.gif"></td>
          <td background="images/rankbg.gif" style="line-height:20px" valign="top">
<!--#最热贴循环开始-->
<script src="./api/javascript.php?key=bbstop_threads_3" type="text/javascript"></script>
<!--#循环结束-->
          </td>
        </tr>
      </tbody>
      </table>
     </div>
    </td>
  </tr>
</tbody>
</table>
<br />
</div>