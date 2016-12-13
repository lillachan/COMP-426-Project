<?php
class ScoresORM {
	public static function connect() {
		return new mysqli("classroom.cs.unc.edu",
						  "lilla",
						  "CH@ngemenow99Please!lilla",
						  "lilladb");
	}
	public static function getScores() {
		$mysqli = ScoresORM::connect();
		$result = $mysqli->query("select * from HighScores order by score desc limit 10");
		$scores_array = array();

		if($result) {
			while($next_row = $result->fetch_array()) {
				$scores_array[] = array("username"=>strval($next_row["username"]), "score"=>intval($next_row["score"]));
			}
		}

		return $scores_array;
	}

	public static function insertScores($user, $score) {
		$mysqli = ScoresORM::connect();
		$username = mysqli_real_escape_string($mysqli, $user);
		$user_score = intval($score);
		$result = $mysqli->query("insert into HighScores values ('$username', $user_score)");
	}
}
?>