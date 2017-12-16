<?php 

class User extends Db_object{
	protected static $db_table = "users";
	protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_image');



	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;
	public $user_image;
	public $upload_directory = "images_user";
	public $image_placeholder = "http://placehold.it/300x300&text=photo";

	
	

public function upload_photo(){
	

		if(!empty($this->errors)){
			return false;
		}

		if(empty($this->user_image) || empty($this->tmp_path)){
			$this->errors[] = "the file was not available";
			return false;
		}

		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->user_image;

		if(file_exists($target_path)){
			$this->error[] = "The file {$this->user_image} already exists";
			return false;
		}

		if(move_uploaded_file($this->tmp_path, $target_path)){

		
				unset($this->tmp_path);
				return true;
			
		} else {
			$this->errors[] = "the file directory was not probably does not have permission";
			return false;
		}

	
}

public function picture_path(){
	return $this->upload_directory . DS . $this->user_image;
}

public function save(){
	if($this->id){

		$this->update();

	} else {

		if(!empty($this->errors)){
			return false;
		}

		if(empty($this->filename) || empty($this->tmp_path)){
			$this->errors[] = "the file was not available";
			return false;
		}

		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

		if(file_exists($target_path)){
			$this->error[] = "The file {$this->filename} already exists";
			return false;
		}

		if(move_uploaded_file($this->tmp_path, $target_path)){

			if($this->create()){

				unset($this->tmp_path);
				return true;
			}
		} else {
			$this->errors[] = "the file directory was not probably does not have permission";
			return false;
		}

	}
	
}

public function delete_photo(){


	$this->delete();
		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
		return unlink($target_path) ? true : false;


}

	public function image_path_and_placeholder(){
		return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory . DS . $this->user_image;
	}


	public static function verify_user($username, $password){
		global $database;

		$username = $database->escape_string($username); 
		$password = $database->escape_string($password);

		$sql = "SELECT * from " . self::$db_table .  " where ";
		$sql .= "username = '{$username}' AND ";
		$sql .= "password = '{$password}'";
		$sql .= " LIMIT 1";

		$the_result_array = self::find_by_query($sql);
				
		return !empty($the_result_array) ? array_shift($the_result_array) : false;


	}


} // End of user class

 ?>