<?php
	
	class ModelPublic extends Model{
		
		function ModelPublic(){
			parent::Model();
		}
		//FRONTPAGE
		function getFrontpage(){
			$getquery = $this->db->get('frontpage_content');
			if($getquery->num_rows>0){
				$data = $getquery->row();
				return $data;
			}
		}
		//PERSONAL
			//COUNT PERSONAL CATEGORY
		function countPersonal(){
			$this->db->where('id_main_cat', 1);
			$this->db->from('title_photopost');
			return $this->db->count_all_results();
		}
			//COUNT SPECIFY PERSONAL PROJECT
		function countSPersonal($title){
			//$this->db->where('photopost.id_title_photopost', 'title_photopost.id');
			//$this->db->where('title_photopost.title_photopost', $title);
			$query = $this->db->query(
				"SELECT COUNT(p.id) AS countphoto FROM title_photopost t, photopost p WHERE p.id_title_photopost=t.id AND t.title_photopost='$title'"
			);
			if($query->num_rows()>0){
				$row=$query->row();
				return $row;
			}
		}
			//GET LIST OF PHOTO FROM PERSONAL CATEGORY
		function getPhotoPersonal($offset="", $limit=""){ 
			$query = $this->db->query("
					SELECT tp.id, tp.id_main_cat, tp.title_photopost, tp.description, tp.thumb
					FROM title_photopost tp, main_category mc
					WHERE tp.id_main_cat = 1 AND
					tp.id_main_cat = mc.id ORDER BY tp.id DESC LIMIT $offset, $limit");
			if($query->num_rows()>0){
				foreach($query->result() as $row){
					$data[]=$row;
				}
				return $data;
			}
		}
			//GET SPECIFIED TITLE PHOTO
		function getTitlePhotoP($titlephoto){ 
			$query = "SELECT tp.id, tp.title_photopost, tp.description, tp.thumb
					FROM title_photopost tp
					WHERE tp.title_photopost = ? AND
					tp.id_main_cat=1";
			$get = $this->db->query($query, $titlephoto);
			if($get->num_rows()>0){
				$data = $get->row();
				return $data;
			}
		}
			//GET SPECIFIED PHOTO
		function getPhotoP($titlephoto){ 
			$query = "SELECT p.id, p.id_title_photopost, tp.title_photopost, p.photopost, p.thumb, p.description 
					FROM title_photopost tp, photopost p
					WHERE tp.title_photopost = ? AND
					p.id_title_photopost = tp.id AND
					tp.id_main_cat = 1 ORDER BY p.id ASC";
			$get = $this->db->query($query, $titlephoto);
			if($get->num_rows()>0){
				foreach ($get->result() as $row){
					$data[]=$row;
				}
				// $data = $get->row();
				return $data;
			}
		}
		function getPhotoPS($titlephoto, $offset="", $limit=""){
			$query = "SELECT p.id, p.id_title_photopost, tp.title_photopost, p.photopost, p.thumb, p.description 
					FROM title_photopost tp, photopost p
					WHERE tp.title_photopost = ? AND
					p.id_title_photopost = tp.id AND
					tp.id_main_cat = 1 ORDER BY p.id ASC
					LIMIT $offset, $limit";
			$get = $this->db->query($query, $titlephoto);
			if($get->num_rows()>0){
				foreach($get->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		//PERSONAL
		
		
		//COMMISION
			//COUNT COMMISION CATEGORY
		function countCommision(){
			$this->db->where('id_main_cat', 2);
			$this->db->from('title_photopost');
			return $this->db->count_all_results();
		}
			//COUNT SPECIFY COMMISION PROJECT
		function countSCommision($title){
			$query = $this->db->query(
				"SELECT COUNT(p.id) AS countphoto FROM title_photopost t, photopost p WHERE p.id_title_photopost=t.id AND t.title_photopost='$title'"
			);
			if($query->num_rows()>0){
				$row=$query->row();
				return $row;
			}
		}
			//GET LIST OF PHOTO FROM COMMISION CATEGORY
		function getPhotoCommision($offset="", $limit=""){
			$query  = $this->db->query("
					SELECT tp.id, tp.id_main_cat, tp.title_photopost, tp.description, tp.thumb
					FROM title_photopost tp, main_category mc
					WHERE tp.id_main_cat = 2 AND
					tp.id_main_cat = mc.id ORDER BY tp.id DESC LIMIT $offset, $limit");
			return $query->result();
		}
			//GET SPECIFIED TITLE PHOTO
		function getTitlePhotoC($titlephoto){ 
			$query = "SELECT tp.id, tp.title_photopost, tp.description, tp.thumb
					FROM title_photopost tp
					WHERE tp.title_photopost = ? AND
					tp.id_main_cat=2";
			$get = $this->db->query($query, $titlephoto);
			if($get->num_rows()>0){
				$data = $get->row();
				return $data;
			}
		}
			//GET SPECIFIED PHOTO
		function getPhotoC($titlephoto){ 
			$query = "SELECT p.id, p.id_title_photopost, tp.title_photopost, p.photopost, p.thumb, p.description 
					FROM title_photopost tp, photopost p
					WHERE tp.title_photopost = ? AND
					p.id_title_photopost = tp.id AND
					tp.id_main_cat = 2 ORDER BY p.id ASC";
			$get = $this->db->query($query, $titlephoto);
			if($get->num_rows()>0){
				foreach ($get->result() as $row){
					$data[]=$row;
				}
				// $data=$get->row();
				return $data;
			}
		}
		function getPhotoCS($titlephoto, $offset="", $limit=""){
			$query = "SELECT p.id, p.id_title_photopost, tp.title_photopost, p.photopost, p.thumb, p.description 
					FROM title_photopost tp, photopost p
					WHERE tp.title_photopost = ? AND
					p.id_title_photopost = tp.id AND
					tp.id_main_cat = 2 ORDER BY p.id ASC
					LIMIT $offset, $limit";
			$get = $this->db->query($query, $titlephoto);
			if($get->num_rows()>0){
				foreach($get->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		//COMMISION
		
		
		//ABOUT
			// GET CONTENT FROM ABOUT
		function getAboutContent(){
			$query = $this->db->get('about');
			if($query->num_rows()>0){
				$data = $query->row();
				return $data;
			}
		}
		//ABOUT
	}

/* End of file modelpublic.php */
/* Location: ./system/application/models/modelpublic.php */