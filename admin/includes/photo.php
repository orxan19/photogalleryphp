<?php  
class Photo extends Db_object{
	protected static $db_table = "photos";
	protected static $db_table_fields = array('id', 'title', 'caption','description', 'filename', 'alternate_text', 'type', 'size');

	public $id;
	public $title;
	public $description;
	public $filename;
	public $alternate_text;
	public $caption;
	public $type;
	public $size;


	public $tmp_path;
	public $upload_directory = "images";

	public $errors = array();

  public	$upload_errors_array = array(
	UPLOAD_ERR_OK 				=> "UPLOAD_ERR_OK",
	UPLOAD_ERR_INI_SIZE 	=> "UPLOAD_ERR_INI_SIZE",
	UPLOAD_ERR_FORM_SIZE 	=> "UPLOAD_ERR_FORM_SIZE",
	UPLOAD_ERR_PARTIAL 		=> "UPLOAD_ERR_PARTIAL",
	UPLOAD_ERR_NO_FILE 		=> "UPLOAD_ERR_NO_FILE",
	UPLOAD_ERR_NO_TMP_DIR => "UPLOAD_ERR_NO_TMP_DIR",
	UPLOAD_ERR_CANT_WRITE => "UPLOAD_ERR_CANT_WRITE",
	UPLOAD_ERR_EXTENSION 	=> "UPLOAD_ERR_EXTENSION"
	);

public function set_file($file){

	if(empty($file) || !$file || !is_array($file)) {
		$this->errors[] = "There is no file uploaded";
		return false;
	} elseif($file['error'] != 0){

			$this->errors[] = $this->upload_errors_array[$file['error']];
			return false;
	} else{

		$this->filename = basename($file['name']);
		$this->tmp_path = $file['tmp_name'];
		$this->type = 		$file['type'];
		$this->size = 		$file['size'];

	}


}

public function picture_path(){
	return $this->upload_directory . DS . $this->filename;
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


	if($this->delete()){
		$target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();
		return unlink($target_path) ? true : false;

	} else {
		return false;
	}

}

	

}



?>