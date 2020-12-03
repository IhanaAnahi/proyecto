<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model{
	
	public function listarusuario(){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado', 1);
		return $this->db->get();
	}

	public function recuperarusuario($id){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idUsuario',$id);
		return $this->db->get();
	}
	public function modificarusuario($id, $data){
		$this->db->where('idusuario', $id);
		$this->db->update('usuario', $data);
	}
	public function agregarusuario($data){
		$this->db->insert('usuario', $data);
	}
	public function eliminarusuario($id, $data){
		$this->db->where('idusuario', $id);
		$this->db->update('usuario', $data);
	}
}