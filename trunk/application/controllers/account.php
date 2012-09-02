<?php
/**
 * Account
 *
 * 帳號管理Controller
 **/
class Account extends CI_Controller
{
	/**
	 * 顯示帳號資料
	 **/
	public function index()
	{
		$data['css'] = array('account/index');
		$data['layout_title'] = '帳號管理';

		$this -> load -> helper('ost_form');

		$this -> layout -> view('account/index', $data);

	}

	/**
	 * 新增帳號
	 */
	public function add()
	{
		$data['css'] = array('form');
		$data['layout_title'] = '新增帳號';

		$this -> load -> helper('ost_form');
		$this -> load -> helper('forms_teacher');

		if ($this -> input -> post()) {
			$this -> load -> model('teacher');
			if ($this -> teacher -> validate() == TRUE) {
				$this -> teacher -> add();
				message_save('新增完成');
				redirect('account');
			} else {
				// 產生錯誤頁面
				echo 'error';
			}
		} else {
			$this -> layout -> view('account/add', $data);
		}
	}

}
?>