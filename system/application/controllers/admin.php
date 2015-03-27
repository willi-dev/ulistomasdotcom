<?php
	
	class Admin extends controller{
		
		function Admin(){
			parent::Controller();
			$this->load->model(array('modelauthentification','modeladmin'), '', TRUE);
			$this->load->library(array('upload'));
		}
		function index(){
			if($this->session->userdata('user') == 'admin'){
				redirect('admin/main');
			}else{
				redirect('login');
			}
		}
		function main(){
			if($this->session->userdata('user') == 'admin'){	
				$data = array(
						'user'=>$this->session->userdata('user'),
						'password'=>$this->session->userdata('password')
				);
				$this->load->view('admin/admin_main',$data);
			}else{
				redirect('login');
			}
		}
		//PHOTO
		function photo($page="page"){
			if($this->session->userdata('user')=='admin'){
				$count=$this->db->count_all('title_photopost');
				if($this->uri->segment(4)==""){
					$data = array(
						'user' => $this->session->userdata('user'),
						'error' => 'no photo(s)',
						'gettitlephoto' => $this->modeladmin->getTitlePhotoP(0,5)
					);
				}else{
					$check = preg_match( '/^[0-9]+$/', $this->uri->segment(4));
					if($check==FALSE){
						redirect('admin/photo');
					}else{
						$data = array(
						'user' => $this->session->userdata('user'),
						'error' => 'no photo(s)',
						'gettitlephoto' => $this->modeladmin->getTitlePhotoP($this->uri->segment(4),5)
						);
					}
				}
				$this->session->set_userdata('row',$this->uri->segment(4));
				$configpage=array(
							'base_url'=>base_url()."admin/photo/$page",
							'per_page'=>5,
							'total_rows'=>$count,
							'uri_segment'=>4,
							'first_link'=>'First Page',
							'first_tag_open'=>'<span class="boxpaging">',
							'first_tag_close'=>'</span>',
							'last_link'=>'Last Page',
							'last_tag_open'=>'<span class="boxpaging">',
							'last_tag_close'=>'</span>',
							'next_link'=>'Next Page',
							'next_tag_open' =>'<span class="boxpaging">',
							'next_tag_close' =>'</span>',
							'prev_link'=>'Prev Page',
							'prev_tag_open'=>'<span class="boxpaging">',
							'prev_tag_close'=>'</span>',
							'cur_tag_open'=>'<span class="curpaging">',
							'cur_tag_close'=>'</span>',
							'num_tag_open'=>'<span class="digitpaging">',
							'num_tag_close'=>'</span>'
				);
				$this->pagination->initialize($configpage);
				$this->load->view('admin/admin_photo',$data,'default');
			}else{
				redirect('login');
			}
		}
		function photodetail(){
			if($this->session->userdata('user')=='admin'){
				$id=$this->uri->segment(3);
				$this->db->where('id_title_photopost', $id);
				$this->db->from('photopost');
				$data['numrows']=$this->db->count_all_results();
				if($data['numrows']==0){
					redirect('admin/photo/page');
				}else{
					$data = array(
						'user' => $this->session->userdata('user'),
						'linkback'=> anchor('admin/photo', 'kembali'),
						'error' => 'no selected photo!',
						'numrows'=>$this->db->count_all_results(),
						'gettitlephoto' => $this->modeladmin->getTitlePhoto(),
						'gettitledetail' => $this->modeladmin->getTitleDetail($id),
						'getdetail' => $this->modeladmin->getDetail($id)
					);
					$this->load->view('admin/admin_photo_detail', $data);
				}
			}else{
				redirect('login');
			}
		}
		function addtitlephoto(){
			if($this->session->userdata('user')=='admin'){
				$data = array(
						'user' => $this->session->userdata('user')
				);
				$dthumb="uploads/thumb/default.png";
				$dthumbs="uploads/thumbsquare/default.png";
				$arrayin=array(' ','"','-','&',';');
				$arraysave=array('_','&#34','_','','');
				$field = array(
						'id_main_cat' => $_POST['selectproject'],
						'title_photopost' => str_replace($arrayin,$arraysave,$this->input->post('titlephoto')),
						'description' => str_replace($arrayin, $arraysave, $this->input->post('description')),
						'thumb' => $dthumb,
						'thumbsquare' => $dthumbs
				);
				$this->form_validation->set_rules('titlephoto', 'titlephoto', 'required');
				if($this->form_validation->run()==FALSE){
					$this->session->set_flashdata('titlekosong', '<div class="error">title belum diisi!</div>');
					redirect('admin/photo#formaddphoto');
				}else{
					$this->db->insert('title_photopost',$field);
					$this->session->set_flashdata('insertsuccess', '<div class="success">add photo title successfully!</div>');
					redirect('admin/photo');
				}
				
			}else{
				redirect('login');
			}
		}
		function addphoto(){ //UPLOAD MULTIPLE PHOTOS
			if($this->session->userdata('user')=='admin'){
				
				$data['user']=$this->session->userdata('user');
				$i=5;
				for($j=1; $j<=$i; $j++){
					$idtitle=$_POST['idtitle'];
					$config = array(
						'upload_path' => 'uploads',
						'allowed_types' => 'jpg',
						'encrypt_name' => TRUE,
						'file_name'=> $idtitle.'-photo.jpg',
						'max_size' => '1000',
						'remove_spaces'=> TRUE
					);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					if($this->upload->do_upload('photo'.$j)){
						$idtitlephoto = $_POST['idtitle'];
						$dok=$this->upload->data();
						$filedok = "uploads/".$dok['file_name'];
						$this->create_thumb($dok);
						$filedokthumb = "uploads/thumb/".$dok['file_name'];
						//$this->thumbsquare($dok['file_name']);
						//$fthumbsquare="uploads/thumbsquare/".$dok['file_name'];
						//$this->db->query("INSERT INTO photopost VALUES('','$idtitlephoto','$filedok','$filedokthumb','$fthumbsquare','')");
						$field=array(
							'id'=>'',
							'id_title_photopost'=> $idtitlephoto,
							'photopost'=> $filedok,
							'thumb'=> $filedokthumb,
							'thumbsquare'=> '',
							'description'=> ''
						);
						$this->db->insert('photopost',$field);
					}
				}
				redirect('admin/photo/page/'.$this->input->post('urisegment'));
			}else{
				redirect('login');
			}
		}
		function create_thumb($dok){ //RESIZE PHOTO TO THUMB
			
			$imgfilename = $dok['file_name'];
			$imgwidth = $dok['image_width'];
			$imgheight = $dok['image_height'];
			if($imgwidth!=$imgheight){
				if($imgwidth < $imgheight){
					$newwidth = 200;
					$aspectratio = $imgheight/$imgwidth;
					$newheight = $aspectratio*$newwidth;
					$config = array(
						'source_image' => 'uploads/'.$imgfilename,
						'new_image' => 'uploads/thumb/'.$imgfilename,
						'maintain_ratio' => TRUE,
						'width' => $newwidth,
						'height' => $newheight
					);
				}else{
					$newheight = 200;
					$aspectratio = $imgwidth/$imgheight;
					$newwidth = $aspectratio*$newheight;
					$config = array(
						'source_image' => 'uploads/'.$imgfilename,
						'new_image' => 'uploads/thumb/'.$imgfilename,
						'maintain_ratio' => TRUE,
						'width' => $newwidth,
						'height' => $newheight
					);
				}
			}else{
				$newwidth=200;
				$newheight=200;
				$config = array(
						'source_image' => 'uploads/'.$imgfilename,
						'new_image' => 'uploads/thumb/'.$imgfilename,
						'maintain_ratio' => TRUE,
						'width' => $newwidth,
						'height' => $newheight
				);
			}
			$this->image_lib->initialize($config);
			if ( ! $this->image_lib->resize()){
				echo $this->image_lib->display_errors();
			}
			
		}
		/* function thumbsquare($dok){ //RESIZE PHOTO TO THUMBSQUARE 150PX
			$thumbsize=150;
			$con = array(
						'image_library'=>'gd2',
						'source_image'=>'uploads/thumb/'.$dok,
						'new_image'=>'uploads/thumbsquare/'.$dok,
						'maintain_ratio' => FALSE,
						'width'=>$thumbsize,
						'height'=>$thumbsize,
						'x_axis'=> 0,
						'y_axis'=> 0
			);
			$this->image_lib->initialize($con);
			if(!$this->image_lib->crop()){
				echo $this->image_lib->display_errors();
			}
		} */
		function uptitlephoto(){
			if($this->session->userdata('user')=='admin'){
				$data['user']=$this->session->userdata('user');
				$arrayin=array(' ','"');
				$arraysave=array('_','&#34');
				$dataupdate = array('title_photopost' => str_replace($arrayin,$arraysave,$this->input->post('titlephoto')), 'id_main_cat'=> $_POST['selectproject'], 'description'=> str_replace($arrayin, $arraysave, $this->input->post('content')));
				
				$this->form_validation->set_rules('titlephoto', 'titlephoto', 'required');
				if($this->form_validation->run()==FALSE){
					$this->session->set_flashdata('uptitlekosong', '<div class="error">update photo title failed! </div>');
					redirect('admin/photo/page/'.$this->input->post('urisegment'));
				}else{
					$this->db->where('id', $this->input->post('idtitle'));
					$this->db->update('title_photopost',$dataupdate);
					$this->session->set_flashdata('updatesuccess', '<div class="success">update photo title successfully!</div>');
					redirect('admin/photo/page/'.$this->input->post('urisegment'));
				}
			}else{
				redirect('login');
			}
		}
		function upthumbphoto(){
			if($this->session->userdata('user')=='admin'){
				$data['user']=$this->session->userdata('user');
				$thumb=array('thumb'=>$_POST['thumb']);
				$this->db->where('id', $_POST['idtitlephotopost']);
				$this->db->update('title_photopost',$thumb);
				redirect('admin/photodetail/'.$this->input->post('idtitlephotopost').'/'.$this->input->post('urisegment'));
			}else{
				redirect('login');
			}
		}
		function delphoto(){
			if($this->session->userdata('user')=='admin'){
				if($this->uri->segment(4)==FALSE){
					$id=$this->uri->segment(3);
					$count = $this->modeladmin->countPhoto($id);
					$jum = $count->countphoto;
					
					for($i=0; $i<$jum; $i++){
						$getphoto = $this->modeladmin->getDetail($id);
						foreach($getphoto as $row){
							if($row->photopost != ""){
								if(file_exists('./'.$row->photopost) || file_exists('./'.$row->thumb)){
									unlink($row->photopost) or die('failed delete : ' .$row->photopost);
									unlink($row->thumb) or die('failed delete : ' .$row->thumb);
								}
							}
						}
					}
					$this->modeladmin->delTitlePhoto($id);
					$this->modeladmin->delPhotopost($id);
					redirect('admin/photo');
				}else{
					$id=$this->uri->segment(4);
					$count = $this->modeladmin->countPhoto($id);
					$jum = $count->countphoto;
					
					for($i=0; $i<$jum; $i++){
						$getphoto = $this->modeladmin->getDetail($id);
						foreach($getphoto as $row){
							if($row->photopost != ""){
								if(file_exists('./'.$row->photopost) || file_exists('./'.$row->thumb)){
									unlink($row->photopost) or die('failed delete : ' .$row->photopost);
									unlink($row->thumb) or die('failed delete : ' .$row->thumb);
								}
							}
						}
					}
					$this->modeladmin->delTitlePhoto($id);
					$this->modeladmin->delPhotopost($id);
					redirect('admin/photo/page/'.$this->uri->segment(3));
				}
			}else{
				redirect('login');
			}
		}
		function deleachphoto(){
			if($this->session->userdata('user')=='admin'){
				$idtitle=$this->uri->segment(3);
				$idhapus=$this->uri->segment(4);
				
				$getSP = $this->modeladmin->getSP($idhapus);
				if($getSP->photopost != ""){
					if(file_exists('./'.$getSP->photopost) || file_exists('./'.$getSP->thumb)){
						unlink($getSP->photopost) or die('failed delete : ' . $getSP->photopost);
						unlink($getSP->thumb) or die('failed delete : ' .$getSP->thumb);
					}
				}
				$this->modeladmin->delEachPhoto($idhapus);
				redirect('admin/photodetail/'.$idtitle);
			}else{
				redirect('login');
			}
		}
		function adddescphoto(){
			if($this->session->userdata('user')=='admin'){
				$data['user']=$this->session->userdata('user');
				$arrayin=array(' ','"', '#');
				$arraysave=array('_','&#34;', '#');
				$descupdate=array('description'=> str_replace($arrayin,$arraysave, $_POST['content']));
				$this->db->where('id', $this->input->post('id',TRUE));
				$this->db->update('photopost', $descupdate);
				redirect('admin/photodetail/'.$_POST['idtitlephotopost'].'/'.$_POST['urisegment']);
			}else{
				redirect('login');
			}
		}
		//END OF PHOTO
		//ABOUT
		function about(){
			if($this->session->userdata('user') == 'admin'){
				$data = array(
						'user' => $this->session->userdata('user'),
						'error' => 'mohon isikan tentang diri anda!',
						'getabout' => $this->modeladmin->getAbout()
				);
				$this->load->view('admin/admin_about',$data);
			}else{
				redirect('login');
			}
		}
		function add_about(){
			if($this->session->userdata('user') == 'admin'){
				$data['user']=$this->session->userdata('user');
				$arrayin=array(' ','"');
				$arraysave=array('_','&#34');
				$about=$this->input->post('about', TRUE);
				$dataabout = array('about' => str_replace($arrayin, $arraysave, $about));
				$this->db->insert('about',$dataabout);
				$this->session->set_flashdata('aboutsuccess', '<div class="success">Success!</div>');
				redirect('admin/about');
			}else{
				redirect('login');
			}
		}
		function update_about(){
			if($this->session->userdata('user') == 'admin'){
				$data['user']=$this->session->userdata('user');
				$arrayin=array(' ','"');
				$arraysave=array('_','&#34');
				$dataupdate = array('about' => str_replace($arrayin, $arraysave, $this->input->post('content')));
				$this->db->where('id', $this->input->post('idabout'));
				$this->db->update('about', $dataupdate);
				$this->session->set_flashdata('updated', '<div class="success">about content updated!</div>');
				redirect('admin/about');
			}else{
				redirect('login');
			}
		}
		function foto_about(){
			if($this->session->userdata('user') == 'admin'){
				$data['user']=$this->session->userdata('user');
				$configphoto = array(
					'upload_path' => 'uploads/about',
					'allowed_types' => 'gif|jpg|png',
					'max_size' => '1000'
				);
				$this->upload->initialize($configphoto);
				if(!$this->upload->do_upload('fotodiri')){
					//$data['error']=$this->upload->display_error();
					echo 'error';
					//redirect('admin/about');
				}else{
					$foto=$this->upload->data();
					$pathfoto="uploads/about/".$foto['file_name'];
					$dataup = array('photo' => $pathfoto);
					//$idabout = $_POST['id-about'];
					$this->db->where('id', '1');
					$this->db->update('about', $dataup);
					$this->session->set_flashdata('uploaded', '<div class="success">Photo Uploaded!</div>');
					//$this->db->query("UPDATE about SET photo='$pathphoto' WHERE id='$idabout'");
					redirect('admin/about');
				}
			}else{
				redirect('login');
			}
		}
		function del_foto_about(){ // ONLY UPDATE 'PHOTO' FIELD IN ABOUT-TABLE
			if($this->session->userdata('user') == 'admin'){
				$pathfoto = '';
				$data = array('photo' => $pathfoto);
				$this->db->where('id', 1);
				$this->db->update('about', $data);
				$this->session->set_flashdata('deleted', '<div class="success">Photo Deleted!</div>');
				redirect('admin/about');
			}else{
				redirect('login');
			}
		}
		function update_contact(){
			if($this->session->userdata('user') == 'admin'){
				$data['user'] = $this->session->userdata('user');
				$arrayin=array(' ','"');
				$arraysave=array('_','&#34');
				$dataupdate = array('contact' => str_replace($arrayin, $arraysave, htmlentities($this->input->post('contentcontact'))));
				$this->db->where('id', $this->input->post('idabout'));
				$this->db->update('about', $dataupdate);
				$this->session->set_flashdata('updated', '<div class="success">contact content updated!</div>');
				redirect('admin/about');
			}else{
				redirect('login');
			}
		}
		//END OF ABOUT
		// OPTION
		function option(){
			if($this->session->userdata('user') == 'admin'){
				$data = array(
						'user'=>$this->session->userdata('user'),
						'password'=>$this->session->userdata('password'),
						'getfrontpage' => $this->modeladmin->getFrontpage()
				);
				$this->load->view('admin/admin_option', $data);
			}else{
				redirect('login');
			}
		}
		function updatepass(){ // UPDATE PASSWORD
			if($this->session->userdata('user') == 'admin'){
				$data = array(
						'user'=>$this->session->userdata('user'),
						'password'=>$this->session->userdata('password')
				);
				$oldpass=$this->input->post('oldpass',TRUE);
				$op=md5($oldpass);
				$retypeoldpass=$this->input->post('retypeoldpass',TRUE);
				$rtop=md5($retypeoldpass);
				$newpass=$this->input->post('newpass',TRUE);
				$np=md5($newpass);
				
				if($op==$rtop){
					if($op==$this->session->userdata('password')){
						$dataup=array('password'=>$np);
						$this->db->where('id', 1);
						$this->db->update('user',$dataup);
						$this->session->set_flashdata('success', '<div class="success">change password succesfull!</div>');
						redirect('admin/option');
					}else{
						$this->session->set_flashdata('oldpassbeda', '<div class="error">wrong old password!</div>');
						redirect('admin/option');
					}
				}else{
					$this->session->set_flashdata('oldpassre', '<div class="error">old password not match!</div>');
					redirect('admin/option');
				}
			}else{
				redirect('login');
			}
		}
		
		function upfrontphoto(){ // UPDATE FRONTPAGE_CONTENT FIELD IN FRONTPAGE_CONTENT-TABLE
			if($this->session->userdata('user')=='admin'){
				$data['user']=$this->session->userdata('user');
				$configfoto= array(
							'upload_path' => 'uploads/home',
							'allowed_types' => 'gif|jpg|png',
							'encrypt_name' => TRUE,
							'max_size' => '1000'
				);
				$this->upload->initialize($configfoto);
				if(!$this->upload->do_upload('frontphoto')){
					$this->session->set_flashdata('uploaderror', '<div class="error">upload error!</div>');
					redirect('admin/option#opfrontimage');
				}else{
					$foto=$this->upload->data();
					$pathfoto="uploads/home/".$foto['file_name'];
					$dataupload=array(
							'frontpage_content' => $pathfoto
					);
					$this->db->where('id','1');
					$this->db->update('frontpage_content', $dataupload);
					$this->session->set_flashdata('uploadsuccess', '<div class="success">upload front photo succesfully!</div>');
					redirect('admin/option#opfrontimage');
				}
			}else{
				redirect('login');
			}
		}
		function delfrontphoto(){ //UPDATE FRONTPAGE_CONTENT FIELD WITH EMPTY VALUE
			if($this->session->userdata('user')=='admin'){
				$data['user']=$this->session->userdata('user');
				$pathfoto='';
				$datadel=array(
						'frontpage_content' => $pathfoto
				);
				$this->db->where('id','1');
				$this->db->update('frontpage_content', $datadel);
				$this->session->set_flashdata('deletesuccess', '<div class="success">delete front photo succesfully!</div>');
				redirect('admin/option#opfrontimage');
			}else{
				redirect('login');
			}
		}
		// END OF OPTION
	}
	
/* End of file admin.php */
/* Location: ./system/application/controllers/admin.php */