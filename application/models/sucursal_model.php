<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal_model extends CI_Model {

	public function getproducto($id){
		$this->db->select('*');
		$this->db->from('sucursal');
		$this->db->where('idsucursal',$id);
		return $this->db->get();
	}
	public function edit($id,$data){
		$this->db->where('idsucursal',$id);
		$this->db->update('sucursal',$data);
	}
}