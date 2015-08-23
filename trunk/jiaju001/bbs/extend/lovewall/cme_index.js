var scrip='';
var iLayerMaxNum=10000;
var $a;
var $b="";
var $c="";
document.onmouseup=me;
document.onmousemove=ms;
var $d;
var $e;
var $curid;
function Move(Object,event) {
	scrip=Object.id;
	if(document.all) {
		document.getElementById(scrip).setCapture();
		$d=event.x-document.getElementById(scrip).style.pixelLeft;
		$e=event.y-document.getElementById(scrip).style.pixelTop;
	} else if(window.captureEvents) {
		window.captureEvents(Event.MOUSEMOVE|Event.MOUSEUP);
		$d=event.layerX;
		$e=event.layerY+110;
	};
	if(scrip!="scrip"+$a) {
		document.getElementById(scrip).style.zIndex=iLayerMaxNum;
		iLayerMaxNum=iLayerMaxNum+1;
	}
};
function ms($f) {
	if(scrip!='') {
		if(document.all) {
			document.getElementById(scrip).style.left=event.x-$d;document.getElementById(scrip).style.top=event.y-$e;
		} else if(window.captureEvents) {
			document.getElementById(scrip).style.left=($f.clientX-$d)+"px";
			document.getElementById(scrip).style.top=($f.clientY-$e)+"px";
		}
	}
};
function me($f) {
	if(scrip!='') {
		if(document.all) {
			document.getElementById(scrip).releaseCapture();scrip='';
		} else if(window.captureEvents) {
			window.captureEvents(Event.MOUSEMOVE|Event.MOUSEUP);scrip='';
		}
	}
};
function delMessage(n) {
	var $g='scrip'+n;
	document.getElementById($g).style.display='none';
	//if(n==$a) App.lock(false);
};
function searchmessage(no) {
	var b=0;
	if(no) b=no;
	else b=document.getElementById("scripNo").value;
	var n=parseInt(b);
	if(isNaN(n)||toInt(b)==-1) {
		alert("纸条编号必须为数字");
		return false;
	} else if(n<1) {
		alert("纸条编号必须为正整数");
		return false;
	};
	for(var i=0;i<sArray.length;i++) {
		if(n==sArray[i][0]) {
			var $g='scrip'+n;document.getElementById($g).style.display='block';
			dbrun(n,false,true);
			break;
		}
	};
	if(i==sArray.length) {
		var $h="get";
		var $i=document.URL.substring(0,document.URL.lastIndexOf("/"))+"/service";
		var $j='?serviceid=query&scrip='+n+"&patch="+Date.parse(new Date());
		startRequest($i+$j);
	};
	return false;
};
function afterCall($k) {
	var $l=$k.responseText;eval($l);
};
function showmessage(n) {
	if(sArray[n]!=undefined) {
		dbrun(n);
	}
};
function dbrun(id,$m,$n) {
	$a=id;
	show(true,id,$n);
};
function init() {
	console.style.display="";
	App.init(console);
	if(initno==0) return;
	if(initno<0) {
		alert("您搜索的纸条不存在！");
	} else {
		searchmessage(initno);
	}
};
function show(b,id,$n) {
	var $o=document.getElementById("messageflash");
	if(b&&(b^App.isLocked)) {
		var $p=document.getElementById("scrip"+id);
		$p.style.zIndex=200101;
		$p.firstChild.lastChild.previousSibling.innerHTML=" <a href=\"step1.jsp\">我也要发字条</a>  "+$p.firstChild.lastChild.previousSibling.innerHTML;
		if(id==initno||$n) {
			$p.style.left=353;
			$p.style.top=150;
		};
		App.lock(true);
	} else {
		var $p=document.getElementById("scrip"+$a);
		if($p.firstChild.lastChild.previousSibling.firstChild && $p.firstChild.lastChild.previousSibling.firstChild.tagName=="A") {
			$p.firstChild.lastChild.previousSibling.removeChild($p.firstChild.lastChild.previousSibling.firstChild);
		}
		$p.style.zIndex=iLayerMaxNum;
		iLayerMaxNum=iLayerMaxNum+1;
		$a=0;
		App.lock(false);
	}
};
function showSingle() {
	var j=sArray.length-1;
	var $l='<div id="scrip'+sArray[''+j+''][0]+'" class="Message" style="position:absolute; left:'+sArray[''+j+''][2]+'px;top:'+sArray[''+j+''][3]+'px;z-index:'+sArray[''+j+''][9]+'" onmousedown="Move(this, event)" ondblclick="dbrun('+sArray[''+j+''][0]+')"><div class="Style'+sArray[''+j+''][1]+'">\<div class="Num">字条编号：'+sArray[''+j+''][0]+'<img src="extend/lovewall/icon_close.gif" alt="关闭" onclick="delMessage(\''+sArray[''+j+''][0]+'\')"></div>\<p class="Detail"><img src="extend/lovewall/icon_'+sArray[j][4]+'.gif" class="Heart"/><span class="Head">'+sArray[''+j+''][5]+'</span><br />'+sArray[''+j+''][6]+'</p>\<p class="Sign">'+sArray[''+j+''][7]+'</p>\<P class="Date">'+sArray[j][8]+'</p></div></div>';
	document.getElementById("d1").innerHTML+=$l;
};
function Tip(ID,Attr) {
	document.getElementById(ID).style.display=Attr;
};
var $q;
function createXMLHttpRequest() {
	if(window.ActiveXObject) {
		$q=new ActiveXObject("Microsoft.XMLHTTP");
	} else if(window.XMLHttpRequest) {
		$q=new XMLHttpRequest();
	}
};
function startRequest($i) {
	createXMLHttpRequest();
	$q.onreadystatechange=afterRequest;
	$q.open("GET",$i,true);$q.send(null);
};
function afterRequest() {
	if($q.readyState==4) {
		if($q.status==200){
			eval($q.responseText);
		}
	}
};
function toInt($l) {
	var $r=0;
	var $s;
	for(var i=0;i<$l.length;i++) {
		$s=$l.charAt(i);
		if($s<'0'||$s>'9') {
			return -1;
		};
		$r=$r*10+($s-'0');
	};
	return $r;
};
function doit() {
	window.location.href="step1_1.jsp?s="+$c;
};
function doother() {
	window.location.href="step1_1.jsp";
};
function forward() {
	window.location.href="step1_1.jsp?c="+$b;
};
function jokeflash_DoFSCommand() {
	$t.TCallLabel("bt","loop");
};
function showLightbox(id) {
	var objOverlay = document.getElementById('overlay');
	var arrayPageSize = getPageSize();
	var arrayPageScroll = getPageScroll();
	objOverlay.style.height = (arrayPageSize[1] + 'px');
	objOverlay.style.zIndex = iLayerMaxNum;
	objOverlay.style.display = 'block';
	iLayerMaxNum++;
	var $p=document.getElementById("scrip"+id);
	$p.style.position = 'absolute';
	$p.style.zIndex = iLayerMaxNum;
	$curid = id;
}
function hideLightbox() {
	var $p=document.getElementById("scrip"+$curid);
	var objOverlay = document.getElementById('overlay');
	objOverlay = document.getElementById('overlay');
	objOverlay.style.display = 'none';
	iLayerMaxNum=iLayerMaxNum+1;
	$curid=0;
}
function getPageScroll() {

	var yScroll;

	if (self.pageYOffset) {
		yScroll = self.pageYOffset;
	} else if (document.documentElement && document.documentElement.scrollTop){
		yScroll = document.documentElement.scrollTop;
	} else if (document.body) {
		yScroll = document.body.scrollTop;
	}

	arrayPageScroll = new Array('',yScroll) 
	return arrayPageScroll;
}
function getPageSize() {
	
	var xScroll, yScroll;
	
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else {
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	
	var windowWidth, windowHeight;
	if (self.innerHeight) {	
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) {
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { 
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}	
	
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}

	if(xScroll < windowWidth){	
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}

	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
	return arrayPageSize;
}