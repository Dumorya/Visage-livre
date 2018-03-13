<?php
class Todo extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('todo_model');
		$this->load->helper('url');
	}
	public function index(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title']='Todo List';
		$data['content']='main';

		$this->form_validation->set_rules('title','Enonce' , 'required');

		if ($this->form_validation->run()!== FALSE ) {
			$title = $this->input->post('title');
			$this->todo_model->todo_add_task($title);
		}

		$data['todolist']=$this->todo_model->todo_get_task();


		$this->load->vars($data);
		$this->load->view('template');

	}
	

	public function create () {
		$this->load->helper('form');
		$this->load->library ('form_validation');
		$data['title']='Creer une tache';
		$this->form_validation->set_rules ('title' , 'Enonce' , 'required');
		if( $this->form_validation->run() === FALSE ) {
			$data ['content'] = 'form';	
		} else {
			$title = $this->input->post('title');
			$this->todo_model->todo_add_task($title);
			$data['content'] = 'add_success';
		}
		$this->load->vars($data);
		$this->load->view('template');
	}
	public function delete($taskid){
		$this->todo_model->todo_delete_task($taskid);
		$this->index();
	}
}
?>


