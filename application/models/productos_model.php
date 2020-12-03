<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos_model extends CI_Model {

	public function listarproductos(){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('estado',1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function recuperarproducto($id){
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('idproducto',$id);
		return $this->db->get();
	}
	public function save($data){
		return $this->db->insert("producto",$data);
	}
	public function modificarproducto($id,$data){
		$this->db->where('idproducto',$id);
		$this->db->update('producto',$data);
	}
	public function agregarproducto($data)
	{
		$this->db->insert('producto',$data);
	}
	public function eliminarproducto($id, $data){
		$this->db->where('idproducto', $id);
		$this->db->update('producto', $data);
	}
}