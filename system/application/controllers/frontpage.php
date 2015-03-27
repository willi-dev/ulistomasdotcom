<?php
	class Frontpage extends Controller{
		function Frontpage(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		function index(){
			$data = array(
					'title' => 'frontpage',
					'getfrontpage' => $this->modelpublic->getFrontpage()
			);
			$this->load->view('public/public-frontpage', $data);
		}
		function welcome(){
			$data = array(
				'title' => 'photography is reflections. It reflects what you see, feel, and think.'
			);
			$this->load->view('public/public-welcome', $data);
		}
	}
/* End of file frontpage.php */
/* Location: ./system/application/controllers/frontpage.php */