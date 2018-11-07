<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_nominal extends CI_Model 
	{
		public function selectAll() 
		{
			$listNominal = json_decode(file_get_contents('http://localhost:8080/resource/reward/nominal'));
			return $listNominal;

		}

		public function updateNominal($id,$data){
			$dataOccupation= array('occupationId'=> $data['kode_jabatan']);
			$data = array(
					'nominalId' => $id,
					'occupation' => $dataOccupation,
					'tilang1' => $data['tilang_1'],
					'tilang2' => $data['tilang_2'],
					'tilang3' => $data['tilang_3'],
					'tilang4' => $data['tilang_4'],
					'tilang5' => $data['tilang_5']
					);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/reward/nominal/updateNominal');
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

		public function findByJabatan($id)
		{
			
			$data = array(
					'occupationId' => $id
					);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/reward/nominal/findbyoccupation');
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
		// 	$this->db->select('nominal_tilang.*,jabatan.*');
		// 	$this->db->from('nominal_tilang');
		// 	$this->db->join('jabatan', 'nominal_tilang.kode_jabatan = jabatan.Kd_Jabatan');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function displayJabatan() 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('*');
		// 	$this->db->from('jabatan');
		// 	$this->db->where("(status = 'AKTIF')", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function updateNominal($id,$data){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$this->db->where('id_nominal',$id);
		// 	$success = $this->db->update('nominal_tilang', $data);
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

		// public function findByJabatan($id)
		// {
			
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('*');
		// 	$this->db->from('nominal_tilang');
		// 	$this->db->where('kode_jabatan', $id);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }
		
		// public function findById($id) 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('karyawan.*,bagian.*');
		// 	$this->db->from('karyawan');
		// 	$this->db->join('bagian', 'bagian.Kd_Bagian = karyawan.Kd_Bagian');
		// 	$this->db->where('karyawan.NIK', $id);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// public function selectUserApp() 
		// {
		// 	$this->db = $this->load->database('default', true);
		// 	$this->db->select('karyawan.NIK,karyawan.Nm_Karyawan, credential.hak_akses, credential.id_akses');
		// 	$this->db->from('karyawan');
		// 	$this->db->join('credential', 'credential.id_akses = karyawan.id_akses');
		// 	$this->db->join('bagian', 'bagian.Kd_Bagian = karyawan.Kd_Bagian');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }


	}

?>