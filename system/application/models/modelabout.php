<?php
	class ModelAbout extends Model{
		// GET CONTENT FROM ABOUT
		function getAboutContent(){
			$query = $this->db->get('about');
			if($query->num_rows()>0){
				$data = $query->row();
				return $data;
			}
		}
	}
/* End of file modelabout.php */
/* Location: ./system/application/models/modelabout.php */