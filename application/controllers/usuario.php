<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("usuario_model");
	}
	public function index()
	{
		$listausuario=$this->usuario_model->listarusuario();
		$data['usuario'] = $listausuario;
		$this->load->view('layouts/header');
		$this->load->view("layouts/aside");
		$this->load->view('usuario/usuario_vista', $data);
		$this->load->view('layouts/footer');
	}
	public function prueba(){
		$query = $this->db->get('usuario');
		$execonsulta = $query->result();
		print_r($execonsulta);
	}
	public function modificar(){
		$id=$_POST['id'];
		$data['infousuario']=$this->usuario_model->recuperarusuario($id);
		$this->load->view('layouts/header');
		$this->load->view("layouts/aside");
		$this->load->view('usuario/modificarusuario_vista', $data);
		$this->load->view('layouts/footer');
	}
	public function modificarbd(){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$data['nombre'] = $nombre;
		$this->usuario_model->modificarusuario($id, $data);
		redirect('usuario/index','refresh');
	}
	public function agregar(){
		$this->load->view('layouts/header');
		$this->load->view("layouts/aside");
		$this->load->view('usuario/agregarusuario_vista');
		$this->load->view('layouts/footer');
	}
	public function agregarbd(){
		$data['nombre'] = $_POST['nombre'];
		$data['primerApellido'] = $_POST['primerApellido'];
		$data['segundoApellido'] = $_POST['segundoApellido'];
		$data['direccion'] = $_POST['direccion'];
		$data['telefono'] = $_POST['telefono'];
		$data['idrol'] = $_POST['idrol'];
		$data['username'] = $_POST['username'];
		$data['password'] = $_POST['password'];
		$this->usuario_model->agregarusuario($data);
		redirect('usuario/index', 'refresh');
	}
	public function eliminar(){
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->usuario_model->eliminarusuario($id, $data);
		redirect('usuario/index', 'refresh');
	}
	public function login(){
		$this->load->view('layouts/header');
		$this->load->view("layouts/aside");
		$this->load->view('admin/login_vista');
		$this->load->view('layouts/footer');
	}
}
