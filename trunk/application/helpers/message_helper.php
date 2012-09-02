<?php
function message_save($message)
{
	$ci = &get_instance();
	$ci -> load -> library('session');
	$ci -> session -> set_flashdata('message', $message);
}

function message_read()
{
	$ci = &get_instance();
	$ci -> load -> library('session');
	if ($ci -> session -> flashdata('message')) {
		return '<div id="message_block">《' . $ci -> session -> flashdata('message') . '》</div>';
	}
}
?>