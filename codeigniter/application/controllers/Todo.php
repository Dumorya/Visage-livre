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
		$this->load->library('session');

		$data['title']='Créer un compte';
		$data['content'] = 'home';
		
		//Récupérer les données saisies envoyées en POST
		
		$this->form_validation->set_rules('connect_nickname' , 'Identifiant' , 'required');
        $this->form_validation->set_rules('connect_pass' , 'Mot de passe' , 'required');
        
        if($this->form_validation->run() !== false)
        {
			$connect_nickname = $this->input->post('connect_nickname');
			$connect_pass 	  = $this->input->post('connect_pass');
			$connect_email 	  = $this->todo_model->get_email($connect_nickname);
			$result 		  = $this->todo_model->connection($connect_nickname,$connect_pass);
			
			$this->session->set_userdata('connect_nickname', $connect_nickname);
			$this->session->set_userdata('connect_pass', $connect_pass);
			$this->session->set_userdata('connect_email', $connect_email['email']);
			
			$data['content'] = 'display_user_info';
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
			
			$connect_nickname = $create_nickname;
			$connect_pass = $create_pass;
			$connect_email = $create_email;
			
			$this->session->set_userdata('connect_nickname', $connect_nickname);
			$this->session->set_userdata('connect_pass', $connect_pass);
			$this->session->set_userdata('connect_email', $connect_email);
			
			$data['content'] = 'display_user_info';
		}

		$data['user'] = $this->todo_model->get_user();


		$this->load->vars($data);
		$this->load->view('template');

	}
	
	private function session_user()
	{
		if(!$this->session->userdata('connet_nickname'))
		{
			$data['content'] = 'home';
		}
	}

	/*public function logout()
	{
			echo 'je suis là';
			$logout 		 = $this->input->post('logout');

			$this->session->sess_destroy();
			$data['content'] = 'home';
		
		
	}*/
}
?>


