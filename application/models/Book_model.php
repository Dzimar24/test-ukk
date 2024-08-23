<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Book_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
 * @link      ...
 * @param     ...
 * @return    ...
 *
 */

class Book_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function viewDataCategoryBook()
  {
		$this->db->select('*')->from('kategori');
		$query = $this->db->get()->result_array();
		return $query;
  }
  // ------------------------------------------------------------------------
  
	// ------------------------------------------------------------------------
  public function viewDataBook(){
		$this->db->from('buku');
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------
	
	// ------------------------------------------------------------------------
	public function addDataBook($data){
		$this->db->insert('buku', $data);
	}
	// ------------------------------------------------------------------------

}

/* End of file Book_model.php */
/* Location: ./application/models/Book_model.php */
