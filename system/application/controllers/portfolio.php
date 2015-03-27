<?php
	class Portfolio extends Controller{
		function Portfolio(){
			parent::Controller();
			$this->load->model(array('modelpublic'));
		}
		
		function index(){
			$data = array(
					'dynamiccontent' => 'portfolio'
			);
			$this->load->view('frontend_template', $data);
		}
		function Personal($page="page"){
			$countp=$this->modelpublic->countPersonal();
			
			$configpage=array(
					'base_url'=>base_url()."portfolio/personal/$page",
					'per_page'=>8,
					'total_rows'=>$countp,
					'uri_segment'=>4,
					'full_tag_open'=>'<span id="pagination">',
					'full_tag_close'=> '</span>',
					'next_link'=>'Next',
					'next_tag_open' =>'<span class="navpaging">',
					'next_tag_close' =>'</span>',
					'prev_link'=>'Previous',
					'prev_tag_open'=>'<span class="navpaging">',
					'prev_tag_close'=>'</span>',
					'num_tag_open' => '<span class="hiddenpagelink">',
					'num_tag_close' => '</span>',
					'cur_tag_open' => '<span class="hiddenpagelink">',
					'cur_tag_close' => '</span>',
					'first_tag_open' => '<span class="hiddenpagelink">',
					'first_tag_close' => '</span>',
					'last_tag_open' => '<span class="hiddenpagelink">',
					'last_tag_close' => '</span>'
				);
			$this->pagination->initialize($configpage);
			
			if($this->uri->segment(4)==""){
				$data = array(
					'title' => 'Personal',
					'getphotopersonal' => $this->modelpublic->getPhotoPersonal(0, 8),
					'pageportfolio' => $this->pagination->create_links()
				);
			}else{
				$check = preg_match( '/^[0-9]+$/', $this->uri->segment(4));
				if($check==FALSE){
					redirect('portfolio/personal');
				}else{
					$data = array(
						'title' => 'Personal',
						'getphotopersonal' => $this->modelpublic->getPhotoPersonal($this->uri->segment(4), 8),
						'pageportfolio' => $this->pagination->create_links()
					);
				}
			}
			
			$this->load->view('public/public-personal', $data, 'default');
		}
		
		function Personalphoto($titleuri="", $type=""){
			$titlephoto = str_replace("-","_", $titleuri);
			$countp=$this->modelpublic->countSPersonal($titlephoto);
			$typepage = $type;
			
			$arrayfrom=array("_","&#34");
			$arrayout=array(' ','"');
			$gtp = $this->modelpublic->getTitlePhotoP($titlephoto);
			if(!empty($gtp)){
				$titlephotopost = str_replace($arrayfrom, $arrayout, $gtp->title_photopost);
			}else{
				redirect('portfolio/personal');
			}
			
			
			$this->session->set_userdata('row',$this->uri->segment(5));
			$configpage=array(
					'base_url'=>base_url()."portfolio/personalphoto/".$titleuri."/page/",
					'per_page'=>1,
					'total_rows'=>$countp->countphoto,
					'uri_segment'=>5,
					'display_pages'=>FALSE,
					'full_tag_open'=>'<span id="pagination">',
					'full_tag_close'=> '</span>',
					'next_link'=>'Next',
					'next_tag_open' =>'<span class="navpaging">',
					'next_tag_close' =>'</span>',
					'prev_link'=>'Previous',
					'prev_tag_open'=>'<span class="navpaging">',
					'prev_tag_close'=>'</span>',
					'num_tag_open' => '<span class="hiddenpagelink">',
					'num_tag_close' => '</span>',
					'cur_tag_open' => '<span class="hiddenpagelink">',
					'cur_tag_close' => '</span>',
					'first_tag_open' => '<span class="hiddenpagelink">',
					'first_tag_close' => '</span>',
					'last_tag_open' => '<span class="hiddenpagelink">',
					'last_tag_close' => '</span>'
			);
			$this->pagination->initialize($configpage);
			
			//SWITCH PAGE
			switch($typepage){
				case 'grid': 
						$datagrid = array(
							'getphoto' => $this->modelpublic->getPhotoP($titlephoto),
							'gettitlephoto' => $this->modelpublic->getTitlePhotoP($titlephoto),
							'title' => $titlephotopost,
							'notice' => 'photo(s) unavailable'
						);
						$this->load->view('public/public-personalgrid', $datagrid, 'default');break;
				case 'page':
						if($this->uri->segment(5)==""){
							$data = array(
								'title' => $titlephotopost,
								'titleuri'=> $titleuri,
								'count' => $countp->countphoto,
								'getphotos' => $this->modelpublic->getPhotoPS($titlephoto, 0, 1),
								'gettitlephoto' => $this->modelpublic->getTitlePhotoP($titlephoto),
								'link' => $this->pagination->create_links()
							);
						}else{
							$check = preg_match( '/^[0-9]+$/', $this->uri->segment(5));
							if($check==FALSE){
								redirect('portfolio/personal');
							}else{
								$data = array(
									'title' => $titlephotopost,
									'titleuri'=> $titleuri,
									'count' => $countp->countphoto,
									'getphotos' => $this->modelpublic->getPhotoPS($titlephoto, $this->uri->segment(5), 1),
									'gettitlephoto' => $this->modelpublic->getTitlePhotoP($titlephoto),
									'link' => $this->pagination->create_links()
								);
							}
						}
						$this->load->view('public/public-personalpage', $data, 'default');break;
				default : 
						if($this->uri->segment(5)==""){
							$data = array(
								'title' => $titlephotopost,
								'titleuri'=> $titleuri,
								'count' => $countp->countphoto,
								'getphotos' => $this->modelpublic->getPhotoPS($titlephoto, 0, 1),
								'gettitlephoto' => $this->modelpublic->getTitlePhotoP($titlephoto),
								'link' => $this->pagination->create_links()
							);
						}else{
							$check = preg_match( '/^[0-9]+$/', $this->uri->segment(5));
							if($check==FALSE){
								redirect('portfolio/personal');
							}else{
								$data = array(
									'title' => $titlephotopost,
									'titleuri'=> $titleuri,
									'count' => $countp->countphoto,
									'getphotos' => $this->modelpublic->getPhotoPS($titlephoto, $this->uri->segment(5), 1),
									'gettitlephoto' => $this->modelpublic->getTitlePhotoP($titlephoto),
									'link' => $this->pagination->create_links()
								);
							}
						}
						$this->load->view('public/public-personalpage', $data, 'default');break;
			}
			
		}
		
		function Commision($page="page"){
			$countc=$this->modelpublic->countCommision();
			
			$configpage=array(
					'base_url'=>base_url()."portfolio/commision/$page",
					'per_page'=>8,
					'total_rows'=>$countc,
					'uri_segment'=>4,
					'full_tag_open'=>'<span id="pagination">',
					'full_tag_close'=> '</span>',
					'next_link'=>'Next',
					'next_tag_open' =>'<span class="navpaging">',
					'next_tag_close' =>'</span>',
					'prev_link'=>'Previous',
					'prev_tag_open'=>'<span class="navpaging">',
					'prev_tag_close'=>'</span>',
					'num_tag_open' => '<span class="hiddenpagelink">',
					'num_tag_close' => '</span>',
					'cur_tag_open' => '<span class="hiddenpagelink">',
					'cur_tag_close' => '</span>',
					'first_tag_open' => '<span class="hiddenpagelink">',
					'first_tag_close' => '</span>',
					'last_tag_open' => '<span class="hiddenpagelink">',
					'last_tag_close' => '</span>'
				);
			$this->pagination->initialize($configpage);
			
			if($this->uri->segment(4)==""){
				$data = array(
					'title' => 'Commision',
					'getphotocommision' => $this->modelpublic->getPhotoCommision(0,8),
					'pageportfolio' => $this->pagination->create_links()
				);
			}else{
				$check = preg_match( '/^[0-9]+$/', $this->uri->segment(4));
				if($check==FALSE){
					redirect('portfolio/commision');
				}else{
					$data = array(
						'title' => 'Commision',
						'getphotocommision' => $this->modelpublic->getPhotoCommision($this->uri->segment(4), 8),
						'pageportfolio' => $this->pagination->create_links()
					);
				}
			}
			
			$this->load->view('public/public-commision', $data, 'default');
		}
		function Commisionphoto($titleuri="", $type=""){
			$titlephoto = str_replace("-","_", $titleuri);
			$countp=$this->modelpublic->countSCommision($titlephoto);
			$typepage = $type;
			
			$arrayfrom=array("_","&#34");
			$arrayout=array(' ','"');
			$gtc = $this->modelpublic->getTitlePhotoC($titlephoto);
			if(!empty($gtc)){
				$titlephotopost = str_replace($arrayfrom, $arrayout, $gtc->title_photopost);
			}else{
				redirect('portfolio/commision');
			}
			
			$this->session->set_userdata('row',$this->uri->segment(5));
			$configpage=array(
					'base_url'=>base_url()."portfolio/commisionphoto/".$titleuri."/page/",
					'per_page'=>1,
					'total_rows'=>$countp->countphoto,
					'uri_segment'=>5,
					'display_pages'=>FALSE,
					'full_tag_open'=>'<span id="pagination">',
					'full_tag_close'=> '</span>',
					'next_link'=>'Next',
					'next_tag_open' =>'<span class="navpaging">',
					'next_tag_close' =>'</span>',
					'prev_link'=>'Previous',
					'prev_tag_open'=>'<span class="navpaging">',
					'prev_tag_close'=>'</span>',
					'num_tag_open' => '<span class="hiddenpagelink">',
					'num_tag_close' => '</span>',
					'cur_tag_open' => '<span class="hiddenpagelink">',
					'cur_tag_close' => '</span>',
					'first_tag_open' => '<span class="hiddenpagelink">',
					'first_tag_close' => '</span>',
					'last_tag_open' => '<span class="hiddenpagelink">',
					'last_tag_close' => '</span>'
			);
			$this->pagination->initialize($configpage);
			
			//SWITCH PAGE
			switch($typepage){
				case 'grid': 
						$datagrid = array(
							'getphoto' => $this->modelpublic->getPhotoC($titlephoto),
							'gettitlephoto' => $this->modelpublic->getTitlePhotoC($titlephoto),
							'title' => $titlephotopost,
							'notice' => 'photo(s) unavailable'
						);
						$this->load->view('public/public-commisiongrid', $datagrid, 'default');break;
				case 'page':
						if($this->uri->segment(5)==""){
							$data = array(
								'title' => $titlephotopost,
								'titleuri'=> $titleuri,
								'count' => $countp->countphoto,
								'getphotos' => $this->modelpublic->getPhotoCS($titlephoto, 0, 1),
								'gettitlephoto' => $this->modelpublic->getTitlePhotoC($titlephoto),
								'link' => $this->pagination->create_links()
							);
						}else{
							$check = preg_match( '/^[0-9]+$/', $this->uri->segment(5));
							if($check==FALSE){
								redirect('portfolio/commision');
							}else{
								$data = array(
									'title' => $titlephotopost,
									'titleuri'=> $titleuri,
									'count' => $countp->countphoto,
									'getphotos' => $this->modelpublic->getPhotoCS($titlephoto, $this->uri->segment(5), 1),
									'gettitlephoto' => $this->modelpublic->getTitlePhotoC($titlephoto),
									'link' => $this->pagination->create_links()
								);
							}
						}
						$this->load->view('public/public-commisionpage', $data, 'default');break;
				default : 
						if($this->uri->segment(5)==""){
							$data = array(
								'title' => $titlephotopost,
								'titleuri'=> $titleuri,
								'count' => $countp->countphoto,
								'getphotos' => $this->modelpublic->getPhotoCS($titlephoto, 0, 1),
								'gettitlephoto' => $this->modelpublic->getTitlePhotoC($titlephoto),
								'link' => $this->pagination->create_links()
							);
						}else{
							$check = preg_match( '/^[0-9]+$/', $this->uri->segment(5));
							if($check==FALSE){
								redirect('portfolio/commision');
							}else{
								$data = array(
									'title' => $titlephotopost,
									'titleuri'=> $titleuri,
									'count' => $countp->countphoto,
									'getphotos' => $this->modelpublic->getPhotoCS($titlephoto, $this->uri->segment(5), 1),
									'gettitlephoto' => $this->modelpublic->getTitlePhotoC($titlephoto),
									'link' => $this->pagination->create_links()
								);
							}
						}
						$this->load->view('public/public-commisionpage', $data, 'default');break;
			}
		}
	}
/* End of file portfolio.php */
/* Location: ./system/application/controllers/portfolio.php */
