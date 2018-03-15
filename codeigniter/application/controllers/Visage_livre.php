<?php
class Visage_livre extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('visage_livre_model');
		$this->load->helper('url');
	}
	public function index(){
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
            $connect_email 	  = $this->visage_livre_model->get_email($connect_nickname);
            $result 		  = $this->visage_livre_model->connection($connect_nickname,$connect_pass);

            $this->session->set_userdata('connect_nickname', $connect_nickname);
            $this->session->set_userdata('connect_pass', $connect_pass);
            $this->session->set_userdata('connect_email', serialize($connect_email[0]));

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
            $this->visage_livre_model->create_user($create_nickname,$create_pass,$create_email);

            $connect_nickname = $create_nickname;
            $connect_pass = $create_pass;
            $connect_email = $create_email;

            $this->session->set_userdata('connect_nickname', $connect_nickname);
            $this->session->set_userdata('connect_pass', $connect_pass);
            $this->session->set_userdata('connect_email', $connect_email);

            $data['content'] = 'display_user_info';
        }

        $data['user'] = $this->visage_livre_model->get_user();

		//creer un post
//		$this->form_validation->set_rules ('content' , 'content' , 'required');
//		$this->form_validation->set_rules ('auteur' , 'auteur' , 'required');
//
//		if ($this->form_validation->run()!== FALSE ) {
//			$contentP = $this->input->post('content');
//			$auteur = $this->input->post('auteur');
//			$this->visage_livre_model->visage_livre_add_document($contentP,$auteur);
//			$this->visage_livre_model->visage_livre_add_post();
//		}

		//creer un comment
		/*
		$this->form_validation->set_rules ('content' , 'content' , 'required');
		$this->form_validation->set_rules ('auteur' , 'auteur' , 'required');
		$this->form_validation->set_rules('ref','ref','required');
		
		if ($this->form_validation->run()!== FALSE ) {
			$contentC = $this->input->post('content');
			$auteur = $this->input->post('auteur');
			$ref = $this->input->post('ref');
			$this->visage_livre_model->visage_livre_add_document($contentC,$auteur);
			$this->visage_livre_model->visage_livre_add_comment($ref);
		}
		*/
		
//		$name='titi';
//		$data['postlist']=$this->visage_livre_model->visage_livre_get_post();

		$this->load->vars($data);
		$this->load->view('template');

	}

    private function session_user()
    {
        if(!$this->session->userdata('connect_nickname'))
        {
            $data['content'] = 'home';
        }
    }

    public function logout()
    {
            echo 'je suis là';
            $logout 		 = $this->input->post('logout');

            $this->session->sess_destroy();
            $data['content'] = 'home';


    }
	
	public function delete_post($iddoc){
		$this->visage_livre_model->visage_livre_delete_post($iddoc);
		$this->index();
	}
	public function delete_comment($iddoc){
		$this->visage_livre_model->visage_livre_delete_comment($iddoc);
		$this->index();
	}
	
	//friend request
	
	public function send_friend_request($nickame,$target){
		$this->visage_livre_model->visage_livre_send_friend_request($target);
		$this->index();
	}
}
?>


