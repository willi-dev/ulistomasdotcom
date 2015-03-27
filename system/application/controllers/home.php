<?php 

	class Home extends Controller{
		
		function Home(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		
		function index(){
			$data = array(
					'title' => 'Home ~ Feature',
					'getfrontpage' => $this->modelpublic->getFrontpage()
			);
			$this->load->view('public/public-home', $data);
		}
		
	}
	
/* End of file home.php */
/* Location: ./system/application/controllers/home.php */