<?php
include_once "include/db.php";

$db = new DB();
$db->displayDbRecord();
$db->getAllQuestionLink();
$db->closeDB();


?>