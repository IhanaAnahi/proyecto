<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes1 extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("clientes_model");
	}
	public function index()
	{
		$listaclientes=$this->clientes_model->listarclientes();
		$data['cliente']=$listaclientes;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/lista",$data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add");
		$this->load->view("layouts/footer");
	}
	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['ci']=$_POST['ci'];
		$this->clientes_model->agregarcliente($data);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/add",$data);
		$this->load->view("layouts/footer");
	}
	public function store(){

		$nombre = $this->input->post("nombre");
		$ci = $this->input->post("ci");
			$data  = array(
				'nombre' => $nombre,
				'ci'=>$ci);
			$this->clientes_model->save($data);
			redirect(base_url()."mantenimiento/clientes1");
	}
	public function edit(){
		$id = $_POST['id'];
		$data['infocliente'] = $this->clientes_model->recuperarcliente($id);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}
	public function update(){
		$id = $_POST['idcliente'];
		$data['nombre'] = $_POST['nombre'];
		$data['ci'] = $_POST['ci'];
		$this->clientes_model->modificarcliente($id, $data);
		redirect(base_url()."mantenimiento/clientes1", 'refresh');
	}
	public function eliminarbd()
	{
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->clientes_model->eliminarcliente($id, $data);
		redirect(base_url().'mantenimiento/clientes1', 'refresh');
	}
}