<?php
class Achievements{
	private $id;
	private $achievement;

	public static function connect(){
		return new mysqli("classroom.cs.unc.edu", "lilla", "CH@ngemenow99Please!lilla", "lilladb");
	}

	public function getJSON(){
		$json_obj = array('AchivementID' => $this->id,
			'Achievement' => $this->achievement);
		return json_encode($json_obj);
	}
}
?>