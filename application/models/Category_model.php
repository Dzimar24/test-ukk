<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Category_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Muchamad Dzimar Ramadhan <ramadzimar@gmail.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Category_model extends CI_Model
{

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

	// ------------------------------------------------------------------------
	public function viewDataEditCategory($id)
	{
		# code...
		$this->db->select('*')->from('kategori')->where('KategoriID', $id);

		$query = $this->db->get()->row();
		return $query;
	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function editData($nameCategory)
	{
		$where = [
			'KategoriID' => $this->input->post('id'),
		];

		$data = [
			'NamaKategori' => $nameCategory
		];

		$this->db->update('kategori', $data, $where);

	}
	// ------------------------------------------------------------------------

	// ------------------------------------------------------------------------
	public function deleteData($id)
	{
		# code...
		$this->db->where('KategoriID', $id);
		$this->db->delete('kategori');
	}
	// ------------------------------------------------------------------------

}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */
