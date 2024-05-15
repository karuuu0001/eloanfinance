<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	//verifying the credentials of the user in the database for the login 
	public function verify_login()
	{
		$username = (string) $this->input->post('username');
		$password = (string) $this->input->post('password');

		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->where('status', 'active');
		$query = $this->db->get('users');
		$row = $query->row();

		if($row)
		{
			$this->set_user_session($row);

			return true;
		}
		
		return false;

	}

	//session functin reference at the login.php which theres ->session
	public function set_user_session($row)
	{
		$newdata = array(
			'user_id' => $row->user_id,
			'username' => $row->username,
			'lname' => $row->lname,
			'fname' => $row->fname,
			'mname' => $row->mname,
			'xname' => $row->xname,
			'role' => $row->role,
			'logged_in' => TRUE
		);

		$this->session->set_userdata($newdata);

	}

	//checking if user is currently login
	public function is_user_logged_in()
	{
		if ( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE )
		{
			return TRUE;
		}
		return FALSE;
	}

	public function logout()
	{
		session_destroy();
	}


}
