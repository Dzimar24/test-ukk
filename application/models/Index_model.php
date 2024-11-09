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
		$this->db->from('buku');
		$this->db->join('kategori', 'kategori.KategoriID = buku.idKategory', 'left');
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function check_existing_borrow()
	{
		$this->db->select('peminjaman_detail.buku_id, peminjaman.status');
		$this->db->from('peminjaman_detail');
		$this->db->join('peminjaman', 'peminjaman.id = peminjaman_detail.peminjaman_id', 'left');
		$query = $this->db->get();
		return $query->result();
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function addBorrowing($idUser, $idBook, $startBorrowing, $endBorrowingWithTime)
	{
		// Simpan data peminjaman ke dalam tabel peminjaman
		$borrowingData = array(
			'user_id' => $idUser,
			'tanggal_pinjam' => $startBorrowing,
			'tanggal_kembali' => $endBorrowingWithTime,
			'status' => 'pending',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => NULL
		);
		$this->db->insert('peminjaman', $borrowingData);
		$id_peminjaman = $this->db->insert_id();

		// Simpan data buku yang dipinjam ke dalam tabel peminjaman_detail
		$detailData = array();
		foreach ($idBook as $book) {
			$detailData[] = array(
				'id_peminjaman' => $id_peminjaman,
				'idBuku' => $book
			);
		}

		$this->db->insert_batch('peminjaman_detail', $detailData);
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function count_user_bookmarks($user_id)
	{
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

	// ------------------------------------------------------------------------
	public function viewFullDataBook($idBook)
	{
		$this->db->from('buku');
		$this->db->join('kategori', 'kategori.KategoriID = buku.idKategory', 'left');
		$this->db->where('buku.BukuID', $idBook);

		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function dataBookmark()
	{
		$this->db->select('BukuID');
		$this->db->from('bookmark');

		$query = $this->db->get();
		return $query->result();
	}
	// ------------------------------------------------------------------------

}

/* End of file Index_model.php */
/* Location: ./application/models/Index_model.php */
