<?php
class teacher extends CI_Model
{
	private $_tableName = 'teacher';

	function __construct()
	{
		parent::__construct();
	}

	function validate()
	{
		$this -> load -> library('form_validation');
		$this -> form_validation -> set_rules('teacher_name', '使用者名稱', 'required');
		return $this -> form_validation -> run();
	}

	function add()
	{
		$post_data = $this -> input -> post();			
		$data = array('teacher_id' => NULL, 
				      'teacher_name' => $post_data['teacher_name'], 
					  'teacher_account' => $post_data['teacher_account'], 
					  'teacher_password' => $post_data['teacher_password']);

		$this -> db -> insert($this -> _tableName, $data);
	}

}
?>