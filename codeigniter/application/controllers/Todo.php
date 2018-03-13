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

		$data['title']='Créer un compte';
		$data['content']='create_user';

        $this->form_validation->set_rules('nickname' , 'Identifiant' , 'required');
        $this->form_validation->set_rules('pass' , 'Mot de passe' , 'required');
        $this->form_validation->set_rules('mail' , 'Addresse mail' , 'required');

		if ($this->form_validation->run()!== FALSE ) {
            $nickname = $this->input->post('nickname');
            $pass = $this->input->post('pass');
            $mail = $this->input->post('mail');
            $this->todo_model->create_user($nickname,$pass,$mail);
		}

		$data['todolist']=$this->todo_model->get_user();


		$this->load->vars($data);
		$this->load->view('template');

	}
	

	public function create()
	{
		$this->load->helper('form');
		$this->load->library ('form_validation');
		$data['title']='Créer un compte';
		$this->form_validation->set_rules('nickname' , 'Identifiant' , 'required');
		$this->form_validation->set_rules('pass' , 'Mot de passe' , 'required');
		$this->form_validation->set_rules('mail' , 'Addresse mail' , 'required');
		if($this->form_validation->run() === FALSE )
		{
			$data ['content'] = 'create_user';
		}
		else
		{
			$nickname = $this->input->post('nickname');
			$pass = $this->input->post('pass');
			$mail = $this->input->post('mail');
			$this->todo_model->create_user($nickname,$pass,$mail);
			$data['content'] = 'create_success';
		}
		$this->load->vars($data);
		$this->load->view('template');
	}

	public function delete($taskid)
	{
		$this->todo_model->todo_delete_task($taskid);
		$this->index();
	}
}
?>


