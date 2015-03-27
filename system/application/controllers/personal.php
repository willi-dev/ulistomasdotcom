<?php 

	class Personal extends Controller{
	
		function Personal(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		
		function index(){
			if($this->uri->segment(2)==""){
				redirect('project/personal/');
			}
		}
		
		function grid($titleuri="", $page="page"){
			$titlephoto = str_replace("-","_", $titleuri);
			$title = str_replace("-", " ", $titleuri);
			
			$count = $this->modelpublic->countSPersonal($titlephoto);
			if($this->uri->segment(5)==""){
				$data = array(
					'getphoto' => $this->modelpublic->getPhoto($titlephoto),
					'gettitlephoto' => $this->modelpublic->getTitlePhoto($titlephoto),
					'title' => $title,
					'notice' => 'photo(s) unavailable'
				);
			}else{	
				$check2 = preg_match( '/^[0-9]+$/', $this->uri->segment(5));
				if($check2==FALSE){
					redirect('personal/grid');
				}else{
					$data = array(
						'getphoto' => $this->modelpublic->getPhoto($titlephoto),
						'gettitlephoto' => $this->modelpublic->getTitlePhoto($titlephoto),
						'title' => $title,
						'notice' => 'photo(s) unavailable'
					);
				}
			}
			
			$this->load->view('public/public-personal-grid', $data);
		}
		
	}

/* End of file personal.php */
/* Location: ./system/application/controllers/personal.php */