<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Index_model
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

class Index_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function viewDataBook()
  {
    // 
		$this->db->select('*');
		$this->db->from('buku');
		$this->db->join('kategori', 'kategori.KategoriID = buku.idKategory', 'left');
		$query = $this->db->get()->result_array();
		return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Index_model.php */
/* Location: ./application/models/Index_model.php */
