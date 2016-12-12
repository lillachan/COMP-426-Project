<?php
class HighScores{
	private $id;
	private $highscore;

	public static function connect(){
		return new mysqli("classroom.cs.unc.edu", "lilla", "CH@ngemenow99Please!lilla", "lilladb");
	}

	public function getJSON(){
		$json_obj = array('HighScoreID' => $this->id,
			'Highscore' => $this->highscore);
		return json_encode($json_obj);
	}
}
?>