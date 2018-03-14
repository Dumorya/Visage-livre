<?php
class Todo extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('todo_model');
		$this->load->helper('url');
	}
	
	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title']='Créer un compte';
		$data['content'] = 'home';
		
		//Récupérer les données saisies envoyées en POST
        $connect_nickname = $this->input->post('connect_nickname');
        $connect_pass = $this->input->post('connect_pass');
        
        
        $this->form_validation->set_rules('connect_nickname', '"Identifiant"', 'trim|required|xss_clean');
        $this->form_validation->set_rules('connect_pass', '"Mot de passe"', 'trim|required|xss_clean');
        $result = $this->todo_model->connection($connect_nickname,$connect_pass);
        
        if($this->form_validation->run() !== false)
        {
			$connect_nickname 		 = $this->input->post('connect_nickname');
			$connect_pass 	  		 = $this->input->post('connect_pass');
			$this->todo_model->connection($connect_nickname,$connect_pass);
			
            $this->load->view('post_list');
        }
		
		// Création d'un compte
        $this->form_validation->set_rules('create_nickname' , 'Identifiant' , 'required');
        $this->form_validation->set_rules('create_pass' , 'Mot de passe' , 'required');
        $this->form_validation->set_rules('create_email' , 'Addresse mail' , 'required');

		if ($this->form_validation->run() !== FALSE)
		{
			$create_nickname 		 = $this->input->post('create_nickname');
			$create_pass 	  		 = $this->input->post('create_pass');
			$create_email 	  		 = $this->input->post('create_email');
			$this->todo_model->create_user($create_nickname,$create_pass,$create_email);
			$data['content'] = 'post_list';
		}

		$data['user'] = $this->todo_model->get_user();


		$this->load->vars($data);
		$this->load->view('template');

	}
	

	/*public function create()
	{
		$this->load->helper('form');
		$this->load->library ('form_validation');
		$data['title']='Créer un compte';
		$this->form_validation->set_rules('nickname' , 'Identifiant' , 'required');
		$this->form_validation->set_rules('pass' , 'Mot de passe' , 'required');
		$this->form_validation->set_rules('email' , 'Addresse mail' , 'required');
		if($this->form_validation->run() === FALSE )
		{
			$data ['content'] = 'create_user';
		}
		else
		{
			$nickname = $this->input->post('nickname');
			$pass = $this->input->post('pass');
			$email = $this->input->post('email');
			$this->todo_model->create_user($nickname,$pass,$email);
			$data['content'] = 'create_success';
		}
		$this->load->vars($data);
		$this->load->view('template');
	}*/

	public function delete($taskid)
	{
		$this->todo_model->todo_delete_task($taskid);
		$this->index();
	}
}
?>


