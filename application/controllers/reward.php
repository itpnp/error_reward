<?php defined('BASEPATH') OR exit('No direct script access allowed');

class reward extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();

		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		$this->load->library(array('Excel','session'));
		$this->load->model('M_karyawan');
		$this->load->model('M_lean');
		$this->load->model('M_kategori');
		
	}

	public function index()
	{
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php');
			$this->load->view('Reward/v_main.php',$data);
			$this->load->view('Reward/v_footer.php');
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
		
	}

	public function chooseEmployee(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$data["dataKaryawan"] = $this->M_karyawan->selectAll();
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php',$data);
			$this->load->view('Reward/v_choose_employee.php',$data);
			$this->load->view('Reward/v_footer.php');
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}

	public function registerReward($id){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$data["dataKaryawan"] = $this->M_karyawan->findById($id);
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php',$data);
			$this->load->view('Reward/v_registration_form.php',$data);
			$this->load->view('Reward/v_footer.php');
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}

	public function saveLean(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$dataLean = array();
			$dataLean['nik_admin'] = $data["nik"];
			$dataLean['judul'] = $this->input->post('judulProposal');
			$dataLean['tanggal_pengajuan'] = date("Y-m-d",strtotime($this->input->post('tanggalPengajuan')));
			$dataLean['nik'] = $this->input->post('nik');
			$dataLean['nominal_reward'] = 0;
			$dataLean['level_reward'] = 'PENGAJUAN';

			if($this->M_lean->saveLean($dataLean)){
				$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
				$this->dataReward();
			}else{
				$this->session->set_flashdata('error', 'Data Gagal Disimpan');
				$this->dataReward();
			}
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}
	public function dataReward(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$data["dataReward"] = $this->M_lean->selectAll();
			$data["dataRewardArray"] = $this->M_lean->selectArray();
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php',$data);
			$this->load->view('Reward/v_reward_data.php',$data);
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}

	public function registerBounty($id){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$data["dataLean"] = $this->M_lean->findById($id);
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php',$data);
			$this->load->view('Reward/v_upgrade_status.php',$data);
			$this->load->view('Reward/v_footer.php');
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}

	public function saveBounty(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$dataLean = array();
			$idLean = $this->input->post('idLean');
			$nominal = $this->input->post('nominalReward');
			$nominal = str_replace("Rp.","",$nominal);
			$nominal = str_replace(".","",$nominal);
			$dataLean['level_reward'] = $this->input->post('level');
			$dataLean['tanggal_penyerahan_reward'] = date("Y-m-d",strtotime($this->input->post('tanggalPenyerahan')));
			$dataLean['nominal_reward'] = $nominal;

			if($this->M_lean->update($idLean,$dataLean)){
				$this->session->set_flashdata('success', 'Reward Berhasil Disimpan');
				$this->dataReward();
			}else{
				$this->session->set_flashdata('success', 'Reward Gagal Disimpan');
				$this->dataReward();
			}
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}

	public function searchByMonth()
	{
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data["dataReward"] = $this->M_lean->findByDate($bulan,$tahun);
			$data["dataRewardArray"] = $this->M_lean->findByDateArray($bulan,$tahun);
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php');
			$this->load->view('Reward/v_reward_data.php',$data);
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
		
	}

	public function reportPage(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["dataKaryawan"] = $this->M_karyawan->selectAll();
			$this->load->view('Reward/v_header.php',$data);
			$this->load->view('Reward/v_sidebar.php',$data);
			$this->load->view('Reward/v_generate_report.php',$data);
			$this->load->view('Reward/v_footer.php');
		}else{
			$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
			redirect("login/index");
		}
	}

	public function updateProfileApp(){
		$session=$this->session->userdata('userData');
			if($session!=""){
				$data = array();
				$pecah=explode("|",$session);
				$data["nik"]=$pecah[0];
				$data["nama"]=$pecah[1];
				$data["privilege"] = $pecah[3];
				$data["username"] = $pecah[4];
				$data["akses"] = $pecah[5];
				$id = $this->input->post('idUserEdit');
				$password = md5($this->input->post('passwordEdit'));
				$dataUser = array();
				$dataUser['id_akses'] = $id;
				$dataUser['username'] = $this->input->post('usernameEdit');
				$dataUser['password'] = $password;
	            $dataUser['hak_akses'] = $this->input->post('privilegeModal');
	            $dataUser['nik'] = $this->input->post('nikEdit');
				if($this->M_karyawan->updateUserApp($id,$dataUser)){
					$this->session->set_flashdata('success', 'User Berhasil Diubah');
					$this->index();
				}else{
					$this->session->set_flashdata('error', 'User Gagal Diubah');
					$this->index();
				}
			}else{
				$this->session->set_flashdata('error', 'Anda Masuk Tanpa Login');
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>";
			}
	}

	public function generateReport(){
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Calibri');
		// set default font size
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(11);
		// create the writer
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");
		// writer already created the first sheet for us, let's get it
		$objSheet = $objPHPExcel->getActiveSheet();
		// rename the sheet
		$objSheet->setTitle('REWARD BULAN '.$this->convertBulan($bulan).' '.$tahun);

		$rowTitle = array();
		$rowTitle[] = 'B';
		$rowTitle[] = 'C';
		$rowTitle[] = 'D';
		$rowTitle[] = 'E';
		$rowTitle[] = 'F';

		$rowHeader = 3;
		// write header
		$objSheet->getStyle('B'.$rowHeader)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objSheet->getStyle('B'.$rowHeader)->getFont()->setBold(true)->setSize(14);
		$objSheet->getCell('B'.$rowHeader)->setValue('PT. PURA NUSAPERSADA UNIT HOLOGRAFI');
		$objSheet->mergeCells('B'.$rowHeader.':F'.$rowHeader);

		$rowHeader++;
		$objSheet->getStyle('B'.$rowHeader)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objSheet->getStyle('B'.$rowHeader)->getFont()->setBold(true)->setSize(14);
		$objSheet->getCell('B'.$rowHeader)->setValue('IDE / GAGASAN LEAN MANUFACTURING '.$this->convertBulan($bulan).' '.$tahun);
		$objSheet->mergeCells('B'.$rowHeader.':F'.$rowHeader);

		$rowHeader++;
		$rowHeader++;
		$objSheet->getCell('B'.$rowHeader)->setValue('NIK');
		$objSheet->getCell('C'.$rowHeader)->setValue('Nama Lengkap');
		$objSheet->getCell('D'.$rowHeader)->setValue('Nama Dept');
		$objSheet->getCell('E'.$rowHeader)->setValue('IDE / GAGASAN');
		$objSheet->getCell('F'.$rowHeader)->setValue('Reward');

		$borders = array(
	      'borders' => array(
	        'inside'     => array(
	          'style' => PHPExcel_Style_Border::BORDER_THIN,

	          'color' => array(
	            'argb' => '00000000'
	          )
	        ),
	        'outline' => array(
	          'style' => PHPExcel_Style_Border::BORDER_THIN,
	          'color' => array(
	             'argb' => '00000000'
	          )
	        )
	      )
	    );

		for($i = 0; $i < count($rowTitle); $i++){
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->getFont()->setBold(true)->setSize(12);
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->applyFromArray($borders);
		}

		$rowHeader++;
		$data = $this->M_lean->findByDate($bulan,$tahun);
		foreach ($data as $row) {
			$objSheet->getCell('B'.$rowHeader)->setValue($row->NIK);
			$objSheet->getCell('C'.$rowHeader)->setValue($row->Nm_Karyawan);
			$objSheet->getCell('D'.$rowHeader)->setValue($row->Nm_Bagian);
			$objSheet->getCell('E'.$rowHeader)->setValue($row->judul);
			$objSheet->getCell('F'.$rowHeader)->setValue($row->nominal_reward);
			for($i = 0; $i < count($rowTitle); $i++){
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->getFont()->setBold(false)->setSize(12);
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$objSheet->getStyle($rowTitle[$i].''.$rowHeader)->applyFromArray($borders);
			}
						$rowHeader++;
		}
		for($i=0; $i<sizeof($rowTitle); $i++){
			$objSheet->getColumnDimension($rowTitle[$i])->setAutoSize(true);
		}
		$filename = "LAPORAN REWARD BULAN ".$this->convertBulan($bulan).''.$tahun;
			// We'll be outputting an excel file
		header('Content-type: application/vnd.ms-excel');
			// It will be called file.xls
		header('Content-Disposition: attachment; filename="'.$filename.'.xlsx"');
			// Write file to the browser
		$objWriter->save('php://output');
			// $objWriter->save("D://Test/".$filename.".xlsx");
	}

	public function convertBulan($bulan){
		if($bulan == "01"){
			return "Januari";
		}else if($bulan == "02"){
			return "Februari";
		}else if($bulan == "03"){
			return "Maret";
		}else if($bulan == "04"){
			return "April";
		}else if($bulan == "05"){
			return "Mei";
		}else if($bulan == "06"){
			return "Juni";
		}else if($bulan == "07"){
			return "Juli";
		}else if($bulan == "08"){
			return "Agustus";
		}else if($bulan == "09"){
			return "September";
		}else if($bulan == "10"){
			return "Oktober";
		}else if($bulan == "11"){
			return "November";
		}else if($bulan == "12"){
			return "Desember";
		}

	}
}
