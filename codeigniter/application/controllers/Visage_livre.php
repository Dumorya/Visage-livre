<?php
class Visage_livre extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->model('visage_livre_model');
		$this->load->helper('url');
        $this->load->library('session');
    }

	public function index()
    {
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('session');
        //$data['content'] = 'page_connection';
		//
        $data['content'] = 'page_connection';

		$this->load->vars($data);
		$this->load->view('template');
	}

	public function connect()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('session');

        $data['title']   ='Créer un compte';
        $data['content'] = 'page_connection';
		
		//Récupérer les données saisies envoyées en POST
		$this->form_validation->set_rules('connect_nickname' , 'Identifiant' , 'required');
		$this->form_validation->set_rules('connect_pass' , 'Mot de passe' , 'required');

        if($this->form_validation->run() !== false)
        {
            $connect_nickname = $this->input->post('connect_nickname');
            $connect_pass 	  = $this->input->post('connect_pass');
            $connect_email 	  = $this->visage_livre_model->get_email($connect_nickname);
            $result 		  = $this->visage_livre_model->connection($connect_nickname,$connect_pass);

            if(count($result) === 0)
            {
                $data['content'] = 'page_connection';
            }
            else
            {
                $this->session->set_userdata('connect_nickname', $connect_nickname);
                $this->session->set_userdata('connect_pass', $connect_pass);
                $this->session->set_userdata('connect_email', $connect_email[0]->email);

                $data['content'] = 'page_home';
            }
        }

		$this->load->vars($data);
		$this->load->view('template');
	}

	public function create_account()
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

		// Création d'un compte
        $this->form_validation->set_rules('create_nickname' , 'Identifiant' , 'required');
        $this->form_validation->set_rules('create_pass' , 'Mot de passe' , 'required');
        $this->form_validation->set_rules('create_email' , 'Adresse mail' , 'required');

        if ($this->form_validation->run() !== FALSE)
        {
            $create_nickname 		 = $this->input->post('create_nickname');
            $create_pass 	  		 = $this->input->post('create_pass');
            $create_email 	  		 = $this->input->post('create_email');
            $this->visage_livre_model->create_user($create_nickname,$create_pass,$create_email);

            $connect_nickname = $create_nickname;
            $connect_pass     = $create_pass;
            $connect_email    = $create_email;

            $this->session->set_userdata('connect_nickname', $connect_nickname);
            $this->session->set_userdata('connect_pass', $connect_pass);
            $this->session->set_userdata('connect_email', $connect_email);

            $data['content'] = 'page_home';
        }
		
		$this->load->vars($data);
		$this->load->view('template');
	}

	public function display_user_info()
	{
		$data['content'] = 'display_user_info';

        $this->load->vars($data);
        $this->load->view('template');
	}
	

    public function session_user()
    {
        if(!$this->session->userdata('connect_nickname'))
        {
            $data['content'] = 'page_home';
        }
    }

    public function logout()
    {
        $this->load->library('session');

		$this->session->sess_destroy();
        // ?? mettre le nom du user connecté a vide

        //$data['content'] = 'page_connection';

        $this->load->vars($data);
        $this->load->view('template');
    }

	//afficher les posts et les commentaires


	//creer un post
	public function create_post()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules ('content' , 'content' , 'required');

		if ($this->form_validation->run()!== FALSE )
		{
			$content = $this->input->post('content');
			$this->visage_livre_model->visage_livre_add_document($content);
			$this->visage_livre_model->visage_livre_add_post();
			$data['content'] = 'page_home';
		}
        //$data['user'] = $this->visage_livre_model->get_user_connected();

		$this->load->vars($data);
		$this->load->view('template');
	}

	//creer un comment
	public function create_comment($iddoc)
    {
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules ('content' , 'content' , 'required');
		if ($this->form_validation->run()!== FALSE )
		{
			$content = $this->input->post('content');
			
			$this->visage_livre_model->visage_livre_add_document($content);
			$this->visage_livre_model->visage_livre_add_comment($iddoc);
			$data['content'] = 'page_home';
		}
		$this->load->vars($data);
		$this->load->view('template');
	}

	//friend request
	
	public function send_friend_request($nickname,$target)
    {
		$this->visage_livre_model->visage_livre_send_friend_request($nickname,$target);
	}
	
	public function accept_friend_request($nickname,$target)
    {
		$this->visage_livre_model->visage_livre_accept_friend_request($nickname,$target);
		$this->visage_livre_model->visage_livre_delete_friend_request($nickname,$target);
	}
	
	public function refuse_friend_request($nickname,$target)
    {
		$this->visage_livre_model->visage_livre_delete_friend_request($nickname,$target);
	}

	public function delete_friend($nickname,$target)
    {
		$this->visage_livre_model->visage_livre_delete_friend($nickname,$target);
	}
}
?>


