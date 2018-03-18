<?php
class Visage_livre extends CI_Controller {
	public function __construct(){

		parent::__construct();
		$this->load->model('visage_livre_model');
		$this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
	public function index(){
		$this->load->helper('form');
		$this->load->library('form_validation');
        $this->load->library('session');


        $data['title']='Créer un compte';
        $data['content'] = 'page_connection';

		//connexion
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

            $data['content'] = 'page_home';
        }

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
            $connect_pass = $create_pass;
            $connect_email = $create_email;

            $this->session->set_userdata('connect_nickname', $connect_nickname);
            $this->session->set_userdata('connect_pass', $connect_pass);
            $this->session->set_userdata('connect_email', $connect_email);

            $data['content'] = 'page_home';
        }

		$data['postlist'] = $this->visage_livre_model->visage_livre_get_post_friend_format();
		$data['userlist'] = $this->visage_livre_model->visage_livre_get_user();
		//les utilisateurs -1
		$data['otheruser'] = $this->visage_livre_model->visage_livre_get_notconnected_user();
		$data['user'] = $this->visage_livre_model->get_user_connected();
		
		
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
        $this->load->library('session');

		$this->session->sess_destroy();
        // ?? mettre le nom du user connecté a vide
        $this->session->set_userdata(' ');

        $data['content'] = 'page_connection';
    }

	//afficher les posts et les commentaires
	public function get_list_comment($iddoc){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules ('iddoc' , 'iddoc' , 'required');
		if ($this->form_validation->run()!== FALSE ) {
			$iddoc = $this->input->post('iddoc');
			$data['commentlist'] = $this->visage_livre_model->visage_livre_get_list_comment($iddoc);
			
			$this->load->view('comment_list',$data);
		}
		$this->load->view('post_list',$data);
		$this->index();	
	}

	//creer un post
	public function create_post(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules ('content' , 'content' , 'required');

		if ($this->form_validation->run()!== FALSE ) {
			$content = $this->input->post('content');
			$this->visage_livre_model->visage_livre_add_document($content);
			$this->visage_livre_model->visage_livre_add_post();
		}
		$this->index();
	}
	//creer un comment
	public function create_comment(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules ('content' , 'content' , 'required');
		if ($this->form_validation->run()!== FALSE ) {
			$content = $this->input->post('content');
			$this->visage_livre_model->visage_livre_add_document($content);
			$this->visage_livre_model->visage_livre_add_comment($iddoc);
		}
		$this->index();
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
	
	public function send_friend_request($nickname,$target){
		$this->visage_livre_model->visage_livre_send_friend_request($nickname,$target);
		$this->index();
	}
	
	public function accept_friend_request($nickname,$target){
		$this->visage_livre_model->visage_livre_accept_friend_request($nickname,$target);
		$this->visage_livre_model->visage_livre_delete_friend_request($nickname,$target);
		$this->index();
	}
	
	public function refuse_friend_request($nickname,$target){
		$this->visage_livre_model->visage_livre_delete_friend_request($nickname,$target);
		$this->index();
	}
	public function delete_friend($nickname,$target){
		$this->visage_livre_model->visage_livre_delete_friend($nickname,$target);
		$this->index();
	}
}
?>


