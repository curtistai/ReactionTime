<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
    <title> Reaction Time </title>
	<link rel="stylesheet" type="text/css" href="jsCss/css/answering.css">
	<script>
		var setId;
		$(document).ready(function(){
			$("#start").hide();
			$(window).keypress(function(event) {
				if (event.which == 49 || event.which == 50){
					setId = event.which - 48;
					$("#start").show();
					$("#combox").hide();
				}
				if (event.which == 32){
					window.location.replace("answering.php?setId="+setId);
				}
			});
		});

	</script>
</head>
<body>
	<div id="combox" class="notify">Input 1 / 2 to Choose Question Set</div>
	<div id="start" class="notify">Press Blank Space to Start</div>
</body>
</html>