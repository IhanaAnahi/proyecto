<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("productos_model");
	}
	public function index()
	{
		$productos=$this->productos_model->listarproductos();
		$data['productos']=$productos;
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/list",$data);
		$this->load->view("layouts/footer");
	}
	public function add()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add");
		$this->load->view("layouts/footer");
	}
	public function agregarbd()
	{
		$data['nombre']=$_POST['nombre'];
		$data['descripcion']=$_POST['descripcion'];
		$data['precio']=$_POST['precio'];
		$data['talla']=$_POST['talla'];
		$data['stock']=$_POST['stock'];
		$data['idsucursal']=1;
		$this->productos_model->agregarproducto($data);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/add",$data);
		$this->load->view("layouts/footer");
	}
	public function store(){

		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$precio = $this->input->post("precio");
		$talla = $this->input->post("talla");
		$stock = $this->input->post("stock");
		$sucursal = 1;
			$data  = array(
				'nombre' => $nombre,
				'descripcion'=>$descripcion,
			    'precio'=>$precio,
                'talla'=>$talla,
			    'stock'=>$stock,
				'idsucursal'=>$sucursal);
			$this->productos_model->save($data);
			redirect(base_url()."mantenimiento/productos");
	}
	public function edit(){
		$id = $_POST['id'];
		$data['infoproductos'] = $this->productos_model->recuperarproducto($id);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/productos/edit",$data);
		$this->load->view("layouts/footer");
	}
	public function update(){
		$id = $_POST['idproducto'];
		$data['nombre'] = $_POST['nombre'];
		$data['descripcion'] = $_POST['descripcion'];
		$data['precio'] = $_POST['precio'];
		$data['talla'] = $_POST['talla'];
		$data['stock'] = $_POST['stock'];
		$this->productos_model->modificarproducto($id, $data);
		redirect(base_url()."mantenimiento/productos", 'refresh');
	}
	public function eliminarbd()
	{
		$id=$_POST['id'];
		$data['estado'] = 0;
		$this->productos_model->eliminarproducto($id, $data);
		redirect(base_url().'mantenimiento/productos', 'refresh');
	}
}
