<?php
class Staticpages extends CI_Controller {
	public function display($content = 'home') { // note the default value
		if (!file_exists('application/views/'.$content.'.php')){
			show_404() ;
		}
		$data['content']= $content;
		$this->load->vars($data); 
		$this->load->view('template');
	}
	public function index(){
		$this->display('home');
	}
}
?>

