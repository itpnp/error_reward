<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_tilang extends CI_Model 
	{

		public function saveTilang($data) 
		{
			$pelaku = array('nik'=> $data['nik']);
			$penilang = array('nik'=> $data['nik_penilang']);
			$subKategori = array('subCategoryId'=> $data['id_sub_kategori']);
			$dataTicket = array(
					'ticketDate'  => $data['tanggal_tilang'],
					'additionalInfo'  => $data['keterangan'],
					'fine' => $data['nominal_tilang'],
					'subject' =>$pelaku,
					'officer' =>$penilang,
					'subCategoryTicket' => $subKategori
			);
			$data_string = json_encode($dataTicket);
			// echo $data_string;
			// exit();
			$curl = curl_init('http://localhost:8080/resource/ticket/save');
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

		public function selectAll(){
			$ticket = json_decode(file_get_contents('http://localhost:8080/resource/ticket/getalldata'));
			return $ticket;
		}

		public function selectArray(){
			$ticket = json_decode(file_get_contents('http://localhost:8080/resource/ticket/getalldata'));
			$data = array();
			$indexRow = 0;
			foreach ($ticket as $row) {
				$data[$indexRow][0] = $row->ticketId;
				$data[$indexRow][1] = $row->subCategoryTicket->ticketCategory->categoryName;
				$indexRow++;
			}
			return $data;
		}

		public function selectAllByDept($deptName){
			$dept = array('departmentName'=> $deptName);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbydepartmentname');
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

		public function selectArrayByDept($deptName){
			$dept = array('departmentName'=> $deptName);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbydepartmentname');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
	    	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

	    	// Send the request
	    	$result = curl_exec($curl);

	    	// Free up the resources $curl is using
	    	curl_close($curl);
	    	$result = json_decode($result);
			$data = array();
			$indexRow = 0;
			foreach ($result as $row) {
				$data[$indexRow][0] = $row->ticketId;
				$data[$indexRow][1] = $row->subCategoryTicket->ticketCategory->categoryName;
				$indexRow++;
			}
			return $data;
		}

		public function selectAllByDeptAndTime($deptName,$month,$year){
			$dept = array('general'=> $deptName,
						  'month' => $month,
						  'year' => $year
						);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbydepartmentandmonth');
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

		public function selectArrayByDeptAndTime($deptName,$month,$year){
			$dept = array('general'=> $deptName,
						  'month' => $month,
						  'year' => $year
						);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbydepartmentandmonth');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
	    	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

	    	// Send the request
	    	$result = curl_exec($curl);

	    	// Free up the resources $curl is using
	    	curl_close($curl);
	    	$result = json_decode($result);
			$data = array();
			$indexRow = 0;
			foreach ($result as $row) {
				$data[$indexRow][0] = $row->ticketId;
				$data[$indexRow][1] = $row->subCategoryTicket->ticketCategory->categoryName;
				$indexRow++;
			}
			return $data;
		}

		public function findByDate($month,$year){
			$dept = array('month' => $month,
						  'year' => $year
						);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbymonth');
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

		public function findByDateArray($month,$year){
			$dept = array('month' => $month,
						  'year' => $year
						);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbymonth');
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($data_string)));
	    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
	    	curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);  // Insert the data

	    	// Send the request
	    	$result = curl_exec($curl);

	    	// Free up the resources $curl is using
	    	curl_close($curl);
	    	$result = json_decode($result);
			$data = array();
			$indexRow = 0;
			foreach ($result as $row) {
				$data[$indexRow][0] = $row->ticketId;
				$data[$indexRow][1] = $row->subCategoryTicket->ticketCategory->categoryName;
				$indexRow++;
			}
			return $data;
		}

		public function findById($id){
			$dept = array('general' => $id);
			$data_string = json_encode($dept);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbyid');
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

		public function updateTilang($id,$data){
			$pelaku = array('nik'=> $data['nik']);
			$penilang = array('nik'=> $data['nik_penilang']);
			$subKategori = array('subCategoryId'=> $data['id_sub_kategori']);
			$dataTicket = array(
					'ticketId'	  => $id,
					'ticketDate'  => $data['tanggal_tilang'],
					'additionalInfo'  => $data['keterangan'],
					'fine' => $data['nominal_tilang'],
					'subject' =>$pelaku,
					'officer' =>$penilang,
					'subCategoryTicket' => $subKategori
			);
			$data_string = json_encode($dataTicket);
			// echo $data_string;
			// exit();
			$curl = curl_init('http://localhost:8080/resource/ticket/updateticket');
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

		public function countTotalTicket($id,$month,$year){
			$data = array(	'general' => $id,
							'month' => $month,
						  	'year' => $year
						);
			$data_string = json_encode($data);
			$curl = curl_init('http://localhost:8080/resource/ticket/findbydateandemployee');
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

		// public function saveTilang($data) 
		// {
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$success = $this->db->insert('tilang', $data);
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

		// public function selectAll(){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function selectArray(){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$query = $this->db->get();
		// 	$list = $query->result();
		// 	$data = array();
		// 	$indexRow = 0;
		// 	foreach ($list as $row) {
		// 		$data[$indexRow][0] = $row->id_tilang;
		// 		$data[$indexRow][1] = $row->nama_kategori;
		// 		$indexRow++;
		// 	}
		// 	return $data;
		// }
		
		// public function selectAllByDept($deptName){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('bagian', 'karyawan.id_Bagian = bagian.id_Bagian');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where('bagian.Nm_Bagian', $deptName);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function selectArrayByDept($deptName){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('bagian', 'karyawan.id_Bagian = bagian.id_Bagian');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where('bagian.Nm_Bagian', $deptName);
		// 	$query = $this->db->get();
		// 	$list = $query->result();
		// 	$data = array();
		// 	$indexRow = 0;
		// 	foreach ($list as $row) {
		// 		$data[$indexRow][0] = $row->id_tilang;
		// 		$data[$indexRow][1] = $row->nama_kategori;
		// 		$indexRow++;
		// 	}
		// 	return $data;
		// }

		// public function selectAllByDeptAndTime($deptName,$month,$year){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('bagian', 'karyawan.id_Bagian = bagian.id_Bagian');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where('bagian.Nm_Bagian', $deptName);
		// 	$this->db->where("MONTH(tanggal_tilang) = '".$month."'", NULL, FALSE);
		// 	$this->db->where("YEAR(tanggal_tilang) = '".$year."'", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function selectArrayByDeptAndTime($deptName,$month,$year){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('bagian', 'karyawan.id_Bagian = bagian.id_Bagian');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where('bagian.Nm_Bagian', $deptName);
		// 	$this->db->where("MONTH(tanggal_tilang) = '".$month."'", NULL, FALSE);
		// 	$this->db->where("YEAR(tanggal_tilang) = '".$year."'", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	$list = $query->result();
		// 	$data = array();
		// 	$indexRow = 0;
		// 	foreach ($list as $row) {
		// 		$data[$indexRow][0] = $row->id_tilang;
		// 		$data[$indexRow][1] = $row->nama_kategori;
		// 		$indexRow++;
		// 	}
		// 	return $data;
		// }

		// public function countTotalTicket($id,$month){
		// 	$this->db->select('count(*) as total');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->where('tilang.nik', $id);
		// 	$this->db->where("MONTH(tanggal_tilang) = '".$month."'", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// public function findByDate($month,$year){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('bagian', 'karyawan.id_Bagian = bagian.id_Bagian');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where("MONTH(tanggal_tilang) = '".$month."'", NULL, FALSE);
		// 	$this->db->where("YEAR(tanggal_tilang) = '".$year."'", NULL, FALSE);
		// 	$this->db->order_by("tilang.tanggal_tilang", "asc");
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function findByDateArray($month,$year){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where("MONTH(tanggal_tilang) = '".$month."'", NULL, FALSE);
		// 	$this->db->where("YEAR(tanggal_tilang) = '".$year."'", NULL, FALSE);
		// 	$this->db->order_by("tilang.tanggal_tilang", "asc");
		// 	$query = $this->db->get();
		// 	$list = $query->result();
		// 	$data = array();
		// 	$indexRow = 0;
		// 	foreach ($list as $row) {
		// 		$data[$indexRow][0] = $row->id_tilang;
		// 		$data[$indexRow][1] = $row->nama_kategori;
		// 		$indexRow++;
		// 	}
		// 	return $data;
		// }

		// public function findById($id){
		// 	$this->db->select('*');
		// 	$this->db->from('tilang');
		// 	$this->db->join('karyawan', 'karyawan.nik = tilang.nik');
		// 	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = tilang.id_sub_kategori');
		// 	$this->db->join('kategori', 'sub_kategori.id_kategori = kategori.id_kategori');
		// 	$this->db->where("tilang.id_tilang = '".$id."'", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->row();
		// }

		// public function updateTilang($id,$data){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$this->db->where('id_tilang',$id);
		// 	$success = $this->db->update('tilang', $data);
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