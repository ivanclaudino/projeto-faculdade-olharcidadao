<?php
class Usuario extends CI_Model{	
		$this->db->insert('tbl_usuario', $data);
	}
	function seUsuarioNomeExiste($nome){
		return $query->num_rows();
	}
	function seEmailExiste($email){
		return $query->num_rows();
	}
	function atualizar_usuario($usuario_nome, $data){
		$this->db->where('usuario_nome', $usuario_nome);
		$this->db->update('tbl_usuario', $data);
	}
	function get_password($usuario_nome){
		return $query->first_row('array');
}