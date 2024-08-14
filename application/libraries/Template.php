<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Libraries Template
 *
 * This Libraries for ...
 * 
 * @package		CodeIgniter
 * @category	Libraries
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Template
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    // 
  }

	var $templateData = [];

	function set($name, $value) {
		$this->templateData[$name] = $value;
	}

	function load($template = '', $view = '', $view_data = array(), $return = FALSE) {
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		return $this->CI->load->view($template, $this->templateData, $return);
	}

  // ------------------------------------------------------------------------
}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */
