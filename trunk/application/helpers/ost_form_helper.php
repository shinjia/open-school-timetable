<?php
/**
 * 覆載CI的Helper
 **/

/**
 * input hepler
 **/
function ost_form_input($data)
{
	$ci = &get_instance();
	$ci -> load -> helper('form');
	return '<tr><td class="label">' . form_label($data['label'], $data['name']) . '</td><td class="input_field">' . form_input($data) . '</td></tr>';
}

/**
 * password hepler
 **/
function ost_form_password($data)
{
	$ci = &get_instance();
	$ci -> load -> helper('form');
	return '<tr><td class="label">' . form_label($data['label'], $data['name']) . '</td><td class="input_field">' . form_password($data) . '</td></tr>';
}

/**
 * submit hepler
 **/
function ost_form_submit($name = NULL, $value = NULL)
{
	$ci = &get_instance();
	$ci -> load -> helper('form');
	return '<tr><td class="submit">' . form_submit($name, $value) . '</td><td></td></tr>';
}
?>