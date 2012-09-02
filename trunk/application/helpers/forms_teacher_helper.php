<?php
function forms_teacher($action_url)
{
	$ci = &get_instance();
	$ci -> load -> helper('ost_form_helper');
	$string = '<form action="' . base_url($action_url) . '" method="post"><table>';

	$input_name = array('name' => 'teacher_name', 'label' => '姓名', 'id' => 'username', 'maxlength' => '10', 'size' => '20', 'required' => 'required', 'placeholder' => '請輸入姓名…', 'autofocus' => 'autofocus');
	$string .= ost_form_input($input_name);

	$input_account = array('name' => 'teacher_account', 'label' => '帳號', 'id' => 'username', 'maxlength' => '20', 'size' => '20', 'required' => 'required', 'placeholder' => '請輸入使用者帳號…');
	$string .= ost_form_input($input_account);

	$input_password = array('name' => 'teacher_password', 'label' => '密碼', 'id' => 'password', 'maxlength' => '20', 'size' => '20', 'required' => 'required');
	$string .= ost_form_password($input_password);

	$input_password_confirm = array('name' => 'teacher_password_confirm', 'label' => '確認密碼', 'id' => 'password_confirm', 'maxlength' => '20', 'size' => '20', 'required' => 'required');
	$string .= ost_form_password($input_password_confirm);

	$string .= ost_form_submit('submit', '建立帳號');

	$string .= '</table></form>';
	return $string;
}
?>