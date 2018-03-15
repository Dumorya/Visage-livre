<?php
class Visage_livre_model extends CI_Model{
	public function __construct()
	{
		$this->load->database();
	}
	public function visage_livre_get_post(){
		$this->db->select('_document.content, _document.iddoc');
		$this->db->from('_document');
		$this->db->join('_post','_document.iddoc=_post.iddoc','inner join');
		$query=$this->db->get();
		return $query->result_array();
	}
	//Afficher tous les commentaires
	public function visage_livre_get_comment(){
		$this->db->select('_document.content, _document.iddoc');
		$this->db->from('_document');
		$this->db->join('_comment','_document.iddoc=_comment.iddoc','inner join');
		$answer=$this->db->get();
		return $answer->result_array();
	}
	//afficher les commentaires pour un post en particulier
	public function visage_livre_get_comment2($iddoc){
		$this->db->select('_document.content, _document.iddoc');
		$this->db->from('_document');
		$this->db->join('_comment','_document.iddoc=_comment.iddoc','inner join');
		$this->db->where('ref',$ref);
		$answer=$this->db->get();
		return $answer->result_array();
	}
	//afficher les posts et les commentaires
	public function visage_livre_get_post_comment(){
		$this->db->select('_document.content, _document.iddoc');
		$this->db->from('_document');
		$answer=$this->db->get();
		return $answer->result_array();
	}
	//afficher les posts des amis du user en param
	public function visage_livre_get_post_friend($name){
		$this->db->select('_document.auteur,_document.content,_document.iddoc');
		$this->db->from('_document');
		$this->db->join('_user','_document.auteur=_user.nickname','inner join');
		$this->db->join('_friendof','_user.nickname = _friendof.nickname or _user.nickname = _friendof.friend','inner join');
		$this->db->join('_post','_document.iddoc = _post.iddoc','inner join');
		$this->db->where("(_friendof.nickname = '$name' or _friendof.friend = '$name') and _document.auteur != '$name'");
		$answer=$this->db->get();
		return $answer->result_array();
		
	}
	//ajouter un document (post ou comment)
	public function visage_livre_add_document($content, $auteur){
		$data = array(
			'content' => $content,
			'auteur' => $auteur
		);
		return $this->db->insert('_document',$data);
	}
	//ajouter un post
	public function visage_livre_add_post(){
		$this->db->select('max(_document.iddoc)');
		$this->db->from('_document');
		$query=$this->db->get();
		$iddocs=$query->result_array();
		foreach($iddocs as $iddoc){
			$id=$iddoc['max'];
		}
		$data = array(
			'iddoc' => $id
		);
		
		return $this->db->insert('_post',$data);
	}
	//ajouter un comment, un param le iddoc du post concerné
	public function visage_livre_add_comment($ref){
		$this->db->select('max(_document.iddoc)');
		$this->db->from('_document');
		$query=$this->db->get();
		$iddocs=$query->result_array();
		foreach($iddocs as $iddoc){
			$id=$iddoc['max'];
		}
		$data = array(
			'iddoc' => $id,
			'ref' => $ref
		);
		return $this->db->insert('_comment',$data);
	}
	//supprimer un post
	public function visage_livre_delete_post($iddoc) {
		$data = array('iddoc'=>$iddoc);
		$this->db->delete('_post',$data);
		$this->db->delete('_document',$data);
	}
	//supprimer un comment
	public function visage_livre_delete_comment($iddoc) {
		$data = array('iddoc'=>$iddoc);
		$this->db->delete('_comment',$data);
		$this->db->delete('_document',$data);
	}
	
	//friend request
	//envoyer une invitation d'ami, cible en param
	public function visage_livre_send_friend_request($nickname,$target){
		$data = array(
			'nickname' => $nickname,
			'target' => $target
		);
		return $this->db->insert('_friendrequest',$data);
	}
	
	
}
?>
