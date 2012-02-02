<form action="<?= base_url('login') ?>" method="post">
	<table>
		<?php
		$input_username = array('name'      => 'username',
		                        'label'     => '使用者名稱',
								'id'        => 'username',
		              	        'maxlength' => '100',
		              			'size'      => '50',
								'autofocus' => 'autofocus');

		echo ost_form_input($input_username);
		?>
	</table>
</form>
