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
	
	// ------------------------------------------------------------------------
	public function viewDataLevel($id){
		$this->db->select('*')->from('user');
		$this->db->where('UserID', $id);
		$dataLevel = $this->db->get()->row();
		return $dataLevel;
	}
	// ------------------------------------------------------------------------
	
	// ------------------------------------------------------------------------
	public function updateUser($post, $id)
	{
		# code...
		$updateData['Username'] = $post['usernameUpdate'];
		$updateData['Email'] = $post['emailUpdate'];
		$updateData['NamaLengkap'] = $post['nameUpdate'];
		$updateData['level'] = $post['levelUpdate'];
		$updateData['Alamat'] = $post['alamatUpdate'];

		$this->db->where('UserID', $id);
		$this->db->update('user', $updateData);
	}
	// ------------------------------------------------------------------------
	
	// ------------------------------------------------------------------------
	public function get_user_by_id($id){
		$query = $this->db->get_where('user', array('UserID' => $id));
		return $query->row();
	}
	// ------------------------------------------------------------------------

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
