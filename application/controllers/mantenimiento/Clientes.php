<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Clientes_model");
	}

	public function index()
	{
		$data  = array(
			'clientes' => $this->Clientes_model->listarclientes(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/list",$data);
		$this->load->view("layouts/footer");

	}

	public function store(){

		$nombre = $this->input->post("nombre");
		$ci = $this->input->post("ci");

		$this->form_validation->set_rules("nombre","Nombre del Cliente","required");
		$this->form_validation->set_rules("ci","CI","required");
		

		if ($this->form_validation->run()) {
			$data  = array(
				'nombre' => $nombre, 
				'ci' => $ci,
				'estado' => "1"
			);

			if ($this->Clientes_model->save($data)) {
				redirect(base_url()."mantenimiento/clientes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/clientes/add");
			}
		}
		else{
			$this->add();
		}

		
	}
	public function edit($id){
		$data  = array(
			'cliente' => $this->Clientes_model->listarclientes($id), 
			'ci'=>$this->Clientes_model->listarclientes($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/clientes/edit",$data);
		$this->load->view("layouts/footer");
	}


	public function update(){
		$idcliente = $this->input->post("idcliente");
		$nombre = $this->input->post("nombre");
		$ci = $this->input->post("ci");
		

		$clienteActual = $this->Clientes_model->listarclientes($idcliente);

		if ($ci == $clienteActual->ci) {
			$is_unique = "";
		}else{
			$is_unique= '|is_unique[clientes.ci]';
		}

		$this->form_validation->set_rules("nombre","Nombre del Cliente","required");
	
		if ($this->form_validation->run()) {
			$data = array(
				'nombre' => $nombre, 
				'ci' => $ci,
			);

			if ($this->Clientes_model->agregarcliente($idcliente,$data)) {
				redirect(base_url()."mantenimiento/clientes");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/clientes/edit/".$idcliente);
			}
		}else{
			$this->eliminarcliente($idcliente);
		}

		

	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Clientes_model->update($id,$data);
		echo "mantenimiento/clientes";
	}
}