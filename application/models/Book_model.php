<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Book_model
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

class Book_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
	public function viewDataCategoryBook()
	{
		$this->db->select('*')->from('kategori');
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function viewDataBook()
	{
		$this->db->from('buku');
		$this->db->join('kategori', 'buku.idKategory = kategori.KategoriID', 'left');

		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function addDataBook($data)
	{
		$this->db->insert('buku', $data);
		return $this->db->affected_rows() > 0;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function viewDataEditBook($id)
	{
		$this->db->select('*')->from('buku')->where('BukuID', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function updateDataBook($id, $data)
	{
		$this->db->where('BukuID', $id);
		return $this->db->update('buku', $data);
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function getOldCover($id)
	{
		$this->db->select('coverBook');
		$this->db->where('BukuID', $id);
		$query = $this->db->get('buku');
		if ($query->num_rows() > 0) {
			return $query->row()->coverBook;
		}
		return null;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function getBookById($id)
	{
		return $this->db->get_where('buku', ['BukuID' => $id])->row();
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function deleteBook($id)
	{
		return $this->db->delete('buku', ['BukuID' => $id]);
	}
	// ------------------------------------------------------------------------

}

/* End of file Book_model.php */
/* Location: ./application/models/Book_model.php */
