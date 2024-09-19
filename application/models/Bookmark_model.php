<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Bookmark_model
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

class Bookmark_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function count_user_bookmarks($user_id)
	{
		//? Menghitung total bookmark berdasarkan user_id
		$this->db->where('UserID', $user_id);
		$total_bookmarks = $this->db->count_all_results('bookmark');
		return $total_bookmarks;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function viewDataBookmark($id)
	{
		$this->db->select('*')->from('bookmark');
		$this->db->join('buku', 'buku.BukuID = bookmark.BukuID', 'left');
		$this->db->join('kategori', 'kategori.KategoriID = buku.idKategory', 'left');
		$this->db->where('UserID', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function deleteBookmark($id)
	{
		$this->db->where('BukuID', $id);
		$this->db->delete('bookmark');
	}
	// ------------------------------------------------------------------------

}

/* End of file Bookmark_model.php */
/* Location: ./application/models/Bookmark_model.php */
