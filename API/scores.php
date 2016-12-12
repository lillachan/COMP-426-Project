<?php
require_once("ORM/ScoresORM.php");
if(isset($_SERVER["PATH_INFO"])) {
	$path_components = explode("/", $_SERVER["PATH_INFO"]);
}
else {
	$path_components = null;
}
$input = json_decode(file_get_contents("php://input"));

if($_SERVER['REQUEST_METHOD'] == "GET") {
	header("Content-type: application/json");
	echo json_encode(ScoresORM::getScores());
	exit();
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	ScoresORM::insertScores($_POST["username"], $_POST["score"]);
	exit();
}
?>