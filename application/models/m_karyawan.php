<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_karyawan extends CI_Model 
	{
		public function selectAll() 
		{
			$employees = json_decode(file_get_contents('http://localhost:8080/resource/employees'));
			return $employees;
		}

		public function findById($id) 
		{

			$data = array(
					'nik' => $id
					);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/reward/employee/find');
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

		public function selectUserApp() 
		{
			$userApp = json_decode(file_get_contents('http://localhost:8080/resource/reward/credential'));
			return $userApp;
		}

		public function updateUserApp($id,$data){
			$dataEmployee = array('nik'=> $data['nik']);
			$data = array(
					'accessId' => $id,
					'username' => $data['username'],
					'password' => $data['password'],
					'privilege' => $data['hak_akses'],
					'status' => '1',
					'employee' =>$dataEmployee
					);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/reward/updateCredential');
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

		public function deleteUserApp($id){
			$data = array(
					'accessId' => $id
					);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/reward/deleteCredential');
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
		// public function selectAll() 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('karyawan.*,bagian.*');
		// 	$this->db->from('karyawan');
		// 	$this->db->join('bagian', 'bagian.id_Bagian = karyawan.id_Bagian');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function findById($id) 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('karyawan.*,bagian.*');
		// 	$this->db->from('karyawan');
		// 	$this->db->join('bagian', 'bagian.id_Bagian = karyawan.id_Bagian');
		// 	$this->db->where('karyawan.NIK', $id);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// public function selectUserApp() 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('karyawan.NIK,karyawan.Nm_Karyawan, credential.username, credential.hak_akses, credential.id_akses');
		// 	$this->db->from('karyawan');
		// 	$this->db->join('credential', 'credential.id_karyawan= karyawan.nik');
		// 	$this->db->join('bagian', 'bagian.id_Bagian = karyawan.id_Bagian');
		// 	$this->db->where('credential.status = "1" ', NULL, false);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function updateUserApp($id,$data){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$this->db->where('id_akses',$id);
		// 	$success = $this->db->update('credential', $data);
		// 	$this->db->trans_commit();
		// 	$this->db->trans_complete();
		// 	if(!$success){
		// 		$success = false;
		// 		$errNo   = $this->db->_error_number();
		// 		$errMess = $this->db->_error_message();
		// 		array_push($errors, array($errNo, $errMess));
		// 	}
		// 	return $success;
		// }
	}

?>