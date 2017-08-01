<?php
if (!defined('BASEPATH'))exit('No direct script access allowed');class Publicacoes extends CI_Model {var $table = "publicacao";
public function getPublicacao($table, $id, $value){
		$data = $this ->db->query("select * from $table where $id like '%$value%'");		return $data;
}
public function getTodasPublicacoes($table){
	$data = $this->db->get($table);
	return $data;
}
public function mostrar_todos_inicio($limit = null, $offset= null) {	$this->db->select('p.endereco,p.curr_time,p.id,p.usuario_nome,p.titulo,p.foto,p.texto,						c.nomeCidade as cidade, e.nomeEstado as estado,ca.nome as categoria');	$this->db->from('publicacao as p');	$this->db->join('cidade as c', 'c.idCidade = p.cidade');	$this->db->join('estado as e', 'e.idEstado = p.estado');	$this->db->join('categoria as ca', 'ca.id = p.categoria');	$this->db->order_by('curr_time','desc');	if($limit)	    $this->db->limit($limit, $offset);	$query = $this->db->get();	if ($query->num_rows() > 0){		return $query->result();	} else{		return false;	}
}
public function mostrar_todos_inicio_categoria($limit = null, $offset= null, $categorie = 1) {	$this->db->select('p.endereco,p.curr_time,p.id,p.usuario_nome,p.titulo,p.foto,p.texto,						c.nomeCidade as cidade, e.nomeEstado as estado,ca.nome as categoria');	$this->db->from('publicacao as p');	$this->db->join('cidade as c', 'c.idCidade = p.cidade');	$this->db->join('estado as e', 'e.idEstado = p.estado');	$this->db->join('categoria as ca', 'ca.id = p.categoria');	$this->db->where('p.categoria', $categorie);	$this->db->order_by('id','desc');	if($limit)	    $this->db->limit($limit, $offset);	$query = $this->db->get();	if ($query->num_rows() > 0){		return $query->result();	} else{		return false;	}}
public function get_publicacao($publicacao_id){	$this->db->select('p.endereco,p.curr_time,p.id,p.usuario_nome,p.titulo,p.foto,p.texto,					c.nomeCidade as cidade, e.nomeEstado as estado,ca.nome as categoria');	$this->db->from('publicacao as p');	$this->db->join('cidade as c', 'c.idCidade = p.cidade');	$this->db->join('estado as e', 'e.idEstado = p.estado');	$this->db->join('categoria as ca', 'ca.id = p.categoria');	$this->db->where(array('p.id'=>$publicacao_id));	$this->db->order_by('curr_time','desc');	$query = $this->db->get();	return $query->row();}
public function get_usuario_publicacao($usuario_nome = ''){	$this->db->select('p.endereco,p.curr_time,p.id,p.usuario_nome,p.titulo,p.foto,p.texto,						c.nomeCidade as cidade, e.nomeEstado as estado,ca.nome as categoria');	$this->db->from('publicacao as p');	$this->db->join('cidade as c', 'c.idCidade = p.cidade');	$this->db->join('estado as e', 'e.idEstado = p.estado');	$this->db->join('categoria as ca', 'ca.id = p.categoria');	$this->db->where(array('usuario_nome'=>$usuario_nome));	$this->db->order_by('curr_time','desc');	$query = $this->db->get();	if ($query->num_rows() > 0) {		  return $query->result();		}	else{		return false;	}}
public function getPublicacaoByID($id = NULL){ if ($id != NULL):	$this->db->select('p.endereco,p.curr_time,p.id,p.usuario_nome,p.titulo,p.foto,p.texto,						c.nomeCidade as cidade, e.nomeEstado as estado, e.idEstado as idestado, c.idCidade as idcidade,ca.nome as categoria, ca.id as categoriaid');	$this->db->from('publicacao as p');	$this->db->join('cidade as c', 'c.idCidade = p.cidade');	$this->db->join('estado as e', 'e.idEstado = p.estado');	$this->db->join('categoria as ca', 'ca.id = p.categoria');	$this->db->where('p.id',$id);	$this->db->limit(1);	$query = $this->db->get("publicacao");	return $query->row();endif;}
public function editarPublicacao($data, $id){    if ($data != NULL && $id != NULL):        $this->db->update('publicacao', $data, array('id'=>$id));    endif;	redirect(base_url().'painel',$data);}
public function delete_usuario_publicacao($post_id){		$this->db->where('id', $post_id);		$this->db->delete('publicacao');	}
public function criar_publicacao($data){		$this->db->insert('publicacao', $data);	}
public function pegar_estado_query_editar($id){		$this->db->select('*');		$this->db->from('estado');		$this->db->where('idEstado !=', $id);		return $this->db->get()->result();	}
public function pegar_estado_query(){		$query = $this->db->get('estado');		return $query->result();	}
public function pegar_categoria_query(){		$query = $this->db->get('categoria');		return $query->result();	}
public function pegar_cidades_query($idEstado){		$query = $this->db->get_where('cidade', array('idEstado' => $idEstado));		return $query->result();	}
public function pegar_categoria_query_editar($id){		$this->db->select('*');		$this->db->from('categoria');		$this->db->where('id !=', $id);		return $this->db->get()->result();	}
public function pegar_cidades_query_editar($idCidade, $idEstado){		$query = $this->db->get_where('cidade', array('idEstado' => $idEstado, 'idCidade !=' => $idCidade));		return $query->result();	}
public function search($keyword){		$this->db->select('*');		$this->db->from('publicacao');		$this->db->like('titulo', $keyword);		$res = $this->db->get()->result();		return $res;  }
public function search_user($keyword){		$this->db->select('*');		$this->db->from('publicacao');		$this->db->like('titulo', $keyword);		$this->db->where('usuario_nome', $this->session->usuario_nome);		$res = $this->db->get()->result();		return $res;  }
public function CountAll(){    return $this->db->count_all($this->table);}
public function CountByCategory($categoria){	$this->db->where('categoria', $categoria);	$this->db->from($this->table);  return $this->db->count_all_results();}
public function CountByUsuario($usuario_nome){	$this->db->where('tbl_usuario', $usuario_nome);	$this->db->from($this->table);  return $this->db->count_all_results();}
}