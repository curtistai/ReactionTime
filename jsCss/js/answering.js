var shownTime;
var clickTime;
var totalTime = 0;

var resultArray = new Array();
var arrayCounter = 0;
var setId = 0; // TODO
var finished = 0;

$(document).ready(function(){
    // Page Load
	$("#endBtn").hide();
	$("#resultTableDiv").hide();
	showButton();
	$('#resultTable').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": false,
        "bInfo": false,
        "bAutoWidth": false,
		"bJQueryUI": true
    } );
	
	$(window).keypress(function(event) { //#input
		if (finished == 0){
			clickTime = new Date().getTime();
			totalTime += clickTime-shownTime;
			if (event.which==99)
				resultArray[arrayCounter] = [arrayCounter,clickTime-shownTime,"T"];
			else if (event.which==109)
				resultArray[arrayCounter] = [arrayCounter,clickTime-shownTime,"N"];
			else
				alert("You have enter the wrong input! Please refresh the website and redo. Thank you.");
			arrayCounter++;
			showButton();
		}
	});


	/*
	$("#mandarinBtn").click(function(){
		clickTime = new Date().getTime();
		totalTime += clickTime-shownTime;
		resultArray[arrayCounter] = [arrayCounter,clickTime-shownTime,"N"];
		arrayCounter++;
		showButton();
	});
	$("#cantoneseBtn").click(function(){
		clickTime = new Date().getTime();
		totalTime += clickTime-shownTime;
		resultArray[arrayCounter] = [arrayCounter,clickTime-shownTime,"T"];
		arrayCounter++;
		showButton();
	});*/
	
	$("#endBtn").click(function(){
		checkAns();
	});
	
	$("#restart").click(function(){
		window.location.replace("start.php");	
	});
		
	function showButton(){
		if (arrayCounter < 20){
			$("#times").html(arrayCounter+1);
			var d = new Date();
			var n = d.getTime();
			// when random time occur show button

			//var rand = Math.round(Math.random() * (7000 - 500)) + 500;	
			var rand = 1000;
			$("#mandarinBtn").hide();
			$("#cantoneseBtn").hide();
			
			setTimeout(function() {
			$("#player"+(arrayCounter+1)).get(0).play();}, rand);	
			shownTime = new Date().getTime();			
		}else {
			$("#mandarinBtn").hide();
			$("#cantoneseBtn").hide();
			$("#endBtn").show();
			$("#times").hide();
		}
	}
	
	function checkAns(){
		finished = 1;
		$('#totalTime').text(totalTime/1000);
		for(var key in resultArray){
			if (resultArray[key][2]==ans[key]){
				$('#correctRow'+(resultArray[key][0]+1)).text("Correct");
			}
			if (resultArray[key][2]!=ans[key]){
				$('#correctRow'+(resultArray[key][0]+1)).text("Incorrect");
			}
			$('#timeRow'+(resultArray[key][0]+1)).text(resultArray[key][1]/1000);
		}
		$("#resultTableDiv").fadeIn(400);
		$("#result").hide();
		$("#times").hide();
		$("#buttonGroup").hide();

	}
});