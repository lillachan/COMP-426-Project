<?php
class Users{
	private $id;
	private $username;

	public static function connect(){
		return new mysqli("classroom.cs.unc.edu", "lilla", "CH@ngemenow99Please!lilla", "lilladb");
	}

	public static functon topTen(){
		$mysqli = Users::connect();
		$result = $mysqli->query("SELECT TOP 10 Username, Highscore
					FROM `Users` u, `UserHighScores` j, `HighScores` h
					WHERE u.UserID = j.UserID
					AND j.HighScoreID = h.HighScoreID
					ORDER BY h.HighScore DESC;");
		$users = $result->fetch_array();

		return $users;
	}

	public function getJSON(){
		$json_obj = array('UserID' => $this->id,
			'Username' => $this->username);
		return json_encode($json_obj);
	}
}
?>