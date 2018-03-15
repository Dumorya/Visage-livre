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

		$data['title']='Liste des post';
		$data['content']='main';

		//creer un post
		$this->form_validation->set_rules ('content' , 'content' , 'required');
		$this->form_validation->set_rules ('auteur' , 'auteur' , 'required');

		if ($this->form_validation->run()!== FALSE ) {
			$contentP = $this->input->post('content');
			$auteur = $this->input->post('auteur');
			$this->visage_livre_model->visage_livre_add_document($contentP,$auteur);
			$this->visage_livre_model->visage_livre_add_post();
		}

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
		
		$name='titi';
		$data['postlist']=$this->visage_livre_model->visage_livre_get_post();

		$this->load->vars($data);
		$this->load->view('template');

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


