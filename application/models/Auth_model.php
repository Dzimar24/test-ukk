<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Auth_model
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

class Auth_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function insertData($post)
  {
    //!  Insert Data from Register to Database

		$data['Username'] = $post['username'];
		$data['Password'] = $post['password'];
		$data['Email'] = $post['email'];
		$data['NamaLengkap'] = $post['namaLengkap'];
		$data['Alamat'] = $post['alamat'];
		$data['level'] = 'Peminjam';

		$this->db->insert('user', $data);

  }

  // ------------------------------------------------------------------------

}

/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */
