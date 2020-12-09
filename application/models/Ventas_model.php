 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas_model extends CI_Model {

	public function getVentas(){
		$this->db->select("v.*,c.nombre,c.ci,tc.nombre as tipocomprobante, concat(u.nombre,' ',u.primerApellido,' ',u.segundoApellido) as usu");
		$this->db->from("venta v");
		$this->db->join("usuario u","v.idusuario = u.idusuario");
		$this->db->join("cliente c","v.idcliente = c.idcliente");
		$this->db->join("tipocomprobante tc","v.idtipoComprobante = tc.idtipoComprobante");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function getVentasbyDate($fechainicio,$fechafin){
		$this->db->select("v.*,c.nombre,c.ci,tc.nombre as tipocomprobante");
		$this->db->from("venta v");
		$this->db->join("cliente c","v.idcliente = c.idcliente");
		$this->db->join("tipocomprobante tc","v.idtipoComprobante = tc.idtipoComprobante");
		$this->db->where("v.fechaActualizacion >=",$fechainicio);
		$this->db->where("v.fechaActualizacion <=",$fechafin);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

	public function getVenta($id){
	$this->db->select("v.*,c.nombre,tc.nombre as tipocomprobante");
		$this->db->from("venta v");
		$this->db->join("cliente c","v.cliente_id = c.id");
		$this->db->join("tipocomprobante tc","v.idtipoComprobante = tc.idtipoComprobante");
		$this->db->where("v.id",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function getDetalle($id){
		$this->db->select("dt.*,p.*");
		$this->db->from("detalleventa dt");
		$this->db->join("producto p","dt.idproducto = p.idproducto");
		$this->db->where("dt.idventa",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getComprobantes(){
		$resultados = $this->db->get("tipoComprobante");
		return $resultados->result();
	}

	public function getComprobante($idcomprobante){
		$this->db->where("idtipoComprobante",$idcomprobante);
		$resultado = $this->db->get("tipoComprobante");
		return $resultado->row();
	}

	public function getproductos($valor){
		$this->db->select("idproducto, nombre as label, precio, stock");
		$this->db->from("producto");
		$this->db->like("nombre",$valor);
		$resultados = $this->db->get();
		return $resultados->result_array();
	}

	public function save($data){
		return $this->db->insert("venta",$data);
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function updateComprobante($idcomprobante,$data){
		$this->db->where("idtipoComprobante",$idcomprobante);
		$this->db->update("tipocomprobante",$data);
	}

	public function save_detalle($data){
		$this->db->insert("detalleventa",$data);
	}

	public function recibocliente($idventa){
		$this->db->select("v.total,v.fechaActualizacion,c.nombre,c.ci,tc.nombre as tipocomprobante, concat(u.nombre,' ',u.primerApellido,' ',u.segundoApellido) as vendedor,dt.importe,dt.cantidad,p.nombre as producto,p.precio,p.talla");
		$this->db->from("venta v");
		$this->db->join("usuario u","v.idusuario = u.idusuario");
		$this->db->join("cliente c","v.idcliente = c.idcliente");
		$this->db->join("tipocomprobante tc","v.idtipoComprobante = tc.idtipoComprobante");
		$this->db->join("detalleventa dt", "v.idventa = dt.idventa");
		$this->db->join("producto p","dt.idproducto = p.idproducto");
		$this->db->where("dt.idventa",$idventa);
		$this->db->where("v.idventa",$idventa);
		return $this->db->get();
	}
}