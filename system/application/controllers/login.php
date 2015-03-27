<?php
	class Login extends Controller{
		function Login(){
			parent::Controller();
			$this->load->model('modelauthentification', '', TRUE);
		}
		function index(){
			if($this->session->userdata('login') == TRUE){
				if($this->session->userdata('user') == 'admin'){
					redirect('admin');
				}
			}else{
				$this->load->view('login');
			}
		}
		function login_process(){
			$this->form_validation->set_rules('user', 'user', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			
			if($this->form_validation->run() == TRUE){
				$user=$this->input->post('user');
				$password=$this->input->post('password');
				$pass=md5($password);
				if($this->modelauthentification->checkUser($user, $pass) == TRUE){
					$query = $this->modelauthentification->getUser($user, $pass);
					$data = $query->row_array();
					$sessiondata = array(
						'user' => $data['user'],
						'iduser' => $data['id'],
						'password' => $data['password'],
						'login' => TRUE
					);
					$this->session->set_userdata($sessiondata);
					redirect('login');
				}else{
					$this->session->set_flashdata('message', '<div class="error">user atau password yang dimasukkan salah!</div>');
					redirect('login/');
				}
			}else{
				$this->load->view('login');
			}
		}
		function logout(){
			$this->session->sess_destroy();
            redirect('login', 'refresh');
		}
	}
/* End of file login.php */
/* Location: ./system/application/controllers/login.php */