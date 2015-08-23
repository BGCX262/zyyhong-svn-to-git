<?php
require_once(dirname(__FILE__)."/../config.php");
CheckPurview('story_New');
require_once(dirname(__FILE__)."/../../include/inc_photograph.php");
require_once(dirname(__FILE__)."/../../include/pub_oxwindow.php");
require_once(dirname(__FILE__)."/../inc/inc_archives_functions.php");

if( empty($chapterid)
|| (!empty($addchapter) && !empty($chapternew)) )
{
	if(empty($chapternew))
	{
		 ShowMsg("由于你发布的内容没选择章节，系统拒绝发布！","-1");
		 exit();
	}
	$dsql = new DedeSql();
	$row = $dsql->GetOne("Select * From #@__story_chapter where bookid='$bookid' order by chapnum desc");
	if(is_array($row)) $nchapnum = $row['chapnum']+1;
	else $nchapnum = 1;
	$query = "INSERT INTO `#@__story_chapter`(`bookid`,`catid`,`chapnum`,`memberid`,`chaptername`,`bookname`)
            VALUES ('$bookid', '$catid', '$nchapnum', '0', '$chapternew','$bookname');";
	$rs = $dsql->ExecuteNoneQuery($query);
	if($rs){
		$chapterid = $dsql->GetLastID();
	}
	else
  {
  	ShowMsg("增加章节失败，请检查原因！","-1");
		exit();
  }
}else
{
	$dsql = new DedeSql();
}

//获得父栏目
$nrow = $dsql->GetOne("Select * From #@__story_catalog where id='$catid' ");
$bcatid = $nrow['pid'];
$booktype = $nrow['booktype'];

$addtime = time();


//本章最后一个漫画的排列顺次序
$lrow = $dsql->GetOne("Select sortid From #@__story_content where bookid='$bookid' And chapterid='$chapterid' order by sortid desc");
if(empty($lrow)) $sortid = 1;
else $sortid = $lrow['sortid']+1;

//处理上传的图片

if(!isset($isremote)) $isremote = 0;
//$bigpic = UploadOneImage('bigpic',$bigpicname,$ddisremote);

$adminID = $cuserLogin->getUserID();

$postnum = 0;
for($i=1;$i<=$photonum;$i++)
{
  $bigpic = UploadOneImage('imgfile'.$i,${'imgurl'.$i},$isremote);
  if($bigpic!=''){
     $titlen = ${'title'.$i};
     if(empty($titlen)) $titlen = ${'title'};
     $inQuery = "
       INSERT INTO `#@__story_content`(`title`,`bookname`,`chapterid`,`catid`,`bcatid`,`booktype`,`bookid`,`sortid`,
      `memberid`,`bigpic`,`body`,`addtime`,`adminid` )
     VALUES ('$titlen','$bookname', '$chapterid', '$catid','$bcatid','$booktype', '$bookid','$sortid', '0', '$bigpic' , '', '$addtime','$adminID');";
     $rs = $dsql->ExecuteNoneQuery($inQuery);
     //if(!$rs) echo $inQuery."<hr>\r\n";
     if($rs){
     	 $sortid++;
     	 $postnum++;
     }
   }
}

$arcID = $dsql->GetLastID();


//更新图书的内容数
$row = $dsql->GetOne("Select count(id) as dd From #@__story_content  where bookid = '$bookid' ");
$dsql->ExecuteNoneQuery("Update #@__story_books set postnum='{$row['dd']}',lastpost='".time()."' where id='$bookid' ");
//更新章节的内容数
$row = $dsql->GetOne("Select count(id) as dd From #@__story_content  where bookid = '$bookid' And chapterid='$chapterid' ");
$dsql->ExecuteNoneQuery("Update #@__story_chapter set postnum='{$row['dd']}' where id='$chapterid' ");

if(empty($arcID)){
	ShowMsg("没成功保存任何图片，可能是系统有问题！","-1");
	exit();
}

//生成HTML
//---------------------------------

//$artUrl = MakeArt($arcID,true,true);
if($artcontentUrl=="") $artcontentUrl = $cfg_book_url."/show-photo.php?id=$arcID&bookid=$bookid&chapterid=$chapterid";


require_once(dirname(__FILE__).'/../../include/inc_arcbook_view.php');
$bv = new BookView($bookid,'book');
$artUrl = $bv->MakeHtml();
$bv->Close();

//---------------------------------
//返回成功信息
//----------------------------------
$msg = "
　　请选择你的后续操作：
<a href='../story_add_photo.php?bookid={$bookid}'><u>继续发布</u></a>
&nbsp;&nbsp;
<a href='$artUrl' target='_blank'><u>预览漫画</u></a>
&nbsp;&nbsp;
<a href='$artcontentUrl' target='_blank'><u>预览内容</u></a>
&nbsp;&nbsp;
<a href='../story_list_content.php?bookid={$bookid}'><u>本书所有内容</u></a>
&nbsp;&nbsp;
<a href='../story_books.php'><u>管理所有图书</u></a>
";

$wintitle = "成功发布图片！";
$wecome_info = "连载管理::发布图片";
$win = new OxWindow();
$win->AddTitle("成功发布图片：");
$win->AddMsgItem($msg);
$winform = $win->GetWindow("hand","&nbsp;",false);
$win->Display();

ClearAllLink();
?>