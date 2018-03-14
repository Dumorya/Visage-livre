<?php
	class Todo_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_user()
		{
			$query = $this->db->get('_user');
			return $query->result_array();
		}

		public function create_user($nickname, $pass, $email)
		{
			$data = array(
				'nickname' => $nickname,
				'pass' 	   => $pass,
				'email'    => $email
			);
			return $this->db->insert('_user',$data);
		}

	//	public function todo_delete_task ($numTask) {
	//		$data = array('id'=>$numTask);
	//		$this->db->delete('_user',$data);
	//	}
	
		public function connection($connect_nickname,$connect_pass)
		{
			return $this->db->select('nickname,pass')
                        ->from('_user')
                        ->where('nickname', $connect_nickname)
                        ->where('pass', $connect_pass)
                        ->get()
                        ->result();
        }
	}
?>
