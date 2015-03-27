<?php 
	class ModelCommision extends Model{
		
		//GET COMMISION CATEGORY
		function getCatCommision(){ 
			$query = $this->db->query("
					SELECT mc.id, mc.main_category, mc.main_description 
					FROM main_category mc 
					WHERE mc.id=2");
			return $query->result();
		}
		//COUNT COMMISION CATEGORY
		function countCommision(){
			$this->db->where('id_main_cat', 2);
			$this->db->from('title_photopost');
			return $this->db->count_all_results();
		}
		//GET LIST OF PHOTO FROM COMMISION CATEGORY
		function getPhotoCommision($offset="", $limit=""){
			$query  = $this->db->query("
					SELECT tp.id, tp.id_main_cat, tp.title_photopost, tp.description, tp.thumb, tp.thumbsquare
					FROM title_photopost tp, main_category mc
					WHERE tp.id_main_cat = 2 AND
					tp.id_main_cat = mc.id ORDER BY tp.id DESC LIMIT $offset, $limit");
			return $query->result();
		}
		//GET SPECIFIED TITLE PHOTO
		function getTitlePhoto($titlephoto){ 
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
		function getPhoto($titlephoto){ 
			$query = "SELECT p.id, p.id_title_photopost, tp.title_photopost, p.photopost, p.thumb, p.thumbsquare, p.description 
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
	}
/* End of file modelcommision.php */
/* Location: ./system/application/models/modelcommision.php */