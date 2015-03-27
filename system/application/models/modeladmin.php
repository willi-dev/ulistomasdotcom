<?php
	class ModelAdmin extends Model{
		
		function ModelAdmin(){
			parent::Model();
		}
		
		function getFrontpage(){
			$getquery = $this->db->get('frontpage_content');
			if($getquery->num_rows>0){
				$data = $getquery->row();
				return $data;
			}
		}
		function getAbout(){
			$getquery = $this->db->get('about');
			if($getquery->num_rows>0){
				// foreach($getquery->result() as $row){
					// $data[] = $row;
				// }
				$data = $getquery->row();
				return $data;
			}
		}
		function getTitlePhotoP($offset="", $limit=""){
			$getquery = $this->db->query("
						SELECT tp.id, tp.title_photopost, tp.description, tp.thumb, mc.id as idcat, mc.main_category
						FROM title_photopost tp, main_category mc
						WHERE tp.id_main_cat = mc.id
						ORDER BY tp.id DESC LIMIT $offset, $limit");
			if($getquery->num_rows()>0){
				foreach($getquery->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		function getTitlePhoto(){
			$getquery = $this->db->query("
						SELECT tp.id, tp.title_photopost, tp.description, tp.thumb, mc.id as idcat, mc.main_category
						FROM title_photopost tp, main_category mc
						WHERE tp.id_main_cat = mc.id
						ORDER BY tp.id DESC");
			if($getquery->num_rows()>0){
				foreach($getquery->result() as $row){
					$data[] = $row;
				}
				return $data;
			}
		}
		function getTitleDetail($id){
			$query = "SELECT distinct tp.title_photopost FROM title_photopost tp, photopost p WHERE tp.id = ? AND p.id_title_photopost = tp.id";
			$getquery = $this->db->query($query, $id);
			if($getquery->num_rows()>0){
				$data = $getquery->row();
				return $data;
			}
		}
		function getDetail($id){
			$query = "SELECT p.id, p.id_title_photopost, p.photopost, p.thumb, p.description
					FROM photopost p, title_photopost tp
					WHERE p.id_title_photopost = ? AND
					p.id_title_photopost = tp.id";
			$getquery = $this->db->query($query, $id);
			if($getquery->num_rows()>0){
				foreach($getquery->result() as $row){
					$data[] = $row;
				}
			}
			return $data;
		}
		function getSP($idhapus){
			$query = $this->db->query("
				SELECT p.id, p.photopost, p.thumb FROM photopost p WHERE p.id = '$idhapus'
			");
			if($query->num_rows()>0){
				$row = $query->row();
				return $row;
			}
		}
		function delTitlePhoto($id){
			return $this->db->delete('title_photopost', array('id' => $id));
		}
		function delPhotopost($id){
			return $this->db->delete('photopost', array('id_title_photopost' => $id));
		}
		function delEachPhoto($id){
			return $this->db->delete('photopost', array('id' => $id));
		}
		function countPhoto($id){
			$query = $this->db->query(
				"SELECT COUNT(p.id) AS countphoto FROM title_photopost t, photopost p WHERE p.id_title_photopost=t.id AND t.id='$id'"
			);
			if($query->num_rows()>0){
				$row=$query->row();
				return $row;
			}
		}
	}
	
/* End of file modeladmin.php */
/* Location: ./system/application/models/modeladmin.php */