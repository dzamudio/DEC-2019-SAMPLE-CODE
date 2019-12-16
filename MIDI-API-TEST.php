<?php
/**
 * Created by PhpStorm.
 * User: DZ
 * Date: 4/8/2019
 * Time: 6:54 PM
 */

	$SERVER_HTTP_PATH = '/DZ1/'; /* <?php echo $SERVER_HTTP_PATH; ?> */
	$HTTP_PROTOCOL = 'http'; /* <?php echo $HTTP_PROTOCOL; ?> */
	$VERSION_CONTROL = '1.0.0.01'; /* <?php echo $VERSION_CONTROL; ?> */

?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>MIDIMACHTA</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<!-- JQUERY MOBILE
		<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
		-->
		<!-- JQUERY UI -->
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

		<!-- FONTS Source Sans Pro - Open Sans
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400|Open+Sans:400,300' rel='stylesheet' type='text/css'>
		-->

	</head>

	<body>
        <input type="button" value="REQUEST MIDI ACCESS" onclick="bootMIDI()" />
        <script type="text/javascript">

            function bootMIDI(){
                if(navigator.requestMIDIAccess){
                    alert("MIDI SUPPORT AVAILABLE");
                }else{
                    alert("MIDI SUPPORT NOT AVAILABLE");
                }

                window.navigator.requestMIDIAccess()
                    .then(onMIDISuccess, onMIDIFailure);
            }

            var MTEST;

            function onMIDISuccess(midiAccess){
                console.log(midiAccess);
                console.log(midiAccess.inputs.values());
                //var inputs = midiAccess.inputs;
                //var outputs = midiAccess.outputs;
                MTEST = midiAccess;
                for (var input of midiAccess.inputs.values()){
                    console.log("ITERATOR SEQ");
                    console.log(input);
                    input.onmidimessage = getMIDIMessage;
                }
            }

            function getMIDIMessage(midiMessage){
                //console.log(midiMessage);
                if(midiMessage.data.length == 3){
                    $('#log').append("<p style='margin:0;padding:0;font-family:arial;'>(<span style='color:red;'>"+midiMessage.data[0]+"</span>, <span style='color:green;'>"+midiMessage.data[1]+"</span>, <span style='color:blue;'>"+midiMessage.data[2]+"</span>)</p>");
                }
            }

            function onMIDIFailure(){
                alert("UNABLE TO ACCESS MIDI DEVICE(S).");
            }

            function startMIDIAccess(){
                window.navigator.requestMIDIAccess()
                    .then(function(access){
                        console.log(access);
                        // lists of available MIDI controllers
                            const inputs = access.input.values();
                            const outputs = access.outputs.values();

                            access.onstatechange = function(e){
                                //print info about (dis)connected MIDI controller
                                console.log(e.port.name, e.port.manufacturer, e.port.state);
                            }
                    })
            }

            $(document).ready(function(){
                //bootMIDI();
            });

        </script>
    <div id="log">

    </div>
	</body>
</html>
