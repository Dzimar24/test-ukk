<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Category_model
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

class Category_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function viewDataCategory()
  {
    // 
		$this->db->select('*');
		$this->db->from('kategori');
		$query = $this->db->get()->result_array();
		return $query;
  }

  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------
	public function add($post)
	{
		# code...
		$dataSave['NamaKategori'] = $post['name'];

		$this->db->insert('kategori', $dataSave);
		
	}
	// ------------------------------------------------------------------------

}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */
