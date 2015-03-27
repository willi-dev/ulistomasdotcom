<?php 
	
	class Contact extends Controller{
		
		function Contact(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		function index(){
			$data = array(
					'title' => 'Contact',
					'contactcontent' => $this->modelpublic->getAboutContent()
			);
			$this->load->view('public/public-contact', $data);
		}
	}
	
/* End of file contact.php */
/* Location: ./system/application/controllers/contact.php */