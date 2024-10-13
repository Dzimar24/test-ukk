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
		$this->db->select('b.BukuID, b.Judul, b.Penulis, b.Penerbit, b.TahunTerbit, b.coverBook, k.NamaKategori, b.deskripsi');
		$this->db->from('temporaryborrowing tb');
		$this->db->join('buku b', 'tb.idBook = b.BukuID');
		$this->db->join('kategori k', 'b.idKategory = k.KategoriID');
		$this->db->where('tb.idUser', $this->session->userdata('UserID'));
		$this->db->group_by('b.BukuID'); // Menghindari duplikasi

		$query = $this->db->get();
		return $query->result_array();
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function viewDataBook()
	{
		$this->db->select('buku.*');
		$this->db->from('buku');
		$this->db->join('temporaryborrowing', 'buku.BukuID = temporaryborrowing.idBook', 'left');
		$this->db->where('temporaryborrowing.idBook IS NULL');
		$query = $this->db->get();
		return $query->result_array();
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function addBorrowing($idUser, $idBook)
	{
		// Siapkan array data untuk dimasukkan ke database
		$data = array();

		// Loop melalui setiap buku yang dipilih dan masukkan ke array
		foreach ($idBook as $value) {
			array_push($data, array(
				'idUser' => $idUser,
				'idBook' => $value,
			));
		}

		log_message('debug', 'Data to be inserted: ' . print_r($data, true));
		// Masukkan data ke tabel temporaryborrowing
		$result = $this->db->insert_batch('temporaryborrowing', $data);
		log_message('debug', 'Insert result: ' . ($result ? 'true' : 'false') . ', Affected rows: ' . $this->db->affected_rows());
		if (!$result) {
			log_message('error', 'Database error: ' . $this->db->error()['message']);
		}

		// Kembalikan true jika berhasil, false jika gagal
		return $result;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function getUpdatedBorrowingData($idUser)
	{
		// Query untuk mengambil data peminjaman terbaru untuk user tertentu
		$this->db->select('b.BukuID, b.Judul')
			->from('temporaryborrowing tb')
			->join('buku b', 'tb.idBook = b.BukuID')
			->where('tb.idUser', $idUser);

		$query = $this->db->get();
		return $query->result_array();
	}
	// ------------------------------------------------------------------------

}

/* End of file Borrowing_model.php */
/* Location: ./application/models/Borrowing_model.php */
