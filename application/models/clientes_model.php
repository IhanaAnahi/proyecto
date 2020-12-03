<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_model extends CI_Model {

	public function listarclientes(){
		$this->db->select('*');
		$this->db->from("cliente");
		$this->db->where('estado',1);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function recuperarcliente($id){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('idcliente',$id);
		return $this->db->get();
	}
	public function save($data){
		return $this->db->insert("cliente",$data);
	}
	public function modificarcliente($id,$data){
		$this->db->where('idcliente',$id);
		$this->db->update('cliente',$data);
	}
	public function agregarcliente($data)
	{
		$this->db->insert('cliente',$data);
	}
	public function eliminarcliente($id, $data){
		$this->db->where('idcliente', $id);
		$this->db->update('cliente', $data);
	}
}