<?php
//判断是否随机调用
if ($\_GET\['rand'\] === 'true') {
    $gettime = rand(-1, 7);
} else {
    //若不为随机调用则判断是否指定日期
    $gettimebase = $\_GET\['day'\];
    if (empty($gettimebase)) {
        $gettime = 0;
    } else {
        $gettime = $gettimebase;
    }
}
//获取Bing Json信息
$json\_string = file\_get\_contents('https://www.bing.com/HPImageArchive.aspx?format=js&idx=' . $gettime . '&n=1');
//转换为PHP数组
$data = json\_decode($json\_string);
//提取基础url
$imgurlbase = "https://www.bing.com" . $data->{"images"}\[0\]->{"urlbase"};
//判断是否指定图片大小
$imgsizebase = $\_GET\['size'\];
if (empty($imgsizebase)) {
    $imgsize = "1920x1080";
} else {
    $imgsize = $imgsizebase;
}
//建立完整url
$imgurl = $imgurlbase . "\_" . $imgsize . ".jpg";
//获取其他信息
$imgtime = $data->{"images"}\[0\]->{"startdate"};
$imgtitle = $data->{"images"}\[0\]->{"copyright"};
$imglink = $data->{"images"}\[0\]->{"copyrightlink"};
//判断是否只获取图片信息
if ($\_GET\['info'\] === 'true') {
    echo "{title:" . $imgtitle . ",url:" . $imgurl . ",link:" . $imglink . ",time:" . $imgtime . "api author:Otstar,api author link:https://www.ixk.me" . "}";
} else {
    //若不是则跳转url
    header("Location: $imgurl");
}
