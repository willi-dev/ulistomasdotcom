<?php 

	class Project extends Controller{
		
		function Project(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		
		function index(){
			if($this->uri->segment(2)==""){
				redirect('home/');
			}
		}
		
		function personal($page="page"){
			$countp=$this->modelpublic->countPersonal();
			if($this->uri->segment(4)==""){
				$data = array(
					'title' => 'Project, Personal',
					//'catpersonal' => $this->modelpersonal->getCatPersonal(),
					'getphotopersonal' => $this->modelpublic->getPhotoPersonal(0, 18)
				);
			}else{
				$check = preg_match( '/^[0-9]+$/', $this->uri->segment(4));
				if($check==FALSE){
					redirect('project/personal');
				}else{
					$data = array(
						'title' => 'Project, Personal',
						//'catpersonal' => $this->modelpersonal->getCatPersonal(),
						'getphotopersonal' => $this->modelpublic->getPhotoPersonal($this->uri->segment(4), 18)
					);
				}
			}
			$configpage=array(
					'base_url'=>base_url()."project/personal/$page",
					'per_page'=>18,
					'total_rows'=>$countp,
					'uri_segment'=>4,
					'full_tag_open'=>'<span id="">',
					'full_tag_close'=> '</span>',
					'next_link'=>'Next',
					'next_tag_open' =>'<span class="">',
					'next_tag_close' =>'</span>',
					'prev_link'=>'Prev',
					'prev_tag_open'=>'<span class="">',
					'prev_tag_close'=>'</span>',
					'cur_tag_open'=>'<span class="">',
					'cur_tag_close'=>'</span>',
					'num_tag_open'=>'<span class="">',
					'num_tag_close'=>'</span>'
				);
			$this->pagination->initialize($configpage);
			$this->load->view('public/public-personal', $data, 'default');
		}
	
		
		
	
	}
	
/* End of file project.php */
/* Location: ./system/application/controllers/project.php */