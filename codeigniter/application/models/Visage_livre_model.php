<?php
class Visage_livre_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_user_connected()
	{
        $this->load->library('session');

        return $this->session->userdata('connect_nickname');
	}

    public function create_user($nickname, $pass, $email)
    {
        $data = array(
            'nickname' => $nickname,
            'pass' 	   => $pass,
            'email'    => $email
        );
        return $this->db->insert('_user',$data);
    }

    public function delete_user($nickname)
    {
        $this->db->where('nickname', $nickname);
        $this->db->delete('_user');
	}

    public function connection($connect_nickname,$connect_pass)
    {
        $this->db->select('nickname,pass');
        $this->db->from('_user');
        $this->db->where('nickname', $connect_nickname);
        $this->db->where('pass', $connect_pass);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_email($connect_nickname)
    {
        return $this->db->select('email')
            ->from('_user')
            ->where('nickname', $connect_nickname)
            ->get()
            ->result();
    }

	public function visage_livre_get_post()
	{
		$this->db->select('_document.content, _document.iddoc');
		$this->db->from('_document');
		$this->db->join('_post','_document.iddoc=_post.iddoc','inner join');
		$query=$this->db->get();

		return $query->result_array();
	}

	//Afficher tous les commentaires
	public function visage_livre_get_comment()
	{
		$this->db->select('_document.auteur,_document.content,_document.iddoc,_document.create_date');
		$this->db->from('_document');
		$this->db->join('_comment','_document.iddoc=_comment.iddoc','inner join');
		$answer=$this->db->get();

		return $answer->result_array();
	}

	//afficher les commentaires pour un post en particulier
	public function visage_livre_get_comment2($iddoc)
	{
		$nb = 30; //nombre de caractères a partir desquels on coupe l'affichage
		$this->db->select("_document.content,to_char(_document.create_date, 'dd/mm/yy HH24:MI') as create_date,_document.auteur,_document.iddoc");
		$this->db->from('_document');
		$this->db->join('_comment','_document.iddoc=_comment.iddoc','inner join');
		$this->db->where('ref',$iddoc);
		$answer=$this->db->get();

		return $answer->result_array();	
	}
	//récupérer les commentaires à l'infini //ne fonctionne pas a l'infini
	public function visage_livre_get_list_comment($iddoc)
	{
		$this->db->select('ref');
		$this->db->from("_commentaire(".$iddoc.") f");
		$this->db->join('_document', '_document.iddoc = f.ref', 'inner join');
		$answer = $this->db->get();

		return $answer->result_array();
	}


	//afficher les posts et les commentaires
	public function visage_livre_get_post_comment()
	{
		$this->db->select('_document.content, _document.iddoc');
		$this->db->from('_document');
		$answer=$this->db->get();

		return $answer->result_array();
	}

	//afficher les posts des amis du user en param
	public function visage_livre_get_post_friend()
	{
		$name = $this->get_user_connected();
		$this->db->select("_document.auteur,_document.content,_document.iddoc,_document.create_date");
		$this->db->from('_document');
		$this->db->join('_user','_document.auteur=_user.nickname','inner join');
		$this->db->join('_friendof','_user.nickname = _friendof.nickname or _user.nickname = _friendof.friend','inner join');
		$this->db->join('_post','_document.iddoc = _post.iddoc','inner join');
		$this->db->where("(_friendof.nickname = '$name' or _friendof.friend = '$name') and _document.auteur != '$name'");
		$this->db->order_by('_document.create_date desc');
		$answer=$this->db->get();

		return $answer->result_array();
		
	}
	//afficher les posts du user connecté
	public function visage_livre_get_post_connected_user()
	{
		$name = $this->get_user_connected();
		$this->db->select("_document.auteur,_document.content,_document.iddoc,_document.create_date");
		$this->db->from('_document');
		$this->db->join('_post','_document.iddoc = _post.iddoc','inner join');
		$this->db->where("_document.auteur = '$name'");
		$this->db->order_by('_document.create_date desc');
		$answer=$this->db->get();

		return $answer->result_array();
		
	}
	//afficher les posts des amis du user en param avec le bon format
	public function visage_livre_get_post_friend_format()
	{
		$nb = 30; //nombre de caractères a partir desquels on coupe l'affichage
		$name = $this->get_user_connected();
		$this->db->select("case when length(_document.content)>$nb then substring(_document.content from 1 for $nb)||'...' else substring(_document.content from 1 for 30) end as content
							,to_char(_document.create_date, 'dd/mm/yy HH24:MI') as create_date,_document.auteur,_document.iddoc");
		$this->db->from('_document');
		$this->db->join('_user','_document.auteur=_user.nickname','inner join');
		$this->db->join('_friendof','_user.nickname = _friendof.nickname or _user.nickname = _friendof.friend','inner join');
		$this->db->join('_post','_document.iddoc = _post.iddoc','inner join');
		$this->db->where("(_friendof.nickname = '$name' or _friendof.friend = '$name') and _document.auteur != '$name'");
		$this->db->order_by('_document.create_date desc');
		$answer=$this->db->get();

		return $answer->result_array();
		
	}
//liste finale (posts du user connecté et ses amis)
	public function visage_livre_get_post_format()
	{
		$nb = 30; //nombre de caractères a partir desquels on coupe l'affichage
		$name = $this->get_user_connected();
		$cont = ' ...';
		$sql = "
		select case when length(_document.content)>? then substring(_document.content from 1 for ?)||? else substring(_document.content from 1 for 30) end as content,to_char(_document.create_date, 'dd/mm/yy HH24:MI') as create_date,_document.auteur,_document.iddoc
		from visagelivre._document
		inner join visagelivre._post on _post.iddoc=_document.iddoc
		inner join visagelivre._friendof on _document.auteur = _friendof.nickname or _document.auteur = _friendof.friend
		where (_friendof.nickname = ? or _friendof.friend = ?) and _document.auteur != ?
		union
		select case when length(_document.content)>? then substring(_document.content from 1 for ?)||? else substring(_document.content from 1 for 30) end as content,to_char(_document.create_date, 'dd/mm/yy HH24:MI') as create_date,_document.auteur,_document.iddoc
		from visagelivre._document
		inner join visagelivre._post on _post.iddoc=_document.iddoc
		where visagelivre._document.auteur = ?
		order by create_date desc";
		
		$result=$this->db->query($sql,array($nb,$nb,$cont,$name,$name,$name,$nb,$nb,$cont,$name))->result_array();
		return $result;
		
	}
	//afficher la liste des posts publiés par le user connecté
    public function visage_livre_get_user_post()
    {
        $nb = 30; //nombre de caractères a partir desquels on coupe l'affichage
        $name = $this->get_user_connected();
        $this->db->select("case when length(_document.content)>$nb then substring(_document.content from 1 for $nb)||'...' else substring(_document.content from 1 for 30) end as content
							,to_char(_document.create_date, 'dd/mm/yy HH24:MI') as create_date,_document.auteur,_document.iddoc");
        $this->db->from('_document');
        $this->db->join('_post','_post.iddoc=_document.iddoc','inner join');
        $this->db->where("_document.auteur = '$name'");
        $this->db->order_by('_document.create_date desc');
        $query = $this->db->get();
		return $query->result_array();
    }

    public function visage_livre_get_full_user_post($iddoc)
    {
		$this->db->select("_document.content as content,to_char(_document.create_date, 'dd/mm/yy HH24:MI') as create_date,_document.auteur,_document.iddoc");
        $this->db->from('_document');
        $this->db->join('_user','_document.auteur=_user.nickname','left join');
        $this->db->where('_document.iddoc', $iddoc);
        $this->db->order_by('_document.create_date desc');
        $query=$this->db->get();

        return $query->result_array();
    }

	//afficher la liste des amis d'un user
	public function visage_livre_get_user_friend()
	{
		$name = $this->get_user_connected();
		$this->db->distinct();
		$this->db->select('_user.nickname');
		$this->db->from('_user');
		$this->db->join('_friendof','_friendof.nickname = _user.nickname or _friendof.friend = _user.nickname','inner join');
		$this->db->where("(_friendof.nickname = '$name' or _friendof.friend = '$name') and _user.nickname != '$name'");
		$query=$this->db->get();
		
		return $query->result_array();
	}

	//afficher la liste des utilisateurs pas amis avec le user connecte
	public function visage_livre_get_user_notfriend(){
		$name = $this->get_user_connected();
		$sql = "select use.nickname from visagelivre._user use
			where use.nickname != ?
			except
			select distinct use.nickname
			from visagelivre._user use inner join visagelivre._friendof fri
			on use.nickname = fri.nickname or use.nickname = fri.friend
			where (fri.nickname = ? or fri.friend = ?)
			and use.nickname != ?
			except
			select distinct fri.target
			from visagelivre._friendrequest fri
			where fri.nickname = ?
			";
		$query=$this->db->query($sql,array($name,$name,$name,$name,$name));
		$result=$query->result_array();
		return $result;
	}

	//afficher la liste des utilisateurs sauf le connecté
	public function visage_livre_get_notconnected_user()
	{
		$name = $this->session->userdata('connect_nickname');
		$this->db->select('_user.nickname,_user.pass,_user.email');
		$this->db->from('_user');
        $this->db->where('nickname', $this->visage_livre_model->get_user_connected());

        $query=$this->db->get();

		return $query->result_array();
	}

	//affiche les demandes d'amitié reçues par nickname
	public function visage_livre_get_friend_request($nickname)
	{
		$this->db->select('_friendrequest.nickname');
		$this->db->from('_friendrequest');
		$this->db->where('_friendrequest.target',$nickname);
		$query=$this->db->get();

		return $query->result_array();
	}
	
	//ajouter un document (post ou comment)
	public function visage_livre_add_document($content)
	{
		$data = array
		(
			'content' => $content,
			'auteur' => $this->get_user_connected()
		);
		
		return $this->db->insert('_document',$data);
	}

	//ajouter un post
	public function visage_livre_add_post()
	{
		$this->db->select('max(_document.iddoc)');
		$this->db->from('_document');
		$query=$this->db->get();
		$iddocs=$query->result_array();

		foreach($iddocs as $iddoc)
		{
			$id=$iddoc['max'];
		}
		$data = array
		(
			'iddoc' => $id
		);
		
		return $this->db->insert('_post',$data);
	}

	//ajouter un comment, en param le iddoc du post concerné
	public function visage_livre_add_comment($ref)
	{
		$this->db->select('max(_document.iddoc)');
		$this->db->from('_document');
		$query=$this->db->get();
		$iddocs=$query->result_array();

		foreach($iddocs as $iddoc)
		{
			$id = $iddoc['max'];

            $data = array
            (
                'iddoc' => $id,
                'ref' => $ref
            );
		}


		return $this->db->insert('_comment',$data);
	}

	//supprimer un post
	public function visage_livre_delete_post($iddoc)
	{
			$data = array('iddoc'=>$iddoc);
			$this->db->delete('_post',$data);
			$this->db->delete('_document',$data);
	}

	//supprimer un comment
	public function visage_livre_delete_comment($iddoc)
	{	
			$data = array('iddoc'=>$iddoc);
			$this->db->delete('_comment',$data);
			$this->db->delete('_document',$data);
	}
	/*$sql = "select use.nickname from visagelivre._user use
			where use.nickname != ?
			except
			select distinct use.nickname
			from visagelivre._user use inner join visagelivre._friendof fri
			on use.nickname = fri.nickname or use.nickname = fri.friend
			where (fri.nickname = ? or fri.friend = ?)
			and use.nickname != ?";
		$query=$this->db->query($sql,array($name,$name,$name,$name));
		$result=$query->result_array();*/
	
	//friend request
	//envoyer une invitation d'ami, cible en param
	public function visage_livre_send_friend_request($nickname,$target)
	{
		//remplace le %20 qui est un espace transformé lors du passage dans l'url
		//mais doit être retransformé pour correspondre avec la base avant l'envoi
        $nickname = str_replace('%20', ' ', $nickname);
        $target   = str_replace('%20', ' ', $target);
		
		$sql = "select visagelivre._friendrequest.nickname from visagelivre._friendrequest 
				where visagelivre._friendrequest.nickname = ? and visagelivre._friendrequest.target = ?";
		$query=$this->db->query($sql,array($target, $nickname))->result_array();
		
		if (sizeOf($query)==0){
			$data = array(
				'nickname' => $nickname,
				'target'   => $target
			);
			return $this->db->insert('_friendrequest',$data);
		}else{
			$this->visage_livre_accept_friend_request($target, $nickname);
			$this->visage_livre_delete_friend_request($target, $nickname);
			
		}

		
	}

	public function visage_livre_delete_friend_request($nickname,$target)
	{
        //remplace le %20 qui est un espace transformé lors du passage dans l'url
        //mais doit être retransformé pour correspondre avec la base avant l'envoi
        $nickname = str_replace('%20', ' ', $nickname);
        $target   = str_replace('%20', ' ', $target);

		$data = array(
			'nickname' => $nickname,
			'target'   => $target
		);

		return $this->db->delete('_friendrequest',$data);
	}

	public function visage_livre_accept_friend_request($nickname,$target)
	{
        //remplace le %20 qui est un espace transformé lors du passage dans l'url
        //mais doit être retransformé pour correspondre avec la base avant l'envoi
        $nickname = str_replace('%20', ' ', $nickname);
        $target   = str_replace('%20', ' ', $target);

		$data = array
		(
			'nickname' => $nickname,
			'friend' => $target
		);

		$this->db->insert('_friendof',$data);
    }

	public function visage_livre_delete_friend($nickname,$target)
	{
		$data = array(
			'nickname' => $nickname,
			'friend' => $target
		);

		$data2 = array(
			'nickname' => $target,
			'friend' => $nickname
		);

		$this->db->delete('_friendof',$data);
		$this->db->delete('_friendof',$data2);
	}

	public function visage_livre_display_request()
	{
        $this->db->select("nickname, target, to_char(request_date, 'dd/mm/yy HH24:MI') as request_date");
        $this->db->from('_friendrequest');
        $this->db->where('target', $this->visage_livre_model->get_user_connected());
        $query = $this->db->get();

        return $query->result_array();
	}

    public function visage_livre_display_request_sent($nickname)
    {
        $this->db->select();
        $this->db->from('_friendrequest');
        $this->db->where('nickname', $this->visage_livre_model->get_user_connected());
        $query = $this->db->get();
		

        return $query->result_array();
    }
	
}
?>
