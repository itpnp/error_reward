<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_kategori extends CI_Model 
	{
		// public function saveKategori($data) 
		// {
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$success = $this->db->insert('kategori', $data);
		// 	$this->db->trans_commit();
		// 	$this->db->trans_complete();
		// 	if(!$success){
		// 		$success = false;
		// 		$errNo   = $this->db->_error_number();
		// 		$errMess = $this->db->_error_message();
		// 		array_push($errors, array($errNo, $errMess));
		// 	}
		// return $success;
		// }

		// public function saveSubKategori($data) 
		// {
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$success = $this->db->insert('sub_kategori', $data);
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

		// public function selectSubCategoryArray(){
		// 	$this->db->select('*');
		// 	$this->db->from('sub_kategori');
		// 	$this->db->where("(status = 'AKTIF')", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	$list = $query->result();
		// 	$data = array();
		// 	$indexRow = 0;
		// 	foreach ($list as $row) {
		// 		$data[$indexRow][0] = $row->id_sub_kategori;
		// 		$data[$indexRow][1] = $row->id_kategori;
		// 		$data[$indexRow][2] = $row->nama_sub_kategori;
		// 		$indexRow++;
		// 	}
		// 	return $data;
		// }
		// public function selectAll(){
		// 	$this->db->select('*');
		// 	$this->db->from('kategori');
		// 	$this->db->where("(status = 'AKTIF')", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function selectSubCategory(){
		// 	$this->db->select('*');
		// 	$this->db->from('sub_kategori');
		// 	$this->db->where("(status = 'AKTIF')", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function selectAllSubCategory(){
		// 	$this->db->select('*');
		// 	$this->db->from('sub_kategori');
		// 	$this->db->join('kategori', 'kategori.id_kategori = sub_kategori.id_kategori');
		// 	$this->db->where("(kategori.status = 'AKTIF')", NULL, FALSE);
		// 	$this->db->where("(sub_kategori.status = 'AKTIF')", NULL, FALSE);
		// 	$query = $this->db->get();
		// 	return $query->result();
		// }

		// public function updateCategory($id,$data){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$this->db->where('id_kategori',$id);
		// 	$success = $this->db->update('kategori', $data);
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

		// public function updateSubCategory($id,$data){
		// 	$this->db=$this->load->database('default',true);
		// 	$this->db->trans_begin();
		// 	$this->db->where('id_sub_kategori',$id);
		// 	$success = $this->db->update('sub_kategori', $data);
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
		public function saveSubKategori($data) 
		{
			$dataKategori = array ('categoryId'=>$data['id_kategori']);
			$dataSubKategori = array(
					'subCategoryName'  => $data['nama_sub_kategori'],
					'status'  => $data['status'],
					'ticketCategory' => $dataKategori
				);

			$data_string = json_encode($dataSubKategori);

			$curl = curl_init('http://localhost:8080/resource/reward/addsubcategory');
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

		public function saveKategori($data) 
		{

			$dataKategori = array(
					'categoryName'  => $data['nama_kategori'],
					'status'  => $data['status']
				);

			$data_string = json_encode($dataKategori);

			$curl = curl_init('http://localhost:8080/resource/reward/addcategory');
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
			$category = json_decode(file_get_contents('http://localhost:8080/resource/reward/category'));
			return $category;
		}

		

		public function selectSubCategory(){
			$category = json_decode(file_get_contents('http://localhost:8080/resource/reward/subcategory'));
			return $category;
		}

		public function selectSubCategoryArray(){
			$category = json_decode(file_get_contents('http://localhost:8080/resource/reward/subcategory'));
			$data = array();
			$indexRow = 0;
			foreach ($category as $row) {
				$data[$indexRow][0] = $row->subCategoryId;
				$data[$indexRow][1] = $row->ticketCategory->categoryId;
				$data[$indexRow][2] = $row->subCategoryName;
				$indexRow++;
			}
			return $data;
		}

		public function selectAllSubCategory(){
			$category = json_decode(file_get_contents('http://localhost:8080/resource/reward/subcategory'));
			return $category;
		}

		public function updateCategory($id,$data){
			$dataKategori = array(
					'categoryId'  => $data['id_kategori'],
					'categoryName'  => $data['nama_kategori'],
					'status' => 'AKTIF'
				);

			$data_string = json_encode($dataKategori);

			$curl = curl_init('http://localhost:8080/resource/reward/updatecategory');
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

		public function updateSubCategory($id,$data){
			$dataKategori = array(
					'categoryId'  => $data['id_kategori']
			);

			$dataSubKategori= array(
					'subCategoryId'	=> $id,
					'subCategoryName' => $data['nama_sub_kategori'],
					'status' => 'AKTIF',
					'ticketCategory' => $dataKategori
			);

			$data_string = json_encode($dataSubKategori);

			$curl = curl_init('http://localhost:8080/resource/reward/updatesubcategory');
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

		public function deleteCategory($id){
			$dataKategori = array(
					'categoryId'  => $id
				);

			$data_string = json_encode($dataKategori);

			$curl = curl_init('http://localhost:8080/resource/reward/deletecategory');
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

		public function deleteSubCategory($id){

			$dataSubKategori= array(
					'subCategoryId'	=> $id
			);

			$data_string = json_encode($dataSubKategori);

			$curl = curl_init('http://localhost:8080/resource/reward/deletesubcategory');
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
	}
?>