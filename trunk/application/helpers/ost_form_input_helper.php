<?php
/**
 * input hepler
 **/
function ost_form_input($data)
{
	$ci=& get_instance();
    $ci->load->helper('form');
	return '<tr><td class="">' . form_label($data['label'], $data['name']) .'</td><td>' . form_input($data) . '</td></tr>';
}
?>