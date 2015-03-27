<?php 
	class ModelAuthentification extends Model{
		
		function ModelAuthentification(){
			parent::Model();
		}
		
		var $table = 'user';
		
		function checkUser($user, $pass){
			$query = $this->db->get_where($this->table, 
										array(
										'user'=>$user,
										'password' => $pass
										),
										1,
										0
										);
			
			if($query->num_rows()>0){
				return TRUE;
			}else{
				return FALSE;
			}
		}
		
		function getUser($user, $pass){
			return $this->db->query("
			select u.id, u.user, u.password 
			from user u
			where u.user='$user' and u.password='$pass'");
			
			// $this->db->where('user',$user);
			// $this->db->where('password',md5($password));
			// $query = $this->db->get('user');
			// return $query;
		}
	}
	
/* End of file modellogin.php */
/* Location: ./system/application/model/modelauthentification.php */