<?php
/**
 * 預設首頁
 **/
class Home extends CI_Controller
{
    public function index()
	{
		$data['layout_title'] = '首頁';
		$this->layout->view('home', $data);
	}
}
?>