<form action="<?= base_url('account/add') ?>" method="post">
	<table>
		<?php
		$input_name = array('name' => 'name', 'label' => '姓名', 'id' => 'username', 'maxlength' => '10', 'size' => '20', 'required' => 'required', 'placeholder' => '請輸入姓名…', 'autofocus' => 'autofocus');
		echo ost_form_input($input_name);
		$input_account = array('name' => 'account', 'label' => '帳號', 'id' => 'username', 'maxlength' => '20', 'size' => '20', 'required' => 'required');
		echo ost_form_input($input_account);
		$input_password = array('name' => 'password', 'label' => '密碼', 'id' => 'password', 'maxlength' => '20', 'size' => '20', 'required' => 'required');
		echo ost_form_password($input_password);
		$input_password = array('name' => 'password', 'label' => '確認密碼', 'id' => 'confirm_password', 'maxlength' => '20', 'size' => '20', 'required' => 'required');
		echo ost_form_password($input_password);
		echo ost_form_submit('submit', '建立帳號');
		?>
	</table>

</form>