<?php
class Avatar{
	private $id;
	private $avatar;

	public static function connect(){
		return new mysqli("classroom.cs.unc.edu", "lilla", "CH@ngemenow99Please!lilla", "lilladb");
	}

	public function getJSON(){
		connect(); 
		$json_obj = array('AvatarID' => $this->id,
			'Avatar' => $this->avatar);
		return json_encode($json_obj);
	}
}
?>