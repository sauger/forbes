<?php
/*
 * public function
 */
if (!function_exists('linux_path')){
	function linux_path($path){
		return str_replace("\\","/",$path);
	} 
}

define(LIB_PATH, linux_path(dirname(__FILE__)) .'/');

function debug_info($msg,$type='php') {
	if(get_config('debug_tag') === false){
		return;
	};
	if($type == 'php'){
		echo '<font style="color:red;">' .$msg .'</font>';
	}else
	{
		alert($msg);
	}
}
	
define("ROOT_PATH", "/");
function redirect($url, $type='js')
{
  if($type == 'js'){
	 echo "<script LANGUAGE=\"Javascript\">"; 
	 echo "location.href='$url';"; 
	 echo "</script>"; 		
  }elseif($type== 'header'){
  	header("Location: " . $url); 
  }
  
}

function get_current_url()
{
	return  "http://" .$_SERVER[HTTP_HOST] .$_SERVER[REQUEST_URI];
}

function get_microtime(){ 
   list($usec, $sec) = explode(" ",microtime()); 
   return ((float)$usec + (float)$sec); 
} 

function now(){
	return date("Y-m-d H:i:s");
}
function alert($msg)
{
  echo "<script LANGUAGE=\"Javascript\">"; 
  echo "alert('" .$msg ."');"; 
  echo "</script>"; 		
}


function _get_js_file($js){
	if (strtolower($js) == "default") {
		return ROOT_PATH ."javascript/jquery.js";		
	}else {		
		$ljs = strtolower($js);
		if (strpos($ljs, "http://") !== false || strpos($ljs,"www.") !== false) {	
			return $js;		
		}else {
			if (substr($ljs,-3) == ".js"){$js = substr_replace($js,"",-3);}			
			return  ROOT_PATH ."javascript/" .$js .".js";			
		}		
	}	
}

function js_include_tag($js){
	if (func_num_args()>1) {
		foreach (func_get_args() as $v){
			js_include_tag($v);
		}
		return ;
	}
	$js = _get_js_file($js);
	echo '<script type="text/javascript" language="javascript" src="' .$js .'"></script>';		
}

#only include once
function js_include_once_tag($js){
	global $loaded_js;
	if (empty($loaded_js)){
		$loaded_js = array();
	}
	if (func_num_args()>1) {
		foreach (func_get_args() as $v){
			js_include_once_tag($v);
		}
		return ;
	}
	$js_name = _get_js_file($js);
	if (in_array($js_name,$loaded_js,false)) {
		return ;
	}else {
		$loaded_js[] = $js_name;
		js_include_tag($js);
	}
}

function css_include_tag($filename){
	if (func_num_args()>1) {
		foreach (func_get_args() as $v){
			css_include_tag($v);
		}
		return ;
	}
	$css_name = _get_css_file($filename);	
	echo '<link href="' .$css_name .'" rel="stylesheet" type="text/css">';	
}

function _get_css_file($filename){
	$ljs = strtolower($filename);
	if (strpos($ljs, "http://") !== false || strpos($ljs,"www.") !== false) {	
		return $ljs;				
	}else {
		if (substr($ljs,-4) == ".css"){$filename = substr_replace($filename,"",-4);}			
		$ljs = ROOT_PATH ."css/" .$filename .".css";			
	}
	return $ljs;
}

function css_include_once_tag($filename){
	global $loaded_css;
	if (empty($loaded_css)){
		$loaded_css = array();
	}
	if (func_num_args()>1) {
		foreach (func_get_args() as $v){
			css_include_once_tag($v);
		}
		return ;
	}
	$f = _get_css_file($filename);
	if (in_array($f,$loaded_css,false)) {	
		return ;	
	}else {
		$loaded_css[] = $f;
		css_include_tag($filename);
	}
}


function rand_str($len=10){
  	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWZYZ";
  	$ret = "";
  	for($i=0;$i < $len; $i++){
  		$ret .= $str{mt_rand(0,61)};
  	}
  	return $ret;
  }

function is_ajax(){
	return strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=="xmlhttprequest" ? true : false;
}

//work only with jquery frame work
function paginate($url="",$ajax_dom=null,$page_var="page")
{
	$pageindextoken = empty($page_var) ? "page" : $page_var;
	$record_count_token = $pageindextoken . "_record_count";	

	$pagecounttoken = $pageindextoken . "_count";

	global $$pagecounttoken;
	global $$record_count_token;
	$pageindex = isset($_REQUEST[$pageindextoken]) ? $_REQUEST[$pageindextoken] : 1;
	$pagecount = isset($_REQUEST[$pagecounttoken]) ? $_REQUEST[$pagecounttoken] : $$pagecounttoken;
	
	
	if ($url == "") {
		parse_str($_SERVER['QUERY_STRING'], $params);
		unset($params[$pageindextoken]);
		$url = $_SERVER['PHP_SELF'] ."?";
		foreach ($params as $k => $v) {
			$url .= "&" .$k . "=" . urlencode($v);
		}
	}
	
	
	if ($pagecount <= 1) return;
	if (!strpos($url,'?'))
	{
		$url .= '?';
	}
	
	$pagefirst = $url . "&$pageindextoken=1";
	$pagenext = $url ."&$pageindextoken=" .($pageindex + 1);
	$pageprev = $url ."&$pageindextoken=" .($pageindex-1);
	$pagelast = $url ."&$pageindextoken=" .($pagecount);
	if ($pageindex == 1 || $pageindex ==null || $pageindex == "")
	{?>
	  <span><a class="paginate_link" href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pagelast; ?>">[尾页]</a></span>
	<?php	
	}
	if ($pageindex < $pagecount && $pageindex > 1 )
	{?>
	  <span><a class="paginate_link" href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pageprev; ?>">[上页]</a></span>			
	  <span><a class="paginate_link" href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pagelast; ?>">[尾页]</a></span>		
	 <?php
	}
	if ($pageindex == $pagecount)
	{?>
	  <span><a class="paginate_link" href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a class="paginate_link" href="<?php echo $pageprev; ?>">[上页]</a></span>		
	<?php	
	}
	?>共找到<?php echo $$record_count_token; ?>条记录　
  当前第<select name="pageselect" id="pageselect" onChange="jumppage('<?php echo $url ."&" .$page_var ."="; ?>',this.options[this.options.selectedIndex].value);">
	<?php	
	//产生所有页面链接
	for($i=1;$i<=$pagecount;$i++){ ?>
		<option <?php if($pageindex== $i) echo 'selected="selected"';?> value="<?php echo $i;?>" ><?php echo $i;?></option>
		<?php	
	}
	?>
	</select>页　共<?php echo $pagecount;?>页
	<script>
			function jumppage(urlprex,pageindex)
			{
				var surl=urlprex+pageindex;
				<?php
				if($ajax_dom){ ?>
					$('#<?php echo $ajax_dom;?>').load(surl);
				<?php  }else{ ?>
					window.location.href=surl;
				<?php }
				?>	
				
			} 
	</script>
	
	<?php
	if(!empty($ajax_dom)){
		?>
		<script>
			$(".paginate_link").click(function(e){
				e.preventDefault();
				$("#<?php echo $ajax_dom;?>").load($(this).attr('href'));
			});
		</script>
		<?php
	}
}


function strfck($str)
{
	$str=str_replace('\"','"',$str);
	$str=str_replace('"font-size','"mso-bidi-font-size',$str);
	$str=str_replace('FONT-SIZE','mso-bidi-font-size',$str);
	return $str;
}

//获取FCK字符串内容
function get_fck_content($str,$symbol='fck_pageindex')
{
	$ies = '<div style="page-break-after: always"><span style="display: none">&nbsp;</span></div>';	
	$ffs = '<div style="page-break-after: always;"><span style="display: none;">&nbsp;</span></div>';		   	
	$contents = split($ies,$str);
	$record_count_token = $symbol . "_record_count";	
	$pagecounttoken = $symbol . "_count";
	global $$pagecounttoken;
	global $$record_count_token;
	if (count($contents) < 2 ) {
		$contents = split($ffs,$str);
	}
	$$record_count_token = count($contents);
	$$pagecounttoken = $$record_count_token;
	$index = isset($_REQUEST[$symbol]) ? $_REQUEST[$symbol] : 1;
	return strfck($contents[$index-1]);
}

function print_fck_pages($str,$url="",$symbol='fck_pageindex'){
	paginate($url,null,$symbol);
};

function print_fck_pages1($str,$url="",$symbol='fck_pageindex')
{
	$ies = '<div style="page-break-after: always"><span style="display: none">&nbsp;</span></div>';	
	$ffs = '<div style="page-break-after: always; "><span style="DISPLAY:none">&nbsp;</span></div>';
	$pagecount = substr_count($str,$ies);
	$pagecount = $pagecount <=0 ? substr_count($str,$ffs) : $pagecount;
	$pagecount++;
	$pageindex = isset($_REQUEST[$symbol]) ? $_REQUEST[$symbol] : 1;
	
	if ($pagecount <= 1) return;
	if ($url == "") {
		parse_str($_SERVER['QUERY_STRING'], $urlparams);
		$params = array();
		foreach ($urlparams as $k => $v) {
			if ($k == $symbol || $k == $pagecounttoken) {
				continue;				
			}
			$params[$k] = $v;
		}
		$url = $_SERVER['PHP_SELF'] ."?";
		foreach ($params as $k => $v) {
			$url .= "&" .$k . "=" . $v;
		}
	}	
	if (!strpos($url,'?'))
	{
		$url .= '?';
	}
	$symbol = "&" .$symbol ."=";
	$pagefirst = $url .$symbol ."1";
	$pagenext = $url .$symbol .($pageindex + 1);
	$pageprev = $url .$symbol .($pageindex-1);
	$pagelast = $url .$symbol .($pagecount);
	if ($pageindex == 1 || $pageindex ==null || $pageindex == "")
	{ ?>
	  <span><a href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a href="<?php echo $pagelast; ?>">[尾页]</a></span>
	<?php	
	}
	if ($pageindex < $pagecount && $pageindex > 1 )
	{?>
	  <span><a href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a href="<?php echo $pageprev; ?>">[上页]</a></span>			
	  <span><a href="<?php echo $pagenext; ?>">[下页]</a></span> 
	  <span><a href="<?php echo $pagelast; ?>">[尾页]</a></span>		
	 <?php
	}
	if ($pageindex == $pagecount)
	{?>
	  <span><a href="<?php echo $pagefirst; ?>">[首页]</a></span> 
	  <span><a href="<?php echo $pageprev; ?>">[上页]</a></span>		
	<?php	
	}
	?>
  当前第<select name="pageselect" id="pageselect" onChange="jumppage('<?php echo $url.$symbol; ?>',this.options[this.options.selectedIndex].value);">
	<?php	
	//产生所有页面链接
	for($i=1;$i<=$pagecount;$i++)
	{  
		
		?>
		<option <?php if($pageindex== $i) echo 'selected="selected"';?> value="<?php echo $i;?>"><?php echo $i;?></option>
	 <?php	
	}
	?>
	</select>页
	<script>
			function jumppage(urlprex,pageindex)
			{
				var surl=urlprex+pageindex;
				window.location.href=surl;
			} 
	</script>

	<?php	
	
}


function search_content($key,$table_name='yuxiao_news',$conditions=null,$page_count = 10, $order='',$full_text=false){
	$db = get_db();
	$key = str_replace('　', ' ', $key);
	$key = str_replace(',', ' ', $key);
	$keys = explode(' ',$key);
	$table = new table_class($table_name);	
	$c = array();
	$d=array();
	foreach ($keys as $v) {
		array_push($c, "title like '%$v%'");
		if($table_name == 'yuxiao_news'){
			if($full_text){						
				array_push($c, "content like '%$v%'");
			}			
		}
	}
	foreach ($keys as $v) {
		if($table_name == 'yuxiao_news'){
			
			if($full_text){
				array_push($d, "(title like '%$v%' or content like '%$v%')");				
			}
			else
			{
				array_push($d, "(title like '%$v%')");		
			}
		}else if($table_name == 'yuxiao_video'){
			array_push($d, "(title like '%$v%')");	
		}
	}
	$d = implode(' and ' ,$d);
	if($conditions){
		$d = $conditions . ' and (' .$d .')';
	}
	$sql1 = 'select a.id,a.title,a.category_id,a.created_at,a.is_adopt from (select * from ' . $table_name ." where 1=1 and ".$d;
	if($order)
	{
		$sql1 = $sql1 . ' order  by ' .$order;
	}
	$sql1=$sql1.') as a';
	$content1=$db->query($sql1);
	for($i=0;$i<count($content1);$i++)
	{
		$notid[]=$content1[$i]->id;
	}
	
	$e=implode(',',$notid);
	$c = implode(' OR ' ,$c);
	if($conditions){
		$c = $conditions . ' and (' .$c .')';
	}
	if($e!="")
	{
		$sql2 = 'select b.id,b.title,b.category_id,b.created_at,b.is_adopt from (select * from ' . $table_name .' where 1=1 and id not in ('.$e.') and ('.$c.')';
	}
	else
	{
		$sql2 = 'select b.id,b.title,b.category_id,b.created_at,b.is_adopt from (select * from ' . $table_name ." where 1=1 and ".$c;	
	}
	if($order)
	{
		$sql2 = $sql2 . ' order  by ' .$order;
	}
	$sql2=$sql2.') as b';
	if(count($content1)>0)
	{
		$sql=$sql1." union ".$sql2;
	}
	else
	{
		$sql=$sql2;	
	}
	/*if ($order){
		$sql = $sql . ' order  by ' .$order;
	}*/
	if($page_count > 0){
		return $db->paginate($sql,$page_count);	
	}else{
		return $db->query($sql);
	}
		
}

function delhtml($str){   //清除HTML标签
$st=-1; //开始
$et=-1; //结束
$stmp=array();
$stmp[]="&nbsp;";
$len=strlen($str);
for($i=0;$i<$len;$i++){
   $ss=substr($str,$i,1);
   if(ord($ss)==60){ //ord("<")==60
    $st=$i;
   }
   if(ord($ss)==62){ //ord(">")==62
    $et=$i;
    if($st!=-1){
     $stmp[]=substr($str,$st,$et-$st+1);
    }
   }
}
$str=str_replace($stmp,"",$str);
return $str;
}

function cut_str($sourcestr,$cutlength)
{
$returnstr='';
$i=0;
$n=0;
$str_length=strlen($sourcestr);//字符串的字节数
while (($n<$cutlength) and ($i<=$str_length))
{
$temp_str=substr($sourcestr,$i,1);
$ascnum=Ord($temp_str);//得到字符串中第$i位字符的ascii码
if ($ascnum>=224) //如果ASCII位高与224，
{
$returnstr=$returnstr.substr($sourcestr,$i,3); //根据UTF-8编码规范，将3个连续的字符计为单个字符
$i=$i+3; //实际Byte计为3
$n++; //字串长度计1
}
elseif ($ascnum>=192) //如果ASCII位高与192，
{
$returnstr=$returnstr.substr($sourcestr,$i,2); //根据UTF-8编码规范，将2个连续的字符计为单个字符
$i=$i+2; //实际Byte计为2
$n++; //字串长度计1
}
elseif ($ascnum>=65 && $ascnum<=90) //如果是大写字母，
{
$returnstr=$returnstr.substr($sourcestr,$i,1);
$i=$i+1; //实际的Byte数仍计1个
$n++; //但考虑整体美观，大写字母计成一个高位字符
}
else //其他情况下，包括小写字母和半角标点符号，
{
$returnstr=$returnstr.substr($sourcestr,$i,1);
$i=$i+1; //实际的Byte数计1个
$n=$n+0.5; //小写字母和半角标点等与半个高位字符宽...
}
}
return $returnstr;
}

function show_img($state,$width,$height)
{
	if($state==1){echo '<img src="/images/index/pic.gif" width='.$width.'  height='.$height.' >';}
}

function show_img2($state)
{
	if($state==1){echo '<img src="/images/index/pic2.gif" width=16  height=16 >';}
}


function show_video($state,$width,$height)
{
	if($state==1){echo '<img src="/images/index/video.gif" width='.$width.'  height='.$height.' >';}
}

function show_video2($state)
{
	if($state==1){echo '<img src="/images/index/video2.gif" width=16  height=16 >';}
}

function search_keywords($id,$key,$table_name='yuxiao_news',$about='',$page_count = 10, $order=''){
	$table = new table_class($table_name);
	$key = str_replace('　', ' ', $key);
	$keys = explode(' ',$key);
	$c = array();
	$d=array();
	foreach ($keys as $v) {
		array_push($c, "n.keywords like '%$v%'");
	}
	
	for($i=0;$i<count($about);$i++)
	{
		array_push($d,"n.id<>".$about[$i]->id);	
	}
	array_push($d," n.is_adopt=1");
	$d = implode(' and ',$d);
	$c = implode(' OR ' ,$c);
	$sql = "select n.title,n.id,n.created_at,n.category_id from " .$table_name ." n left join yuxiao_category c on n.category_id=c.id where ".$d." and (".$c.")";
	if ($order){
		$sql = $sql . ' order  by ' .$order;
	}
	$db = get_db();
	if($page_count > 0){
		return $db->paginate($sql,$page_count);	
	}else{
		return $db->query($sql);
	}
		
}

function search_newsid($id,$key,$table_name='yuxiao_news',$page_count = 10, $order=''){
	$table = new table_class($table_name);

	$sql = "select n.title,n.id,n.created_at,n.category_id from " . $table_name ." n left join yuxiao_category c on n.category_id=c.id where n.is_adopt=1 and n.id<>".$id." and n.id in (".$key.")";
	if ($order){
		$sql = $sql . ' order  by ' .$order;
	}
	$db = get_db();
	if($page_count > 0){
		return $db->paginate($sql,$page_count);	
	}else{
		return $db->query($sql);
	}
}
		

function write_to_file($filename,$content,$mode='a'){
	$fp = fopen($filename, $mode);
	fwrite($fp,$content);
	fclose($fp);

}

function flash_str_replace($content){
	$content = str_replace('"',"'",$content);
	$content = str_replace(",","",$content);
	return $content;

}
function  aweek($gdate=" ",$first=0){ 
  if(!$gdate)   $gdate   =   date( "Y-m-d "); 
  $w   =   date( "w ",   strtotime($gdate));//取得一周的第几天,星期天开始0-6 
  $dn   =   $w   ?   $w   -   $first   :   6;//要减去的天数 
  $st   =   date( "Y-m-d ",   strtotime( "$gdate   - ".$dn. "   days ")); 
  $data=everyday($st); 
  return  $data;//返回开始和结束日期 
} 

function getTimeOfWeek($year,$week,$dir=0)
{
  $wday=4-date('w',mktime(0,0,0,1,4,$year))+1;
  return strtotime(sprintf("+%d weeks",$week-($dir?0:1)),mktime(0,0,0,1,$wday,$year))-($dir?1:0);
}

function everyday($rq)
{
		for($i=0;$i<7;$i++)
		{
			$date[]=date("Y-m-d",strtotime("$rq +".$i." days"));
		}
		return $date;
}


function cut_str1($str,$start,$len) //设置3个参数 
{ 
	$strlen=strlen($str); // 获取字符长度
	$clen=0; 
	for($i=0;$i<$strlen;$i++,$clen++) 
	{ 
	  if ($clen>=$start+$len) //当大于截取字符数，则跳出循环
	   break; 
	  if(ord(substr($str,$i,1))>0xa0) //ord 本函数返回字符的 ASCII (美国国家标准交换码) 序数值。本函数和chr()函数相反。
	  { //0xa0 代表 十进制 160,0xa0表示汉字的开始
	   if ($clen>=$start)  //判断截取位置
	    $tmpstr.=substr($str,$i,2);   //中文截取两个字符
	   $i++; 
	  } 
	   else 
	  { 
	   if ($clen>=$start) 
	    $tmpstr.=substr($str,$i,1);   //非中文截取一个字符
	  } 
	} 
	return $tmpstr; 
} 
function showShort($str,$len) 
{ 
	$tempstr = cSubStr($str,0,$len); 
	if ($str<>$tempstr) 
	  $tempstr .= "..."; //要以什么结尾,修改这里就可以.
	return $tempstr; 
}

function news_date($created_at,$days)
{
	if(date('Y-m-d H:i:s',strtotime("-36 hour")) > $created_at&&$days==0)
	{ echo 'style="color:#666666"';}

}
 function array2sort($a,$sort,$d='') {
    $num=count($a);
    if(!$d){
        for($i=0;$i<$num;$i++){
            for($j=0;$j<$num-1;$j++){
                if($a[$j][$sort] > $a[$j+1][$sort]){
                    foreach ($a[$j] as $key=>$temp){
                        $t=$a[$j+1][$key];
                        $a[$j+1][$key]=$a[$j][$key];
                        $a[$j][$key]=$t;
                    }
                }
            }
        }
    }
    else{
        for($i=0;$i<$num;$i++){
            for($j=0;$j<$num-1;$j++){
                if($a[$j][$sort] < $a[$j+1][$sort]){
                    foreach ($a[$j] as $key=>$temp){
                        $t=$a[$j+1][$key];
                        $a[$j+1][$key]=$a[$j][$key];
                        $a[$j][$key]=$t;
                    }
                }
            }
        }
    }
    return $a;
}  

?>