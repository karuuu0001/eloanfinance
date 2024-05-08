<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_portal extends CI_Controller {

	//checked the role if your session is visitor if yes you can access
	//controller function you cant goback to user page access when you logout
	public function __construct()
	{
		parent :: __construct();

		$this->load->model('account_model');
		$is_logged_in = $this->account_model->is_user_logged_in();

		if ( $is_logged_in )
		{
			if ( $_SESSION['role'] != USER_ROLE_VISITOR)
			{
				redirect('/');
			}
		}
		else
		{
			redirect('/');
		}
	}

	public function index()
	{	
		$this->load->model('user_model');

			$id = $_SESSION['user_id'];
			$data['profile'] = $this->user_model->get_profile_information($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/index');
		$this->load->view('visitor_portal/_footer');
	}

	public function loan1()
	{	
		$this->_loan_submit();

		$this->load->model('user_model');

			$id = $_SESSION['user_id'];
			$data['profile'] = $this->user_model->get_profile_information($id); 

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/loan1');
		$this->load->view('visitor_portal/_footer');
	}
	//////////////////
	public function _loan_submit()
		{
			if ( $this->input->post('submit') )
			{
				$this->form_validation->set_rules('gcash_name', 'Gcash Name', 'trim|required');
				$this->form_validation->set_rules('contact_no','Gcash Name', 'trim|required',);
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
	
				if ($this->form_validation->run() != false)
				{
				$this->load->model('user_model');
				$response = $this->user_model->save_loan_record();
	
				if( $response )
				{
					$this->session->set_flashdata('submit_success', 'The Data was successfully saved');
				}
	
				
				else 
				{
					$this->session->set_flashdata('submit_error', 'Sorry an error an occured the data was not saved.');
				}
	
				redirect('visitor_portal/loan1');
				}
			}
		}

	public function history()
	{	
		$this->load->model('user_model');

		
		$userId = $_SESSION['user_id'];
		$data['loans'] = $this->user_model->getUserLoans($userId);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/history');
		$this->load->view('visitor_portal/_footer');
	}


	public function personal_information()
	{	
		$this->load->model('user_model');

			$id = $_SESSION['user_id'];
			$data['profile'] = $this->user_model->get_profile_information($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/personal_information');
		$this->load->view('visitor_portal/_footer');
	}

	public function personal_information_edit()
	{	
		$this->_personal_information_edit_submit();

		$this->load->model('user_model');

			$id = $_SESSION['user_id'];
			$data['profile'] = $this->user_model->get_profile_information($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/personal_information_edit');
		$this->load->view('visitor_portal/_footer');
	}

	//
	public function _personal_information_edit_submit()
	{
		if ( $this->input->post('submit') )
		{
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required');
			$this->form_validation->set_rules('mname','Middle Name', 'trim|required',);
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required');
			

			if ($this->form_validation->run() != false)
			{
				$this->load->model('user_model');
			$response = $this->user_model->update_post_record();

			if( $response )
			{
				$this->session->set_flashdata('submit_success', 'The Data was successfully updated');

				redirect('visitor_portal/personal_information');
			}
			else 
			{
				$this->session->set_flashdata('submit_error', 'Sorry an error an occured the data was not updated.');
				
				redirect('visitor_portal/personal_information_edit');
			}
			
			}
		}
	}

	//profile picture
	public function profile_picture_edit()
	{	
	

		$this->load->model('user_model');

			$id = $_SESSION['user_id'];
			$data['profile'] = $this->user_model->get_profile_information($id);

		$this->load->view('visitor_portal/_header', $data);
		$this->load->view('visitor_portal/profile_picture_edit');
		$this->load->view('visitor_portal/_footer');
	}
}



