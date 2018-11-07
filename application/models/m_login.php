<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_login extends CI_Model 
	{
		public function login($data) 
		{
			$password = md5($data['password']);
			$username = $data['username'];
			$data = array(
					'username' => $username,
					'password' => $password
					);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/reward/login');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
	    	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

	    	// Send the request
	    	$result = curl_exec($curl);
	    	//print_r($result);

	    	// Free up the resources $curl is using
	    	curl_close($curl);
	    	$result = json_decode($result);
	    	return $result;
		}

		public function addUserApp($credential){
			$dataEmployee = array('nik'=> $credential['id_karyawan']);
			$dataCredential = array(
					'username'  => $credential['username'],
					'password'  => $credential['password'],
					'privilege' => $credential['hak_akses'],
					'status' => '1',
					'employee'  => $dataEmployee
				);

			$data_string = json_encode($dataCredential);
			// echo $data_string;
			// exit();
			$curl = curl_init('http://localhost:8080/resource/reward/addCredential');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
	    	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

	    	// Send the request
	    	$result = curl_exec($curl);

	    	// Free up the resources $curl is using
	    	curl_close($curl);
	    	$result = json_decode($result);
	    	return $result;
		}
		// public function login($data) 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$username = $data['username'];
		// 	$password = md5($data['password']);
		// 	// $password = $data['password'];
		// 	// echo $password;
		// 	// exit();
		// 	$this->db->select('credential.*,karyawan.*,bagian.*');
		// 	$this->db->from('credential');
		// 	$this->db->join('karyawan', 'credential.id_karyawan = karyawan.nik');
		// 	$this->db->join('bagian', 'karyawan.id_Bagian = bagian.id_Bagian');
		// 	$this->db->where('credential.username', $username);
		// 	$this->db->where('credential.password', $password);
		// 	$query = $this->db->get();
		// 	// $test = $query->row();
		// 	// echo $test->Nm_Bagian;
		// 	// exit();
		// 	return $query->row();
		// }

		// public function select_user($data)
		// {
		// 	$this->db->select('user.*');
		// 	$this->db->from('user');
		// 	$this->db->where($data);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// public function get_id($username)
		// {
		// 	$this->db->select('id_user');
		// 	$this->db->from('user');
		// 	$this->db->where('username', $username);
		// 	$query = $this->db->get();
		// 	$hasil = $query->num_rows();
		// 	if ($hasil = 1) {
		// 		foreach($query->result() as $hasil ){
		// 			$id_user = $hasil->id_user;
		// 		}
		// 	}else{
		// 		$id_user = false;
		// 	}

		// 		return $id_user;

		// }

		// public function update($id, $data)
		// {
		// 	return $this->db->update('user', $data, array('id_user' => $id));
		// }

		// public function addUserApp($credential){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$success = $this->db->insert('credential', $credential);
		// 	if(!$success){
		// 		$success = false;
		// 		$errNo   = $this->db->_error_number();
		// 		$errMess = $this->db->_error_message();
		// 		array_push($errors, array($errNo, $errMess));
		// 		return $success;
		// 	}
		// 	$this->db->trans_commit();
		// 	$this->db->trans_complete();
		// 	return $success;
		// }

		// public function addUserApp($credential){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$success = $this->db->insert('credential', $credential);
		// 	if(!$success){
		// 		$success = false;
		// 		$errNo   = $this->db->_error_number();
		// 		$errMess = $this->db->_error_message();
		// 		array_push($errors, array($errNo, $errMess));
		// 		return $success;
		// 	}
		// 	$this->db->trans_commit();
		// 	$this->db->trans_complete();
		// 	return $success;
		// }
	}

?>