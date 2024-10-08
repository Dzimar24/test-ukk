<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

class Borrowing_model extends CI_Model
{

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
		$this->db->join('kategori', 'kategori.KategoriID = buku.idKategory', 'left');

		$query = $this->db->get()->result_array();
		return $query;
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
	public function viewDataBorrowingInTemporary()
	{
		$idUser = $this->session->userdata('UserID');

		//? View data for temporaryBorrowing
		$this->db->from('temporaryborrowing');
		$this->db->join('user', 'user.UserID = temporaryborrowing.idUser', 'left');
		$this->db->join('buku', 'buku.BukuID = temporaryborrowing.idBook', 'left');

		$this->db->where('idUser', $idUser);
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function viewDataBook()
	{
		$query = $this->db->get('buku')->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

}

/* End of file Borrowing_model.php */
/* Location: ./application/models/Borrowing_model.php */
