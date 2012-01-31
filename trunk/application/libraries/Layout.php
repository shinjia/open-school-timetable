<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{
	public $obj;
    public $layout;

    function Layout($layout = 'layout_default')
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
    }

    function setLayout($layout)
    {
    	$this->layout = $layout;
    }

    function view($view, $data = NULL, $return = FALSE)
    {
        $loadedData = array();
        $loadedData['layout_content'] = $this->obj->load->view($view, $data, TRUE);

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, TRUE);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, FALSE);
        }
    }
}
?>