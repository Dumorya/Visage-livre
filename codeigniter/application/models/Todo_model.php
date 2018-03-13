<?php
class Todo_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function todo_get_task()
	{
		$query=$this->db->get('todo');
		return $query->result_array();
	}
	public function todo_add_task($title){
		$data = array(
			//'id => ??
			'title' => $title
		);
		return $this->db->insert('todo',$data);
	}
	public function todo_delete_task ($numTask) {
		$data = array('id'=>$numTask);
		$this->db->delete('todo',$data);
	}
}
?>
