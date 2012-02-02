<?php
/**
 * 覆載CI的Helper
 **/

/**
 * input hepler
 **/
function ost_form_input($data)
{
	$ci=& get_instance();
    $ci->load->helper('form');
	return '<tr><td class="">' . form_label($data['label'], $data['name']) .'</td><td>' . form_input($data) . '</td></tr>';
}

/**
 * password hepler
 **/
function ost_form_password($data)
{
	$ci=& get_instance();
    $ci->load->helper('form');
	return '<tr><td class="">' . form_label($data['label'], $data['name']) .'</td><td>' . form_password($data) . '</td></tr>';
}

/**
 * submit hepler
 **/
function ost_form_submit($name = NULL, $value = NULL)
{
	$ci=& get_instance();
    $ci->load->helper('form');
	return '<tr><td class="">' . form_submit($name, $value) .'</td><td></td></tr>';
}
?>