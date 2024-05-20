<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_portal extends CI_Controller {

    protected $data;

	//checked the role if your session is visitor if yes you can access
	//controller function you cant goback to user page access when you logout
	public function __construct()
	{
		parent :: __construct();

		$this->load->model('account_model');
		$is_logged_in = $this->account_model->is_user_logged_in();

		if ( $is_logged_in )
		{
			if ( $_SESSION['role'] != USER_ROLE_ADMIN)
			{
				redirect('/');
			}
		}
		else
		{
			redirect('/');
		}
              $this->load->model('user_model');

			$id = $_SESSION['user_id'];
			$this->data['profile'] = $this->user_model->get_profile_information($id);
        
	}
    

	public function index()
	{	
        $this->users_list();
	}

	public function users_list()
	{	
		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_active_users();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/users_list');
		$this->load->view('admin_portal/_footer');
	}

	public function users_loan_list()
	{	

		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_loan_list();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/users_loan_list');
		$this->load->view('admin_portal/_footer');
	}

	public function users_loan_list_approved()
	{	

		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_loan_list_approved();

		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/users_loan_list');
		$this->load->view('admin_portal/_footer');
	}


	public function users_list_deactivated()
	{	
		$this->load->model('user_model');
		$this->data['result'] = $this->user_model->get_all_deactivated_users();


		$this->load->view('admin_portal/_header', $this->data);
		$this->load->view('admin_portal/users_list_deactivated');
		$this->load->view('admin_portal/_footer');
	}
	
	public function deactivate_user($id)
	{
		$this->load->model('user_model');
		$response = $this->user_model->deactivate_user($id);

		if ($response)
		{
			$this->session->set_flashdata('submit_success', 'The user was successfully deactivated.');
		}
		else
		{
			$this->session->set_flashdata('submit_error', 'Sorry! An error occur the user was not deactivated.');
		}

		redirect ('admin_portal/users_list');
	}

	public function reactivate_user($id)
	{
		$this->load->model('user_model');
		$response = $this->user_model->reactivate_user($id);

		if ($response)
		{
			$this->session->set_flashdata('submit_success', 'The user was successfully Reactivated.');
		}
		else
		{
			$this->session->set_flashdata('submit_error', 'Sorry! An error occur the user was not Reactivated.');
		}

		redirect ('admin_portal/users_list_deactivated');
	}

	public function approve_loan($id)
	{
		$this->load->model('user_model');
		$response = $this->user_model->approve_loan($id);

		if ($response)
		{
			$this->session->set_flashdata('submit_success', 'The user was successfully Reactivated.');
		}
		else
		{
			$this->session->set_flashdata('submit_error', 'Sorry! An error occur the user was not Reactivated.');
		}

		redirect ('admin_portal/users_loan_list');
	}
}



