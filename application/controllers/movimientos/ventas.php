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
		$idproductos = $this->input->post("idproducto");
		$precio = $this->input->post("precio");
		$importes = $this->input->post("importes");
		$cantidades = $this->input->post("cantidad");
		$data = array(
			'total' => $total,
			'idtipoComprobante' => $idtipocomprobante,
			'idcliente' => $idcliente,
			'idusuario' => $idusuario
		);

		if ($this->Ventas_model->save($data)) {
			$idventa = $this->Ventas_model->lastID();
			$this->updateComprobante($idtipocomprobante);
			$this->save_detalle($idventa,$idproductos,$cantidades,$importes);
			//--------------------------------------------------------------
			$this->load->library('pdf');
			$recibo = $this->Ventas_model->recibocliente($idventa);
			$recibo = $recibo->result();

			
			$this->pdf = new Pdf();
			$this->pdf->AddPage();
			$this->pdf->AliasNbPages();
			$this->pdf->SetTitle("Recibo");
			$this->pdf->SetLeftMargin(15);
			$this->pdf->SetRightMargin(15);
			$this->pdf->SetFillColor(210,210,210);
			$this->pdf->SetFont('Arial','B',11);
			$this->pdf->Cell(30);
			$this->pdf->Cell(120,10,'Recibo de Pedido',0,0,'C');
			//ancho,alto,texto a mostrar,borde(LTRB),0 a la derecha-1 sig linea-2 debajo,centrado
			$this->pdf->Ln(10); // debe ser exacto
			// Celdas
			$this->pdf->Cell(25,5,utf8_decode("Cliente"),'TBLR',0,'L',1);
			//$this->pdf->Cell(50,5,utf8_decode(" "),0,0,'L',0);
			$this->pdf->Cell(25,5,utf8_decode("CI"),'TBLR',0,'L',1);

			$this->pdf->Ln(5);
			foreach ($recibo as $row) {
				$cliente = $row->nombre;
				$ci = $row->ci;
				$this->pdf->Cell(25,5,utf8_decode($cliente),'TBLR',0,'L',0);
				$this->pdf->Cell(25,5,utf8_decode($ci),'TBLR',0,'L',0);
				$this->pdf->Ln(5);
			}
			$this->pdf->Ln(5);
			$this->pdf->Ln(5);
			$this->pdf->Cell(35,5,utf8_decode("Producto"),'TBLR',0,'L',1);
			$this->pdf->Cell(15,5,utf8_decode("Precio"),'TBLR',0,'L',1);
			$this->pdf->Cell(10,5,utf8_decode("Talla"),'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,utf8_decode("Cantidad"),'TBLR',0,'L',1);
			$this->pdf->Cell(20,5,utf8_decode("Importe"),'TBLR',0,'L',1);
			$this->pdf->Cell(15,5,utf8_decode("Total"),'TBLR',0,'L',1);
			$this->pdf->Cell(45,5,utf8_decode("Fecha"),'TBLR',0,'L',1);
			$this->pdf->Ln(5);
			$this->pdf->Ln(5);
			foreach ($recibo as $row2) {
				$producto = $row2->producto;
				$talla = $row2->talla;
				$precio = $row2->precio;
				$cantidad = $row2->cantidad;
				$importe = $row2->importe;
				$total = $row2->total;
				$fecha = $row2->fechaActualizacion;
				$this->pdf->Cell(35,5,utf8_decode($producto),'TBLR',0,'L',0);
				$this->pdf->Cell(10,5,utf8_decode($talla),'TBLR',0,'L',0);
				$this->pdf->Cell(15,5,utf8_decode($precio),'TBLR',0,'L',0);
				$this->pdf->Cell(20,5,utf8_decode($cantidad),'TBLR',0,'L',0);
				$this->pdf->Cell(20,5,utf8_decode($importe),'TBLR',0,'L',0);
				$this->pdf->Cell(15,5,utf8_decode($total),'TBLR',0,'L',0);
				$this->pdf->Cell(45,5,utf8_decode($fecha),'TBLR',0,'L',0);
				$this->pdf->Ln(5);
			}
			$this->pdf->Output("recibopedido.pdf","I");
			//redirect(base_url()."movimientos/ventas");

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
				'importe'=> $importes[$i],
				'cantidad' => $cantidadcompra[$i]
			);
			$this->Ventas_model->save_detalle($data);
			//$this->updateProducto($productos[$i],$cantidadcompra[$i]);
		}
	}

	protected function updateProducto($idproducto,$cantidad){
		$productoActual = $this->productos_model->recuperarproducto($idproducto);
		$data = array(
			'stock' => ($productoActual->stock - $cantidad),
		);
		$this->productos_model->modificarproducto($idproducto,$data);
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