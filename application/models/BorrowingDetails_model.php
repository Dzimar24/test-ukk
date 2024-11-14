<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model BorrowingDetails_model
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

class BorrowingDetails_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
	public function viewAllDataBorrowingDetails()
	{
		$this->db->from('peminjaman');
		$this->db->join('peminjaman_detail', 'peminjaman_detail.peminjaman_id = peminjaman.id', 'left');
		$this->db->join('buku', 'buku.BukuID = peminjaman_detail.buku_id', 'left');
		$this->db->join('user', 'user.UserID = peminjaman.user_id', 'left');
		$this->db->join('kategori', 'kategori.KategoriID = buku.idKategory', 'left');

		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function userAllDataBorrowing()
	{
		$this->db->distinct();
		$this->db->select('user.*');
		$this->db->from('peminjaman');
		$this->db->join('user', 'user.UserID = peminjaman.user_id', 'left');

		$query = $this->db->get()->result();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function approved($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('peminjaman', $data);
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function completed($id, $data)
	{
		# code...
		$this->db->where('id', $id);
		$this->db->update('peminjaman', $data);
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function rejected($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('peminjaman', $data);
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function selectDataBorrowingDetails($userId, $startDate, $endDate)
	{
		$this->db->select('user.NamaLengkap, user.Email, peminjaman.*, peminjaman_detail.*, buku.Judul');
		$this->db->from('peminjaman');
		$this->db->join('peminjaman_detail', 'peminjaman_detail.peminjaman_id = peminjaman.id', 'left');
		$this->db->join('user', 'user.UserID = peminjaman.user_id', 'left');
		$this->db->join('buku', 'buku.BukuID = peminjaman_detail.buku_id', 'left');

		// Check if $userId is not '-- User --'
		if ($userId !== '-- User --') {
			$this->db->where('peminjaman.user_id', $userId);
		}

		// Check if $startDate and $endDate are not empty
		if (!empty($startDate) && !empty($endDate)) {
			$this->db->where('peminjaman.tanggal_pinjam >=', $startDate);
			$this->db->where('peminjaman.tanggal_kembali <=', $endDate);
		}

		$this->db->order_by('peminjaman.tanggal_pinjam', 'asc');

		return $this->db->get()->result();
	}
	// ------------------------------------------------------------------------
	
	// ------------------------------------------------------------------------
	public function getDateRange() {
		$this->db->select('MIN(tanggal_pinjam) as min_date, MAX(tanggal_kembali) as max_date');
		$query = $this->db->get('peminjaman');  // Sesuaikan dengan nama tabel Anda
		return $query->row();
	}
	// ------------------------------------------------------------------------

}

/* End of file BorrowingDetails_model.php */
/* Location: ./application/models/BorrowingDetails_model.php */
