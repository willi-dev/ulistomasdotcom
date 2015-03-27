<?php
	class ModelFrontpage extends Model{
		function FrontpageContent(){
			parent::Model();
		}
		function getFrontpage(){
			$getquery = $this->db->get('frontpage_content');
			if($getquery->num_rows>0){
				$data = $getquery->row();
				return $data;
			}
		}
	}
/* End of file modelfrontpage.php */
/* Location: ./system/application/models/modelfrontpage.php */