//判断是否指定图片大小

$imgsizebase = $_GET['size'];

if (empty($imgsizebase)){

$imgsize = "1920x1080";

}else{

$imgsize = $imgsizebase;

}

//建立完整url

$imgurl = $imgurlbase."_".$imgsize.".jpg";

//获取其他信息

$imgtime = $data->{"images"}[0]->{"startdate"};

$imgtitle = $data->{"images"}[0]->{"copyright"};

$imglink = $data->{"images"}[0]->{"copyrightlink"};

//判断是否只获取图片信息

if ($_GET['info']==='true') {

echo "{title:".$imgtitle.",url:".$imgurl.",link:".$imglink.",time:".$imgtime."}";

}else{

//若不是则跳转url

header("Location: $imgurl");

}
