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
  
	// ------------------------------------------------------------------------
  public function addBorrowing($idUser, $idBook, $startBorrowing, $endBorrowingWithTime)
	{
		# code...
		$saveData['idUser'] = $idUser;
		$saveData['idBuku'] = $idBook;
		$saveData['borrow_date'] = $startBorrowing;
		$saveData['return_date'] = $endBorrowingWithTime;
		$saveData['status'] = 'Please wait';
		$saveData['created_at'] = date('Y-m-d H:i:s');
		$saveData['updated_at'] = NULL;

		$this->db->insert('borrowing', $saveData);
	}
	// ------------------------------------------------------------------------

}

/* End of file Index_model.php */
/* Location: ./application/models/Index_model.php */
