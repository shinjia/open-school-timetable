<form action="<?= base_url('login') ?>" method="post">
	<table>
		<?php
		$input_username = array('name'      => 'username',
		                        'label'     => '使用者名稱',
								'id'        => 'username',
		              	        'maxlength' => '20',
		              			'size'      => '20',
								'autofocus' => 'autofocus');
		echo ost_form_input($input_username);

		$input_password = array('name'      => 'password',
		                        'label'     => '密碼',
								'id'        => 'password',
		              	        'maxlength' => '20',
		              			'size'      => '20');
		echo ost_form_password($input_password);

        echo ost_form_submit('submit', '登入');
		?>
	</table>
</form>
