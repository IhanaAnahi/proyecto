<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Ventas_model");
		$this->load->model("clientes_model");
		$this->load->model("productos_model");
	}

	public function index(){
		$data  = array(
			'ventas' => $this->Ventas_model->getVentas(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			"clientes" => $this->clientes_model->listarclientes(),
			"productos" => $this->productos_model->listarproductos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/ventas/add",$data);
		$this->load->view("layouts/footer");
	}

	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos($valor);
		echo json_encode($clientes);
	}

	public function store(){
		$total = $this->input->post("total");
		$idtipocomprobante = $this->input->post("idtipocomprobante");
		$idcliente = $this->input->post("idcliente");
		$idusuario = $this->session->userdata("idusuario");

		$idproductos = $this->input->post("idproductos");
		$precio = $this->input->post("precios");
		$importes = $this->input->post("importes");
		$cantidades = $this->input->post("cantidades");
		

		$data = array(
			'total' => $total,
			'idtipoComprobante' => $idtipocomprobante,
			'idcliente' => $idcliente,
			'idusuario' => $idusuario,
			
		
		);

		if ($this->Ventas_model->save($data)) {
			$idventa = $this->Ventas_model->lastID();
			$this->updateComprobante($idtipocomprobante);
			$this->save_detalle($idventa,$idproductos,$cantidades,$importes);
			redirect(base_url()."movimientos/ventas");

		}else{
			redirect(base_url()."movimientos/ventas/add");
		}
	}

	protected function updateComprobante($idcomprobante){
		$comprobanteActual = $this->Ventas_model->getComprobante($idcomprobante);
		$data  = array(
			'catidad' => $comprobanteActual->catidad + 1, 
		);
		$this->Ventas_model->updateComprobante($idcomprobante,$data);
	}

	protected function save_detalle($idventa,$productos,$cantidadcompra,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'idventa' => $idventa,
				'idproducto' => $productos[$i], 
				'cantidad' => $cantidadcompra[$i],
				'importe'=> $importes[$i]
			);
			$this->Ventas_model->save_detalle($data);
			$this->updateProducto($productos[$i],$cantidadcompra[$i]);
		}
	}

	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->productos_model->getProducto($idproducto);
		$data = array(
			'stock' => $productoActual->stock - $cantidad, 
		);
		$this->productos_model->update($idproducto,$data);
	}

	public function view(){
		$idventa = $this->input->post("id");
		$data = array(
			"venta" => $this->Ventas_model->getVenta($idventa),
			"detalles" =>$this->Ventas_model->getDetalle($idventa)
		);
		$this->load->view("admin/ventas/view",$data);
	}

}