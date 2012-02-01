<?php
/**
 * Login
 *
 * 登入Controller
 **/
class Login extends CI_Controller
{
	/**
	 * 顯示登入資料
	 **/
	public function index()
	{
		$data['layout_title'] = '使用者登入';
		$this->layout->view('login', $data);
	}
}
?>