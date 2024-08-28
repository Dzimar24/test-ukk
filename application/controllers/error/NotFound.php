<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Error
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class NotFound extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
		$this->load->view('errors/404.php');
  }

}


/* End of file Error.php */
/* Location: ./application/controllers/Error.php */
