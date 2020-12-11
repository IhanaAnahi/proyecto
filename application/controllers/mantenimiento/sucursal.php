<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("sucursal_model");
	}
	public function index()
	{
		$data['sucursal'] = $this->sucursal_model->getproducto(1);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/sucursal/edit",$data);
		$this->load->view("layouts/footer");
	}
	public function update(){
		$id = $_POST['id'];
		$data['nombre'] = $_POST['nombre'];
		$data['telefono'] = $_POST['telefono'];
		$data['direccion'] = $_POST['direccion'];
		$data['correo'] = $_POST['correo'];
		$this->sucursal_model->edit($id, $data);
		redirect(base_url()."usuario/index", 'refresh');
	}
}
