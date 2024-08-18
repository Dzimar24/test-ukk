<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model User_model
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

class User_model extends CI_Model
{

	// ------------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();
	}

	// ------------------------------------------------------------------------
	public function viewDataUser()
	{
		# code...
		$this->db->select('*');
		$this->db->from('user');
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------


	// ------------------------------------------------------------------------
	public function AddUser($post)
	{
		//? Insert To Database User
		$data['Username'] = $post['username'];
		$data['Password'] = $post['password'];
		$data['Email'] = $post['email'];
		$data['NamaLengkap'] = $post['name'];
		$data['Alamat'] = $post['alamat'];
		$data['level'] = $post['level'];

		$this->db->insert('user', $data);
	}

	// ------------------------------------------------------------------------
	
	// ------------------------------------------------------------------------
	public function viewDataEditUser($id){
		$this->db->select('*')->from('user')->where('UserID', $id);
		$query = $this->db->get()->result_array();
		return $query;
	}
	// ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
