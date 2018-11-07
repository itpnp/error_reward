<?php defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

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
		$this->load->model('M_login');
		// $this->load->library('Userauth');
		
	}

	public function index()
	{
		$this->load->view('FrontPage/v_header.php');
		$this->load->view('FrontPage/v_login.php');
		$this->load->view('FrontPage/v_footer.php');
	}

	public function checkin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array();
		$data['username'] = $username;
		$data['password'] = $password;
		$dataUser = $this->M_login->login($data);
		
		if($dataUser !== null){
			$data = $dataUser->employee->nik."|".$dataUser->employee->employeeName."|".$dataUser->employee->department->departmentName."|".$dataUser->privilege."|".$dataUser->username."|".$dataUser->accessId;
			$this->session->set_userdata('userData',$data);
			if($dataUser->privilege == "SUPER ADMIN"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/programmer'>";
			}else if($dataUser->privilege == "REWARD"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/reward'>";
			}else if($dataUser->privilege == "SISTEM"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/tilang'>";
			}else if($dataUser->privilege == "KABAG"){
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/kabag'>";
			}else{
				$this->session->set_flashdata('error', 'Privilege Tidak Ditemukan');
				redirect("login/index");
			}
		}else{
			$this->session->set_flashdata('error', 'Mohon Check Username Dan Password');
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php'>";
		}
	}

	function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}

	
}
