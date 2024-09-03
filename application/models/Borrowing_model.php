<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Borrowing_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Borrowing_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function viewDataBorrowing()
  {
    // 
		$this->db->select('*');
		$this->db->from('borrowing');
		$this->db->join('buku', 'buku.BukuID = borrowing.idBuku', 'left');
		$query = $this->db->get()->result_array();
		return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Borrowing_model.php */
/* Location: ./application/models/Borrowing_model.php */
