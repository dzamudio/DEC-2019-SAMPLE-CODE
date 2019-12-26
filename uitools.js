var nodeObj;
class CloudConnect {

	constructor() {
		// console.log("cloud connection established");
		// does nothing
		// sets View 1A
		this.nodeType = null;
		this.i = 0;
		// constructors don't return anything
		console.log("Cloud Connect has been initialized, current nodeType is: " + this.nodeType);
	}

	// sets master UI and a flag is set in the cloud
	become(type) {
		// send flag to cloud with timestamp, this helps the controller
		clearTimeout(citizenTimeout);
		this.nodeType = type;
		return this.setSelf();
	}

	// sets slave
	becomeSlave() {
		// send flag to cloud with timestamp, this helps the controller
		// also creates the interval to check for updates/or messages from cloud (model)
		//this.nodeType = 'slave';
		//return this.setSelf();
	}

	// hides initial form view
	hideFormView() {
		$('#view-form').hide();
	}

	showMasterView() {
		$('#view-master').show();
	}

	// sets flag
	setSelf() {

		var superView = this;

		$.ajax({
			url: "controllers/?nodeType=" + this.nodeType,
			success: function(data) {
				console.log(data);
				if ( data.status == 200 ){
					superView.hideFormView();
					$('label').each(function(){
						nodeObj = $(this);
						if ( nodeObj[0]["attributes"][1]["nodeValue"] == data.nodeType ) {
							$(this).css({color:'#42d242'});
						}else{
							$(this).css({color:'white'});
							if( data.nodeType == 'WAIT' ){
								clearTimeout(citizenTimeout);
							}
						}

						if ( data.nodeType == 'MASTER' ) {
							superView.showMasterView();
						}
					});

				}
			}
		});
	}

	// unsets all flags
	unset(){
		$.ajax({
			url: "controllers/?unsetAll=1",
			success: function(data) {
				if ( data.status == 200 ){

				}
				return data;
			}, j
		});
	}

	nodeType(){
		return this.nodeType;
	}

	/*
	 Networking 
	 */

	// routine ping 
	pingUpdate() {
		clearTimeout("timeToPing");
		return("Update 'returned' for " + this.nodeType);
	}

	// ping timer
	pingTimer(timer1) {
		clearTimeout("timeToPing");
		timeToPing = setTimeout("pingUpdate()",timer1);
		return("Ping starting in " + timer1 + "ms")
	}

}

//let cloud = new cloudConnect();

function centerCenter(targetID){
	var elem = $(targetID);
	var realScreen = $('#realScreen');

	elem.css({
		left: ( Math.ceil(realScreen.width()/2) - Math.ceil(elem.width()/2) ) + 'px',
		top: Math.ceil( Math.ceil(realScreen.height()/2) - Math.ceil(elem.height()/2) ) + 'px'
	});
}

function setTimeSequence(){

	clearTimeout(citizenTimeout);

	var newDate = new Date();
	// zero beginning	
	
	var theHour = newDate.getHours();
	var theMinutes = newDate.getMinutes();
	var theSeconds = newDate.getSeconds();
	var theMilli = newDate.getMilliseconds();
	
	// What's the incentive
	hoursData = ( 				(theHour < 10 			? ('0'+theHour) : theHour ) );
	minutesData = ( 			(theMinutes < 10 		? ('0'+theMinutes) : theMinutes ) );
	secondsData = ( 			(theSeconds < 10 		? ('0'+theSeconds) : theSeconds ) );
	millisecData = ( 			(theMilli < 100 		? ('0'+""+theMilli+"") : theMilli ) );
	millisecData = ( 			(theMilli < 10 			? ('00'+""+theMilli+"") : theMilli ) );

	citizen.html( "<span id='hours'>"+hoursData+"</span>:"
				+"<span id='minutes'>"+minutesData+"</span>:"
				+"<span id='seconds'>"+secondsData+"</span>:"
				+"<span id='millisec'>"+millisecData+"</span>" );

	// Mandatory breaking flag
	timeCount++;

	citizenTimeout = setTimeout(function(){
		setTimeSequence();
	},101);

	/*if ( hoursData <= 22 && minutesData < 59 ) {
		citizenTimeout = setTimeout(function(){
			setTimeSequence();
		},101);
	} else { 
		TweenLite.to(
			citizen,
			1.2,
			{scale: 0.0, transformOrigin: "center center"}
		);
		loadYT();
	}*/
}

function loadYT(){
	$('#realScreen').html("<iframe src='https://www.youtube.com/embed/1Jpl6qA499Q?autoplay=1&controls=0&start=511' width='480' height='270' ></iframe>");
}

//$('#clock').css({});