<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	////////////////////////////////
	// below is for applicant UI////
	////////////////////////////////


	//for the registration submit
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

	//for calling out the function get_personal_information which contains your personal information
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

	//showing your personal information using your own ID Account
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

	//this is for updating the records or your personal information
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

	//its connected to the above function
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

	//if the personal information exist 
	//still connected to personal information
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

	//this is for saving a loan record or applying a loan
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


		//getting loan information 
		//only query your own ID
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


	//showing your personal loan table
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

	//showing the all your existing loans
	public function getUserLoans($userId) 
	{
		$this->db->where('user_id', $userId);
		$query = $this->db->get('loan_table');
		return $query->result();
	}

	//////////////////////
	//profile picture///.
	////////////////////

	public function update_post_profile_picture($file_name)
	{
		$user_id = (int) $this->input->post('user_id');

		$this->delete_actual_profile_picture($user_id);

		$data = array(
			'user_id' => $user_id,
			'photo' => $file_name,
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

	//deleting the existing profile picture when you try to upload again
	public function delete_actual_profile_picture($id)
	{
		$data = $this->get_personal_information($id);

		if( isset($data->photo) && !empty($data->photo))
		{
			$file_name = './uploads/'.$data->photo;
			

			if( file_exists($file_name))
			{
				return unlink($file_name);
			}
		}

		return TRUE;
	}

/////////////////////////////////////////
// below are the function for admin UI
///////////////////////////////////////

	//this is for admin UI

	//function for showing the active list for the admin portal
public function get_all_active_users()
	{
		$this->db->where('status', 'active');

		$this->db->group_start();
			$this->db->where('role', USER_ROLE_VISITOR);
		$this->db->group_end();
	
		$query = $this->db->get('users');
		$result = $query->result();

		return $result;
	}

	//function for showing the list for deactivated users
	public function get_all_deactivated_users()
	{
		$this->db->where('status', 'deactivated');

		$this->db->group_start();
			$this->db->where('role', USER_ROLE_VISITOR);
		$this->db->group_end();
	
		$query = $this->db->get('users');
		$result = $query->result();

		return $result;
	}

	//showing all the existing loans of the active users
	public function get_all_loan_list()
	{
		$this->db->where('status', 'pending');
	
		$query = $this->db->get('loan_table');
		$result = $query->result();

		return $result;
	}

	public function get_all_loan_list_approved()
	{
		$this->db->where('status', 'approved');
	
		$query = $this->db->get('loan_table');
		$result = $query->result();

		return $result;
	}

	//used for deactivating the users account
	public function deactivate_user($id)
	{
		$data = array(
			'status' => 'deactivated'
		);

		$this->db->where('user_id', $id);
		$response = $this->db->update('users', $data);

		if ($response)
		{
			return $id;
		}
		else
		{
			return FALSE;
		}
	}

	//used for reactivating the users account
	public function reactivate_user($id)
	{
		$data = array(
			'status' => 'active'
		);

		$this->db->where('user_id', $id);
		$response = $this->db->update('users', $data);

		if ($response)
		{
			return $id;
		}
		else
		{
			return FALSE;
		}
	}

	public function approve_loan($id)
	{
		$data = array(
			'status' => 'approved'
		);

		$this->db->where('user_id', $id);
		$response = $this->db->update('loan_table', $data);

		if ($response)
		{
			return $id;
		}
		else
		{
			return FALSE;
		}
	}
		
}
