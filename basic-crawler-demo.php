<?php

ini_set('default_socket_timeout', 25);

$host_name  		= "*********";
$database   		= "*********";
$user_name  		= "*********";
$password   		= "*********";

$SQL = new mysqli($host_name, $user_name, $password, $database, 3306);


/*
 *     [id] => 11
    [script_name] => www-link
    [request_time] => 0
    [remote_addr] =>
    [data] => *********/F/ytfetch.php
 */

if($_GET['compile']){
    $master = array();
    $result = mysqli_query($SQL, "SELECT * FROM error_log WHERE script_name = 'www-link9' AND request_time = 1 AND `data` != 'a:0:{}' LIMIT 20000");
    echo "<h1>".mysqli_num_rows($result)."</h1>";
    while($row = mysqli_fetch_assoc($result)){
        //echo "<pre>";
        $raw = unserialize($row['data']);
        foreach($raw as $img){
            if(strpos($img,'NA ---')===false){
                $master[] = $img;
            }
        }
        //print_r(unserialize($row['data']));
        //echo "</pre>";
    }
    echo "<pre>";
    print_r(implode(",",$master));
    print_r($master);
    echo "</pre>";
    die();
}

if($_GET['sql']){

    $result = mysqli_query($SQL, "SELECT * FROM error_log WHERE script_name = 'www-link9' AND request_time = 1 AND `data` != 'a:0:{}' LIMIT 20000");
    echo "<h1>".mysqli_num_rows($result)."</h1>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<pre>";
        print_r($row);
        echo "</pre>";
    }
    die();
}

if($_GET['scan']){

    $skipList = array(
            'OMC/',
            'ROT/',
    );
    $result = mysqli_query($SQL, "SELECT * FROM error_log WHERE script_name = 'www-link9' AND request_time = 0");
    $output = "<h2>Total to process: ".mysqli_num_rows($result)."</h2>";
    $limit = 30;
    $limitCounter = 1;
    $time1 = time();
    $links = array();
    while($row = mysqli_fetch_assoc($result)){
        $links[] = $row;
        if(!in_array($skipList,$row['data'])) {


            if ($limitCounter >= $limit) {
                break;
            }
            $limitCounter++;
            //if(strpos($row['data'],'ROT/')!==false){
            $the_site = $row['data'];
            $html = file_get_contents($the_site);
            $re = '/[\.\/\-a-zA-Z_0-9]{1,}.(JPG|png|gif|jpeg)/mi';
            preg_match_all($re, $html, $imgMatches, PREG_SET_ORDER, 0);
            //echo "<pre>";
            //print_r($imgMatches);
            //echo "</pre>";
            //$imgHTMLList = array();
            unset($html);
            $html = null;
            $imgHTMLList = array();
            foreach ($imgMatches as $img) {
                //echo "<pre>";print_r($img);echo "</pre>";
                $origImg = $img[0];
                if (strpos($img[0], '//') === 0) {
                    $newUrl = '';
                    $img[0] = "http:" . $img[0];
                } else {
                    $url = explode('/', $the_site);
                    if (strpos($img[0], '..') === 0) {
                        $pop_url2 = array_pop($url);
                    } else {
                        $pop_url = array_pop($url);
                    }
                    $img[0] = str_replace('..', '', $img[0]);

                    if (strpos($img[0], "/") === 0) {
                        $newUrl = implode('/', $url);
                    } else {
                        $newUrl = implode('/', $url) . "/";
                    }
                }

                if (file_get_contents("{$newUrl}{$img[0]}") !== false) {
                    $imgHTMLList[] = "\"<img src='{$newUrl}{$img[0]}' alt='{$the_site}---{$origImg}' />\"";
                } else {
                    $imgHTMLList[] = "<div>NA --- " . "{$the_site}---{$origImg}---{$newUrl}{$img[0]}</div>";
                }

            }

            /*if(count($imgHTMLList)>10){
                echo "<pre>";
                print_r(serialize($imgHTMLList));
                echo "</pre>";
                die();
            }*/

            //}
        }

        $serialized = mysqli_real_escape_string($SQL, serialize($imgHTMLList));

        mysqli_query($SQL, "UPDATE error_log SET remote_addr='{$row['data']}',data='{$serialized}', request_time='1' WHERE id={$row['id']}");

        //sleep(.05);
    }
    $time2= time();
    $output .= "<h4>Time: ".($time2-$time1)."</h4>";
    echo "<html><head><meta http-equiv=\"refresh\" content=\"3;url=?scan=1\" /></head><body>{$output}";
    echo "<pre>";
    print_r($links);
    echo "</pre></body></html>";
    die();
}



$imgListJS = "\"\""; // empty for now


?>

<!DOCTYPE html>
<html>
    <head>
        <title>ST2</title>
        <meta charset=utf-8>
        <meta name=viewport content="width=device-width, initial-scale=1, maximum-scale=1">


        <meta name=apple-mobile-web-app-capable content=yes>
        <meta name=apple-mobile-web-app-status-bar-style content="#000">
        <meta name="theme-color" content="#000">

        <!--<link rel="icon" href="app_icon_noternity.png?r=1.09">
        <link rel="apple-touch-icon" href="app_icon_noternity.png?r=1.09">
        <link rel="apple-touch-icon" sizes="76x76" href="app_icon_noternity_76.png?r=1.059">
        <link rel="apple-touch-icon" sizes="120x120" href="app_icon_noternity_120.png?r=1.059">
        <link rel="apple-touch-icon" sizes="152x152" href="app_icon_noternity_152.png?r=1.095">-->


        <!-- JQUERY LIBRARY -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <!-- SVG ICONS -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- GSJAP -->
        <script type='text/javascript' src='//danielzamudio.com/DZ1/svg/velocity.js'></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/TweenLite.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/TweenMax.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/CSSPlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/CSSRulePlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/DrawSVGPlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/MorphSVGPlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/ScrambleTextPlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/TextPlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/TextPlugin.js"></script>
        <script src="//danielzamudio.com/DZ1/svg/GSAP_DZ1/src/uncompressed/plugins/Physics2DPlugin.js"></script>

        <!-- JQUERY MOBILE -->
        <!--<link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.css"/>
        <script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>-->

        <!-- FONTS Source Sans Pro - Open Sans -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i,900,900i|Oswald&display=swap"
              rel="stylesheet">

        <!--
        <meta property="og:url"            content="https://danielzamudio.com" />
        <meta property="og:type"               content="website" />
        <meta property="og:title"              content="DanielZamudio.com" />
        <meta property="og:description"        content="Moving @ warp speed!" />
        <meta property="og:image"              content="https://danielzamudio.com/dz_splash_fb2.jpg" />
        -->

        <script type="text/javascript">

            //*********/monchies/images/monchies_pixelated.png

            function RI(list){
                return Math.round(Math.random(0,list.length-1));
            }
            var elementsArray = Array(
                "<div>&#9889;</div>",
                "<div>&#9903;</div>",
                "<div>&#9916;</div>",
                "<div>&#9889;</div>",
                "<div>&#9889;</div>",
                "<p>I remember touch.</p>",
                "<span>@copy; 2019</span>",
                "<img src='*********/DZ1/img/dz_large.gif' />",
                "<img src='*********/monchies/images/monchies_pixelated.png' />",
                "<img src='*********/dafthelmet.gif' />",
                <?=$imgListJS?>,
                "<button></button>",
            );

            Array.prototype.surpriseMe = function(){
                return this[Math.round(Math.random(0,this.length-1)*this.length)];
            };
            var colorsList = Array('red','orange','yellow','green','blue','purple','pink','teal','grey');
            var bordersStylesList = Array('solid','dotted','dashed','inset','outset');
            var displayList = Array('block');
            var positionsList = Array('absolute','fixed'/*,'relative','initial'*/);
            var fontList = Array('cursive','fantasy','Helvetica','Roboto','sans-serif');
            var floatList = Array('left','right');

            var colorStylesArray = Array(
                {color:colorsList.surpriseMe()},
                {backgroundColor:colorsList.surpriseMe()},
            );

            var pxSize = function(min,max){
                return Math.ceil(Math.random(min,max)*max) + "px ";
            };

            /*function allTypes(){
                border: pxSize(1,10) + // width
                         colorsList.surpriseMe() + " " + // color
                         bordersStylesList.surpriseMe(),

                display: 'block',
                width: pxSize(20,100),
                height: pxSize(20,100),
                position: positionsList.surpriseMe(),
                boxShadow: pxSize(1,10)+pxSize(1,10)+pxSize(1,100)+colorsList.surpriseMe()
            };*/

            function getAllFuncs(obj) {
                var legalProps = [];
                var propList = Object.getOwnPropertyNames(obj.prototype);
                var i = 0;
                while(i<propList.length){
                    let prop = propList[i];
                    switch(prop){
                        case 'border':
                            legalProps.push(prop)
                            break;
                        case 'display':
                            legalProps.push(prop)
                            break;
                        case 'width':
                            legalProps.push(prop)
                            break;
                        case 'height':
                            legalProps.push(prop)
                            break;
                        case 'position':
                            legalProps.push(prop)
                            break;
                        case 'boxShadow':
                            legalProps.push(prop)
                            break;
                        case 'backgroundColor':
                            legalProps.push(prop)
                            break;
                        case 'color':
                            legalProps.push(prop)
                            break;
                        case 'fontSize':
                            legalProps.push(prop)
                            break;
                        case 'fontFamily':
                            legalProps.push(prop)
                            break;
                        case 'float':
                            legalProps.push(prop)
                            break;
                        case 'absCoord':
                            legalProps.push(prop)
                            break;
                        default:
                            // noop;
                            break;
                    }
                    i++;
                }
                return legalProps;
            }

            class stylesTypes{
                constructor(x){
                    // noop
                }
                create(){
                    this.flagCoordPosition = 0;
                    var availProps = getAllFuncs(stylesTypes);
                    var pickedList = [];
                    var i = 0;
                    while(i<availProps.length){
                        var rand1 = Math.round(Math.random(0,1)*1);
                        if(rand1==1){
                            pickedList.push(this[availProps[i]]());
                        }
                        i++;
                    }
                    var evaledList;
                    eval("evaledList = {"+pickedList.join(",")+"}");
                    return evaledList;
                }
                border(){
                    return "border:'" + pxSize(1,10) +
                    colorsList.surpriseMe() + " " +
                    bordersStylesList.surpriseMe() +"'"
                }

                display(){
                    return "display:'block'"

                }
                width(){
                    return "width:'"+ pxSize(20, 100)+"'"

                }
                height(){
                    return "height:'"+ pxSize(20,100)+"'"

                }
                position(){
                    var position = positionsList.surpriseMe();
                    if(position == 'fixed' || position == 'absolute'){
                        console.log('absCoord');
                        this.flagCoordPosition = 1;
                        var maxTop = $('#root').height()-($('#root').height()*.10);
                        var maxLeft = $('#root').width()-($('#root').width()*.10);
                        return "left:'"+pxSize(0,maxLeft)+"',"+"top:'"+pxSize(0,maxTop)+"',position:'"+position+"'";
                    }else{
                        return "position:'"+ position+"'"
                    }

                }
                boxShadow(){
                    return "boxShadow:'"+ pxSize(1,10)+pxSize(1,10)+pxSize(1,100)+colorsList.surpriseMe()+"'"
                }
                color(){
                    return "color:'"+colorsList.surpriseMe()+"'"
                }
                fontSize(){
                    return "fontSize:'"+pxSize(21,47)+"'"
                }
                fontFamily(){
                    return "fontFamily:'"+fontList.surpriseMe()+"'"
                }
                float(){
                    return "float:'"+floatList.surpriseMe()+"'"
                }
                absCoord(){
                    if(this.flagCoordPosition==1){
                        var maxTop = $('#root').height()-($('#root').height()*.10);
                        var maxLeft = $('#root').width()-($('#root').width()*.10);
                        return "left:'"+pxSize(0,maxLeft)+"',"+"top:'"+pxSize(0,maxTop)+"'";
                    }else{
                        return "visibility:'visible'";
                    }
                }

            }

            /*
            Text items can have;
                - borders
                - backgrounds
                - colors
                - shadows
                - font sizes
                - font families
                - font styles
            Div items can have;
                - borders
                - backgrounds
                - shadows
                - widths
                - heights
                - position
             */


            $('body').ready(function(){
                var intervalFlag = true;
                var intervalStart = 1;
                var intervalLimit = 7000;
                var interval = setInterval(function(){
                    if(intervalStart >= intervalLimit){
                        clearInterval(interval);
                    }
                    if(intervalFlag){
                        var testElement = new $(  elementsArray.surpriseMe()  );
                        testElement.css( new stylesTypes().create() );
                        if(intervalStart==1){
                            $('#root').append(testElement);
                        }else{
                            var rand1 = Math.round(Math.random(0,1)*1);
                            if(rand1==1){
                                var len = 0; $('#root').children().each(function(){len++});
                                var cRound = 1;
                                $('#root').children().each(function(idx,ide){
                                    var rand2 = Math.round(Math.random(0,1)*1);
                                    if(rand2==1){
                                        if(cRound < len){
                                            // skip for next
                                        }else{
                                            $(this).append(testElement);
                                        }
                                    }else{
                                        $('#root').append(testElement);
                                    }
                                    cRound++;
                                });
                            }else{
                                $('#root').append(testElement);
                            }

                        }
                        intervalStart++;
                    }
                },20);

            });

        </script>

        <style type="text/css">
            body {
                background: white;
                margin: 0;
                padding: 0;
            }
            #root{
                display: block;
                margin: 0;
                padding: 0;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }
        </style>



    </head>

    <body>

        <div id="root">
        </div>

    </body>

</html>
