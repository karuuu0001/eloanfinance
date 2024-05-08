<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function save_post_record()
	{
		$user_id = (string) $this->input->post('user_id');
		$user_id = substr(uniqid('1', true), -2) . mt_rand(100,199);
		$fname = (string) $this->input->post('fname');
		$mname = (string) $this->input->post('mname');
		$lname = (string) $this->input->post('lname');
		$xname = (string) $this->input->post('xname');
		$username = (string) $this->input->post('username');
		$password = (string) $this->input->post('password');

		$data = array(
			'user_id'=>$user_id,
			'fname' => $fname,
			'mname' => $mname,
			'lname' => $lname,
			'xname' => $xname,
			'username' => $username,
			'password' => $password,
			'role' => USER_ROLE_VISITOR,
		);


		$response = $this->db->insert('users', $data);

		if( $response )
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	
	public function get_profile_information($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('users');
		$row = $query->row();

		if ($row)
		{
			$row->personal_information = $this->get_personal_information($id);
		}

		return $row;
	}

	public function get_personal_information($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('personal_information');
		$row = $query->row();

		if( empty($row) )
		{
			$row = array(
				'dob' => '',
				'pob' => '',
				'gender' => '',
				'cstatus' => '',
				'email' => '',
				'contact_no' => '',
				'photo' => ''
			);
		}

		return (object) $row;
	}

	public function update_post_record()
	{
		$user_id = (int) $this->input->post('user_id');

		$fname = (string) $this->input->post('fname');
		$mname = (string) $this->input->post('mname');
		$lname = (string) $this->input->post('lname');
		$xname = (string) $this->input->post('xname');
		
		$data = array(
			'fname' => $fname,
			'mname' => $mname,
			'lname' => $lname,
			'xname' => $xname,
			
		);

		$this->db->where('user_id', $user_id);
		$response = $this->db->update('users', $data);

		if( $response )
		{	
			$this->update_post_personal_information();
			return $user_id;
		}
		else
		{
			return FALSE;
		}
	}

	public function update_post_personal_information()
	{
		$user_id = (int) $this->input->post('user_id');

		$dob = (string) $this->input->post('dob');
		$pob = (string) $this->input->post('pob');
		$gender = (string) $this->input->post('gender');
		$cstatus = (string) $this->input->post('cstatus');
		$email = (string) $this->input->post('email');
		$contact_no = (string) $this->input->post('contact_no');
	
		
		$data = array(
			'user_id' => $user_id,
			'dob' => $dob,
			'pob' => $pob,
			'gender' => $gender,
			'cstatus' => $cstatus,
			'email' => $email,
			'contact_no' => $contact_no,
	
		);

		if( $this->is_personal_information_exist($user_id) )
		{
			$this->db->where('user_id', $user_id);
			$response = $this->db->update('personal_information', $data);

			if( $response ) 
			{
				return $user_id;
			} 
			else
			{
				return FALSE;
			}
		
		}
		else
		{
			$response = $this->db->insert('personal_information', $data);

			if( $response ) 
				{
				return $this->db->insert_id();
				} 
			else
				{
				return FALSE;
				}
		}
	}

	public function is_personal_information_exist($id)
	{
		$this->db->where('user_id', $id);
		$query = $this->db->get('personal_information');
		$row = $query->row();

		if( ($row) )
		{
			return true;
		}
		else
		{
			return false;
		}

	}
//////////////////
public function save_loan_record()
	{
		
		$user_id = (int) $this->input->post('user_id');
		
		$loan_id = (int) $this->input->post('loan_id');
		$ref_no = (string) $this->input->post('ref_no');
		$ref_no = mt_rand(1,99999999);
		$amount = (string) $this->input->post('amount');
		$contact_no = (string) $this->input->post('contact_no');
		$gcash_name = (string) $this->input->post('gcash_name');
		$email = (string) $this->input->post('email');

		$data = array(
			'loan_id' => $loan_id,
			'user_id' => $user_id,
			'ref_no' =>$ref_no,
			'contact_no' => $contact_no,
			'gcash_name' => $gcash_name,
			'email' => $email,
			'amount' => $amount,
		);


			$this->db->where('user_id', $user_id);
			$response = $this->db->insert('loan_table', $data);

			if( $response ) 
			{
				return $user_id;
			} 
			else
			{
				return FALSE;
			}
		
			$response = $this->db->insert('loan_table', $data);

			if( $response ) 
				{
				return $this->db->insert_id();
				} 
			else
				{
				return FALSE;
				}
			}

////////////////////////////
public function get_loan_information($id)
{
	$this->db->where('user_id', $id);
	$query = $this->db->get('loan_table');
	$row = $query->row();

	if ($row)
	{
		$row->personal_information = $this->get_personal_loan_information($id);
	}

	return $row;
}

public function get_personal_loan_information($id)
{
	$this->db->where('user_id', $id);
	$query = $this->db->get('loan_table');
	$row = $query->row();

	if( empty($row) )
	{
		$row = array(
			'ref_no' => '',
			'contact_no' => '',
			'gcash_name' => '',
			'email' => '',
			'amount' => '',
			'interest' => '',
			'status' => ''
		);
	}

	return (object) $row;
}

public function getUserLoans($userId) {
	$this->db->where('user_id', $userId);
	$query = $this->db->get('loan_table');
	return $query->result();
}
		
}
