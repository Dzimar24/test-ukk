<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

class Index_model extends CI_Model
{

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
	public function check_existing_borrow()
	{
		# code...
		$this->db->select('*')->from('borrowing');
		$query = $this->db->get()->row();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function addBorrowing($idUser, $idBook, $startBorrowing, $endBorrowingWithTime)
	{
		$data = array();

		foreach ($idBook as $key => $value) {
			array_push($data, 
				array(
					'idUser' => $idUser,
					'idBuku' => $value,
					'borrow_date' => $startBorrowing,
					'return_date' => $endBorrowingWithTime,
					'status' => 'Please wait',
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => NULL
				)
			);
		}

		$this->db->insert_batch('borrowing', $data);
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function count_user_bookmarks($user_id)
	{
		// Menghitung total bookmark berdasarkan user_id
		$this->db->where('UserID', $user_id);
		$total_bookmarks = $this->db->count_all_results('bookmark');
		return $total_bookmarks;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function addBookmark($idBook, $idUser)
	{
		$saveData['BukuID'] = $idBook;
		$saveData['UserID'] = $idUser;
		$this->db->insert('bookmark', $saveData);
	}
	// ------------------------------------------------------------------------

}

/* End of file Index_model.php */
/* Location: ./application/models/Index_model.php */
