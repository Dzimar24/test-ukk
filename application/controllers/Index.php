<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Index_model', 'index');
	}

	public function index() {
		$data['viewDataBook'] = $this->index->viewDataBook();
		$this->template->load('template', 'Pages/public/index', $data);
	}
}
