<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller BorrowingDetails
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class BorrowingDetails extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('BorrowingDetails_model', 'bdm');
	}

	public function index()
	{
		$data['titlePage'] = "Borrowing Details";
		$data['titleTableName'] = "Table All Borrowing";
		$data['viewAllDataBorrowing'] = $this->bdm->viewAllDataBorrowingDetails();
		$data['getAllDataUserBorrowing'] = $this->bdm->userAllDataBorrowing();
		$this->template->load('template', 'Pages/admin/borrowingDetails', $data);
	}

	public function approved($id)
	{
		if (!$id) {
			# code...
			$this->session->set_flashdata('error', 'Failed Approved Borrowing !!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data = array(
			'status' => 'approved',
			'updated_at' => date('Y-m-d H:i:s')
		);

		$this->bdm->approved($id, $data);

		$this->session->set_flashdata('success', 'Success Approved Borrowing !!');

		// Redirect kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function completed($id)
	{
		if (!$id) {
			# code...
			$this->session->set_flashdata('error', 'Failed Completed Borrowing !!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data = array(
			'status' => 'completed',
			'updated_at' => date('Y-m-d H:i:s')
		);

		// Update status peminjaman
		$this->bdm->completed($id, $data);

		$this->session->set_flashdata('success', 'Success Completed Borrowing !!');

		// Redirect kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function rejected($id)
	{
		# code...
		if (!$id) {
			# code...
			$this->session->set_flashdata('error', 'Failed Completed Borrowing !!');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$data = array(
			'status' => 'rejected',
			'updated_at' => date('Y-m-d H:i:s')
		);

		// Update status peminjaman
		$this->bdm->rejected($id, $data);

		$this->session->set_flashdata('success', 'Success Rejected Borrowing !!');

		// Redirect kembali ke halaman sebelumnya
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function print()
	{
		//? Retrieve data from the form
		$userId = $this->input->post('inputUser');
		$startDate = $this->input->post('startDate');
		$endDate = $this->input->post('endDate');

		$dataRage = $this->bdm->getDateRange();

		//? Condition if startDate is empty 
		if (empty($startDate)) {
			$startDate = $dataRage->min_date;
		}

		//? Condition if endDate is empty 
		if (empty($endDate)) {
			$endDate = $dataRage->max_date;
		}

		//? Get the borrowing details data
		$data['borrowingDetails'] = $this->bdm->selectDataBorrowingDetails($userId, $startDate, $endDate);

		//? Prepare the view data
		$data['startDate'] = $startDate;
		$data['endDate'] = $endDate;

		//? Load the print view
		$this->load->view('Pages/admin/borrowingDetailsPrint', $data, FALSE);
	}
}


/* End of file BorrowingDetails.php */
/* Location: ./application/controllers/BorrowingDetails.php */
