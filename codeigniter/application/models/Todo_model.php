<?php
class Todo_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}

	public function get_user()
	{
		$query=$this->db->get('_user');
		return $query->result_array();
	}

    public function create_user($nickname, $pass, $mail)
	{
        $data = array(
            'nickname' => $nickname,
            'pass' => $pass,
            'mail' => $mail
        );
        return $this->db->insert('_user',$data);
    }

//	public function todo_delete_task ($numTask) {
//		$data = array('id'=>$numTask);
//		$this->db->delete('_user',$data);
//	}
}
?>
