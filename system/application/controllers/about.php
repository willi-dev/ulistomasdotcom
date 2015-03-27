<?php 
	
	class About extends Controller{
		
		function About(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		function index(){
			$data = array(
					'title' => 'About',
					'aboutcontent' => $this->modelpublic->getAboutContent()
			);
			$this->load->view('public/public-about', $data);
		}
	}
	
/* End of file about.php */
/* Location: ./system/application/controllers/about.php */