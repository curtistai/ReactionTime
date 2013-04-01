<!DOCTYPE html>

<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="jsCss/css/answering.css">
	<link rel="stylesheet" type="text/css" href="plugins/datatable/media/css/demo_page.css">
	<link rel="stylesheet" type="text/css" href="plugins/datatable/media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="plugins/datatable/media/css/demo_table_jui.css">
	<link rel="stylesheet" type="text/css" href="plugins/datatable/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css">

	<script type="text/javascript" language="javascript" src="plugins/datatable/media/js/jquery.dataTables.js"></script>
	<script src="jsCss/js/answering.js" ></script>

	<?php 
		include_once "include/db.php";
		$setId = $_GET['setId'];
		$db = new DB();
		$db->getAllQuestionAns($setId);
	?>
    <title> Reaction Time </title>
</head>
<body>
<div id="buttonGroup">
    <button id="mandarinBtn">Mandarin</button>
    <button id="cantoneseBtn">Cantonese</button>
	<button id="endBtn">Submit</button>
</div>
<div id="musicPlayer">
<?php
	include_once "include/db.php";

	$db = new DB();
	$db->getAllQuestionLink($setId);
	
?>

</div>
<div id="result">
	
</div>
<div id="times">
	
</div>
<div id="resultTableDiv">
	<h1>Result</h1>
	<button id="restart">Restart</button>
	<div id="setspan">QuestionSet :<span id="questionSet"> <?php echo $setId ?></span></div>
	<div id="timeSpan">Total Time :<span id="totalTime"> </span> mil.Second</div>
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="resultTable">
	<thead>
		<th>Question ID</th>
		<th>Question</th>
		<th>Correct?</th>
		<th>Time Used (mil.Second)</th>
	</thead>
	<tbody>
		<?php
			$db->getAllQuestionInTable($setId);
		?>
	</tbody>
	</table>
	

</div>
</body>
</html>