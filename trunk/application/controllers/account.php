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
		$data['layout_title'] = '帳號管理';

		$this -> load -> helper('ost_form');
		
		$this -> layout -> view('account_index', $data);

	}

	/**
	 * 新增帳號
	 */
	public function add()
	{
		$data['css'] = array('form');
		$data['layout_title'] = '新增帳號';
		
		$this -> load -> helper('ost_form');
		
		$this -> layout -> view('account', $data);
	}

}
?>