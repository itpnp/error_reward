<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kabag extends CI_Controller {

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

		// if ($this->session->userdata('SESS_AKUN_IS_LOGIN') && $this->session->userdata('SESS_AKUN_USER_PRIV') === 1) {
		// 	redirect(base_url('akun/dashboard'));
		// }
		$this->output->set_header('Last-Modified:'.gmdate('D,d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control:no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control:post-check=0,pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
		$this->load->library('session');

		$this->load->model('M_karyawan');
		$this->load->model('M_lean');
		$this->load->model('M_kategori');
		$this->load->model('M_tilang');
		$this->load->model('M_nominal');
		// $this->load->library('Userauth');
		
	}

	public function index()
	{
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["departemen"]=$pecah[2];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$this->load->view('Kabag/v_header.php',$data);
			$this->load->view('Kabag/v_sidebar.php');
			$this->load->view('Kabag/v_main.php',$data);
			$this->load->view('Kabag/v_footer.php');
		}
		
	}

	public function tilangPage(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["departemen"]=$pecah[2];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$data["dataTilang"] = $this->M_tilang->selectAllByDept($data["departemen"]);
			$data["dataTilangArray"] = $this->M_tilang->selectArrayByDept($data["departemen"]);
			$this->load->view('Kabag/v_header.php',$data);
			$this->load->view('Kabag/v_sidebar.php',$data);
			$this->load->view('Kabag/v_tilang.php',$data);
		}
	}

	public function rewardPage(){
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["departemen"]=$pecah[2];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$data["dataReward"] = $this->M_lean->selectAllByDept($data["departemen"]);
			$data["dataRewardArray"] = $this->M_lean->selectArrayByDept($data["departemen"]);
			$this->load->view('Kabag/v_header.php',$data);
			$this->load->view('Kabag/v_sidebar.php',$data);
			$this->load->view('Kabag/v_reward.php',$data);
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

	public function search()
	{
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["departemen"]=$pecah[2];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data["dataTilang"] = $this->M_tilang->selectAllByDeptAndTime($data["departemen"],$bulan,$tahun);
			$data["dataTilangArray"] = $this->M_tilang->selectArrayByDeptAndTime($data["departemen"],$bulan,$tahun);
			$this->load->view('kabag/v_header.php',$data);
			$this->load->view('kabag/v_sidebar.php');
			$this->load->view('Kabag/v_tilang.php',$data);

		}
		
	}

	public function searchRewardByMonth()
	{
		$session=$this->session->userdata('userData');
		if($session!=""){
			$data = array();
			$pecah=explode("|",$session);
			$data["nik"]=$pecah[0];
			$data["nama"]=$pecah[1];
			$data["departemen"]=$pecah[2];
			$data["privilege"] = $pecah[3];
			$data["username"] = $pecah[4];
			$data["akses"] = $pecah[5];
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
			$data["dataReward"] = $this->M_lean->findByDate($bulan,$tahun);
			$data["dataRewardArray"] = $this->M_lean->findByDateArray($bulan,$tahun);
			$this->load->view('Kabag/v_header.php',$data);
			$this->load->view('Kabag/v_sidebar.php',$data);
			$this->load->view('Kabag/v_reward.php',$data);
		}
		
	}

}
