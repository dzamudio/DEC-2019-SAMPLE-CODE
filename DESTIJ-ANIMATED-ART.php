<?php
/**
 * Created by PhpStorm.
 * User: DZ
 * Date: 3/2/2019
 * Time: 5:06 AM
 */


$SERVER_HTTP_PATH = '/DZ1/'; /* <?php echo $SERVER_HTTP_PATH; ?> */
$HTTP_PROTOCOL = 'http'; /* <?php echo $HTTP_PROTOCOL; ?> */
$VERSION_CONTROL = '1.0.0.01'; /* <?php echo $VERSION_CONTROL; ?> */

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <title>DeStijl</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- JQUERY MOBILE
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
    -->
    <!-- JQUERY UI -->
    <link rel="stylesheet"
          href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
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

    <!-- FONTS Source Sans Pro - Open Sans
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400|Open+Sans:400,300' rel='stylesheet' type='text/css'>
    -->
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
        }

        #stage {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            border-collapse: collapse;
        }

        #stage tr {
            margin: 0;
            padding: 0;
        }

        #stage tr td {
            outline: 9px black solid;
            padding: 0;
            margin: 0;
        }

        #canvas {
            margin: 0;
            padding: 0;
            position: absolute;
            z-index: 5;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: black;
        }

        .cell {
            position: absolute;
            /*box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;*/
            -webkit-box-shadow: inset 0px 0px 0px 6px #000;
            -moz-box-shadow: inset 0px 0px 0px 6px #000;
            box-shadow: inset 0px 0px 0px 6px #000;
            background: white;
        }

        #canvasFrame {
            margin: 0;
            padding: 0;
            position: absolute;
            z-index: 10;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;

            -webkit-box-shadow: inset 0px 0px 0px 12px #fff;
            -moz-box-shadow: inset 0px 0px 0px 12px #fff;
            box-shadow: inset 0px 0px 0px 12px #fff;
        }

        .dataexp * {
            font-size: 6px;
            text-align: center;
            font-family: Arial;
            color: white;
            background: black;
            padding: 0;
            margin: 0;
            border-spacing: 0;
            border-collapse: collapse;
            border-style: none;
        }

        .dataexp {
            margin: 0 auto;
            border-spacing: 0;
            border-collapse: collapse;
            border-style: none;
        }
    </style>
</head>

<body>


<div id="canvas" style="">
    <div id="block1" class="cell" style="width:25%;height:9%;top:0%;left:0%;"></div>
    <div id="block2" class="cell" style="width:54%;height:9%;top:0%;left:25%;"></div>
    <div id="block3" class="cell" style="width:12%;height:9%;top:0%;left:79%;background:#e6b600;"></div>
    <div id="block4" class="cell" style="width:9%;height:78%;top:0%;left:91%;"></div>
    <div id="block5" class="cell" style="width:13%;height:69%;top:9%;left:0%;"></div>
    <div id="block6" class="cell" style="width:66%;height:58%;top:9%;left:13%;background:#c30000;"></div>
    <div id="block7" class="cell" style="width:12%;height:40%;top:9%;left:79%;background:#e6b600;"></div>
    <div id="block8" class="cell" style="width:6%;height:18%;top:49%;left:79%;"></div>
    <div id="block9" class="cell" style="width:6%;height:18%;top:49%;left:85%;"></div>
    <div id="block10" class="cell" style="width:30%;height:11%;top:67%;left:13%;background:black;"></div>
    <div id="block11" class="cell" style="width:36%;height:11%;top:67%;left:43%;"></div>
    <div id="block12" class="cell" style="width:12%;height:11%;top:67%;left:79%;"></div>
    <div id="block13" class="cell" style="width:13%;height:22%;top:78%;left:0%;background:#e6b600;"></div>
    <div id="block14" class="cell" style="width:30%;height:11%;top:78%;left:13%;"></div>
    <div id="block15" class="cell" style="width:30%;height:11%;top:89%;left:13%;"></div>
    <div id="block16" class="cell" style="width:36%;height:11%;top:78%;left:43%;"></div>
    <div id="block17" class="cell" style="width:36%;height:5%;top:89%;left:43%;background:black;"></div>
    <div id="block18" class="cell" style="width:48%;height:6%;top:94%;left:43%;"></div>
    <div id="block19" class="cell" style="width:12%;height:16%;top:78%;left:79%;background:#211fbf;"></div>
    <div id="block20" class="cell" style="width:9%;height:22%;top:78%;left:91%;background:#c30000;"></div>


</div>

<div id="canvasFrame"></div>

<script type="text/javascript">


    function shrink(targetId,toSizePercent){

        // figure out the final width in pixels for the targetId

        // find the adjacent objects that will be impacted
        var listAttachedRight = attachedRight(targetId);
        var listAttachedLeft = attachedLeft(targetId);
            // compute that objects's change in pixels
        console.log("targetId:"+targetId);
        console.log("attached left");
        console.log(listAttachedLeft);
        console.log("attached right");
        console.log(listAttachedRight);


        if( listAttachedRight.length == listAttachedLeft.length ){
            // both are equal
            /*
                how to pick?
            */
            console.log("both are equal");
        }else if( listAttachedRight.length > listAttachedLeft.length ){
            // Left is the path of least resistance
            /*
                Calculate the end resulting widths
            */
            console.log("Left is the path of least resistance");
        }else if( listAttachedRight.length < listAttachedLeft.length ){
            // Right is the path of least resistance
            /*
                Calculate the end resulting widths
            */
            console.log("Right is the path of least resistance");
        }

        console.log("");
        console.log("");

    }

    /**
     *
     * @param id
     * @param newWidthPercentChange
     * @return void
     */
    function change_width(id, newWidthPercentChange) { // change_width('#block6', 0.75)

        var PATH_RIGHT = false;
        var PATH_LEFT = false;

        var targetOriginalRight = Math.round(parseFloat($(id).css('left'))) + Math.round(parseFloat($(id).css('width')));
        var targetOriginalWidth = Math.round(parseFloat($(id).css('width')));
        var targetNewWidth = (targetOriginalWidth) * newWidthPercentChange;
        var differenceWidth = targetOriginalWidth - targetNewWidth;
        console.log("targetOriginalWidth("+targetOriginalWidth+") - targetNewWidth("+targetNewWidth+") = differenceWidth("+differenceWidth+")");

        var listAttachedRight = attachedRight(id);
        var listAttachedLeft = attachedLeft(id);

        $(id).animate({width: targetNewWidth + 'px'}, 5000, 'easeOutQuint');

        if( listAttachedRight.length == listAttachedLeft.length ){
            // both are equal
            /*
                how to pick?
            */
            console.log("both are equal");
        }else if( listAttachedRight.length > listAttachedLeft.length ){
            // Left is the path of least resistance
            /*
                Calculate the end resulting widths
            */
            console.log("Left is the path of least resistance");
            // check if any adjacent item's width is ok
            $.each(listAttachedLeft, function (i, item) {
                var adjacentOriginalWidth = Math.round(parseFloat($(item).css('width')));
                var adjacentNewWidth = adjacentOriginalWidth - differenceWidth;
                if(adjacentNewWidth < Math.round(adjacentOriginalWidth/15)){
                    console.log("\tToo small width decrease!");
                    PATH_RIGHT = true;
                    return false;
                }else{
                    console.log("\tWidth decrease acceptable!");
                }
            });
            if(!PATH_RIGHT){
                // continues to animate LEFT
                $.each(listAttachedLeft, function (i, item) {
                    var adjacentOriginalWidth = Math.round(parseFloat($(item).css('width')));
                    var adjacentNewWidth = adjacentOriginalWidth - differenceWidth;
                    console.log("\tadjacentNewWidth("+adjacentNewWidth+") on: "+item);
                    $(item).animate({width: adjacentNewWidth + 'px'}, 5000, 'easeOutQuint');
                });
            }else{
                console.log("Left is NOW the path of least resistance");
                $.each(listAttachedRight, function (i, item) {
                    var adjacentNewWidth = Math.round(parseFloat($(item).css('width'))) + differenceWidth;
                    var adjacentNewLeft = targetOriginalRight - differenceWidth;
                    $(item).animate({left: adjacentNewLeft + 'px', width: adjacentNewWidth + 'px'}, 5000, 'easeOutQuint');
                });
            }
        }else if( listAttachedRight.length < listAttachedLeft.length ){
            // Right is the path of least resistance
            /*
                Calculate the end resulting widths
            */
            console.log("Right is the path of least resistance");
            $.each(listAttachedRight, function (i, item) {
                var adjacentNewWidth = Math.round(parseFloat($(item).css('width'))) + differenceWidth;
                var adjacentNewLeft = targetOriginalRight - differenceWidth;
                $(item).animate({left: adjacentNewLeft + 'px', width: adjacentNewWidth + 'px'}, 5000, 'easeOutQuint');
            });
        }
    }

    function calculate() {

        //any attached to the right?
        $('.cell').each(function () {


            var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
            var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
            var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
            var thisTopEdge = Math.round(parseFloat($(this).css('top')));

            $(this).html("<table class='dataexp'>" +
                "<tr><td></td><td>" + thisTopEdge + "</td><td></td></tr>" +
                "<tr><td>" + thisLeftEdge + "</td><td></td><td>" + thisRightEdge + "</td></tr>" +
                "<tr><td></td><td>" + thisBottomEdge + "</td><td></td></tr>" +
                "<tr><td colspan='3'>#" + $(this).attr('id') + "</td></tr>" +
                "</table>");

        });
    }


    function attachedRight(id) {

        var rightEdge = Math.round(parseFloat($(id).css('left'))) + Math.round(parseFloat($(id).css('width')));
        var topEdge = Math.round(parseFloat($(id).css('top')));
        var leftEdge = Math.round(parseFloat($(id).css('left')));
        var bottomEdge = Math.round(parseFloat($(id).css('top'))) + Math.round(parseFloat($(id).css('height')));

        var listItems = [];


        //any attached to the right?
        $('.cell').each(function () {

            if (('#' + $(this).attr('id')) != id) {

                var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
                var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
                var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
                var thisTopEdge = Math.round(parseFloat($(this).css('top')));

                var RightEdgeDiffComp = Math.abs(rightEdge - thisLeftEdge);

                var TopEdgeComp = Math.abs(thisTopEdge - topEdge);
                var TopBottomComp = Math.abs(thisBottomEdge - topEdge);

                var BottomEdgeComp = Math.abs(thisBottomEdge - bottomEdge);
                var BottomTopComp = Math.abs(thisTopEdge - bottomEdge);

                var LeftEdgeComp = Math.abs(thisLeftEdge - leftEdge);

                if (
                    (RightEdgeDiffComp <= 1 && RightEdgeDiffComp >= 0)
                ) {
                    if (
                        ((thisTopEdge <= topEdge) && ((thisBottomEdge <= topEdge) || TopBottomComp <= 1))
                        ||
                        (((thisTopEdge >= bottomEdge) || BottomTopComp <= 1) && (thisBottomEdge >= bottomEdge))
                    ) {
                        // out of bounds
                    } else {
                        // in scope
                        listItems.push('#' + $(this).attr('id'));
                        //console.log($(this).attr('id') + ' is attached on the Right to ' + id + ' by ' + RightEdgeDiffComp);
                    }


                }
            }
        });

        return listItems;
    }


    function attachedLeft(id) {

        var rightEdge = Math.round(parseFloat($(id).css('left'))) + Math.round(parseFloat($(id).css('width')));
        var topEdge = Math.round(parseFloat($(id).css('top')));
        var leftEdge = Math.round(parseFloat($(id).css('left')));
        var bottomEdge = Math.round(parseFloat($(id).css('top'))) + Math.round(parseFloat($(id).css('height')));

        var listItems = [];


        //any attached to the right?
        $('.cell').each(function () {

            if (('#' + $(this).attr('id')) != id) {

                var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
                var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
                var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
                var thisTopEdge = Math.round(parseFloat($(this).css('top')));

                var LeftEdgeDiffComp = Math.abs(leftEdge - thisRightEdge);

                var TopEdgeComp = Math.abs(thisTopEdge - topEdge);
                var TopBottomComp = Math.abs(thisBottomEdge - topEdge);

                var BottomEdgeComp = Math.abs(thisBottomEdge - bottomEdge);
                var BottomTopComp = Math.abs(thisTopEdge - bottomEdge);

                var LeftEdgeComp = Math.abs(thisLeftEdge - leftEdge);
                //console.log($(this).attr('id'));
                if (
                    LeftEdgeDiffComp <= 1 && LeftEdgeDiffComp >= 0
                ) {
                    if (
                        ((thisTopEdge <= topEdge) && ((thisBottomEdge <= topEdge) || TopBottomComp <= 1))
                        ||
                        (((thisTopEdge >= bottomEdge) || BottomTopComp <= 1) && (thisBottomEdge >= bottomEdge))
                    ) {
                        // out of bounds
                        //console.log("LEFT OUT OF BOUNDS: " + $(this).attr('id'));
                    } else {
                        // in scope
                        listItems.push('#' + $(this).attr('id'));
                        //console.log($(this).attr('id') + ' is attached on the Left to ' + id + ' by ' + LeftEdgeComp);
                    }


                }
            }
        });

        return listItems;
    }


    function detect_attached(id) {

        var rightEdge = Math.round(parseFloat($(id).css('left'))) + Math.round(parseFloat($(id).css('width')));
        var topEdge = Math.round(parseFloat($(id).css('top')));
        var leftEdge = Math.round(parseFloat($(id).css('left')));
        var bottomEdge = Math.round(parseFloat($(id).css('top'))) + Math.round(parseFloat($(id).css('height')));


        //any attached to the right?
        $('.cell').each(function () {

            if (('#' + $(this).attr('id')) != id) {

                var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
                var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
                var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
                var thisTopEdge = Math.round(parseFloat($(this).css('top')));

                if (
                    (rightEdge == thisLeftEdge) &&
                    (thisTopEdge < bottomEdge) &&
                    (thisBottomEdge > topEdge)
                ) {
                    //console.log($(this).attr('id') + ' is attached on the Right to ' + id);
                }
            }
        });


        //any attached to the left?
        $('.cell').each(function () {

            if (('#' + $(this).attr('id')) != id) {

                var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
                var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
                var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
                var thisTopEdge = Math.round(parseFloat($(this).css('top')));

                if (
                    (leftEdge == thisRightEdge) &&
                    (thisTopEdge < bottomEdge) &&
                    (thisBottomEdge > topEdge)
                ) {
                    //console.log($(this).attr('id') + ' is attached on the Left to ' + id);
                }
            }
        });


        //any attached to the top?
        $('.cell').each(function () {

            if (('#' + $(this).attr('id')) != id) {

                var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
                var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
                var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
                var thisTopEdge = Math.round(parseFloat($(this).css('top')));

                if (
                    (topEdge == thisBottomEdge) &&
                    (thisLeftEdge < rightEdge) &&
                    (thisRightEdge > leftEdge)
                ) {
                    //console.log($(this).attr('id') + ' is attached on the Top to ' + id);
                }
            }
        });


        //any attached to the bottom?
        $('.cell').each(function () {

            if (('#' + $(this).attr('id')) != id) {

                var thisRightEdge = Math.round(parseFloat($(this).css('left'))) + Math.round(parseFloat($(this).css('width')));
                var thisBottomEdge = Math.round(parseFloat($(this).css('top'))) + Math.round(parseFloat($(this).css('height')));
                var thisLeftEdge = Math.round(parseFloat($(this).css('left')));
                var thisTopEdge = Math.round(parseFloat($(this).css('top')));

                if (
                    (bottomEdge == thisTopEdge) &&
                    (thisLeftEdge < rightEdge) &&
                    (thisRightEdge > leftEdge)
                ) {
                    //console.log($(this).attr('id') + ' is attached on the Bottom to ' + id);
                }
            }
        });

    }

    $(document).ready(function () {
        //calculate();
        //shrink('#block6');

        /*change_width('#block6', 0.35);

        setTimeout(function(){
            //shrink('#block19');
            change_width('#block19', 0.35);
        },7000);*/
        /*setTimeout(function(){
            shrink('#block5');
            change_width('#block5', 0.35);
        },5000);*/
        setTimeout(function(){
           /* $('#block6').animate({
                width: '26%'
            },9000, 'easeInOutCubic');
            $('#block7').animate({
                width: '52%',
                height: '20%',
                left: '39%'
            },9000, 'easeInOutCubic');
            $('#block8').animate({
                width: '16%',
                height: '38%',
                top: '29%',
                left: '39%'
            },9000, 'easeInOutCubic');
            $('#block9').animate({
                width: '36%',
                height: '38%',
                top: '29%',
                left: '55%'
            },9000, 'easeInOutCubic');*/

            TweenLite.to("#block1", 7, {
                height: '19%',
                ease: Power2.easeInOut
            } );
            TweenLite.to("#block5", 7, {
                height: '59%',
                top: '19%',
                ease: Power2.easeInOut
            } );

            TweenLite.to("#block6", 7, {
                width: '26%',
                top: '19%',
                height: '48%',
                ease: Power2.easeInOut
            } );
            TweenLite.to("#block7", 7, {
                width: '52%',
                height: '20%',
                left: '39%',
                ease: Power2.easeInOut
            } );
            TweenLite.to("#block8", 7, {
                width: '30%',
                height: '38%',
                top: '29%',
                left: '39%',
                ease: Power2.easeInOut
            } );
            TweenLite.to("#block9", 7, {
                width: '22%',
                height: '38%',
                top: '29%',
                left: '69%',
                ease: Power2.easeInOut
            } );
        },500);
    });
</script>

</body>
</html>

