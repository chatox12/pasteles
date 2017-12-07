<?php
	//include_once('globals.php');
	include 'conn.php';
	/**
	*/
	class api 
	{
//=======================Clientes====================================
//para seleccionar todos clientes
		public function getCliente(){
			$query = "SELECT idcliente, nombre_cliente,apellido_cliente,direccion_cliente,telefono_cliente FROM cliente;";
			$conn = new connection();
			$stmt = $conn->mysqli->prepare($query);
			$stmt->execute();
			$cliente = array();
			$stmt->bind_result($id,$nombre,$apellido,$direccion,$telefono);
			while($stmt->fetch()){
				//$cliente[] = '{id: '.$id.' ,  nombre:  '.$nombre.' ,  apellido:  '.$apellido.' ,  direccion:  '.$direccion.' ,  telefono:  '.$telefono.'}';
				//echo '{"monto": "'.$monto[0]->valor.'","moneda":"'.$moneda[0]->nombre.'","simbolo":"'.$moneda[0]->simbolo.'"}';
				$cliente[] = '{"id": '.$id.' , "nombre": "'.$nombre.'" , "apellido": "'.$apellido.'", "direccion": "'.$direccion.'" , "telefono": "'.$telefono.'"}';
			}
			return $cliente;
			$conn->close;
		}

//get cliente por id 
		public function getClienteId($id){
			$consulta="SELECT idcliente, nombre_cliente,apellido_cliente,direccion_cliente,telefono_cliente FROM cliente where idcliente=".$id."";
			$conn = new Connection();
			$stmt = $conn->mysqli->prepare($consulta);
			$stmt->execute();
			$cliente = array();
			$stmt->bind_result($id,$nombre, $apellido, $direccion, $telefono);
				while($stmt->fetch())
				{
					$cliente[] = '{"id": '.$id.' , "nombre": "'.$nombre.'" , "apellido": "'.$apellido.'", "direccion": "'.$direccion.'" , "telefono": "'.$telefono.'"}';
				}		 	
				
			return $cliente;	
			$conn->close();
		}


//insertar cliente
		public function postCliente($nombre, $apellido,$direccion, $telefono){
			$consulta=("INSERT INTO cliente (nombre_cliente, apellido_cliente,direccion_cliente,telefono_cliente)VALUES (\"".$nombre."\", \"".$apellido."\", \"".$direccion."\", \"".$telefono."\")");
			echo $consulta;
			$db = new Connection();
			$cliente = $db->executeQuery($consulta);
			
		}

//=======================NOTIFICACION===============================
//seleccionar toda la tabla notificacion
		public function getnotificacion(){
			$query = "SELECT idnotificacion, estado_notificacion,pedido_idpedido FROM notificacion;";
			$conn = new connection();
			$stmt = $conn->mysqli->prepare($query);
			$stmt->execute();
			$cliente = array();
			$stmt->bind_result($id,$estado,$idpedido);
			while($stmt->fetch()){
				$cliente[] = '{id: '.$id.' ,  estado:  '.$estado.' ,  idpedido:  '.$idpedido.'}';
			}
			return $cliente;
			$conn->close;
		}

//get notificaciones por id 
		public function getNotificacionId($id){
			$consulta="SELECT idnotificacion, estado_notificacion,pedido_idpedido FROM notificacion where idnotificacion=".$id."";
			$conn = new Connection();
			$stmt = $conn->mysqli->prepare($consulta);
			$stmt->execute();
			$tipoUsuarioA = array();
			$stmt->bind_result($id,$estado, $idpedido);
				while($stmt->fetch())
				{
					$tipoUsuarioA[] = '{id:  '.$id.' ,  estado: '.$estado.' ,  idpedido: '.$idpedido.'}';
				}		 	
				
			return $tipoUsuarioA;	
			$conn->close();
		}


//insertar notificaciones
		public function postNotificacion($estado, $idpedido){
			$consulta=("INSERT INTO notificacion (estado_notificacion, pedido_idpedido)VALUES (\"".$estado."\", \"".$idpedido."\")");
			echo $consulta;
			$db = new Connection();
			$cliente =$db->executeQuery($consulta);
			
		}

//===================OCASION============================================
//Para seleccionar todos los elementos de la tabla ocasion 
		public function getOcasion(){
			$Query = "SELECT idocasion, nombre_ocasion FROM ocasion";
			$conn = new Connection();
			$stmt = $conn->mysqli->prepare($Query);
			$stmt->execute();
			$OcasionA = array();
			$stmt->bind_result($id,$nombre);
				while($stmt->fetch()){
					$OcasionA[] = '{id:  '.$id.' ,  nombre:  '.$nombre.'}';
				}
			return $OcasionA;
			$conn->close();
		}

//Seleccinar Ocasion por ID en la tabla ocasion
		public function getOcasionId($id){
			$query="SELECT idocasion, nombre_ocasion FROM ocasion where idocasion = ".$id."";
			$conn = new Connection();
			$stmt = $conn->mysqli->prepare($query);
			$stmt->execute();
			$OcasionId = array();
			$stmt->bind_result($id,$nombre);
			while($stmt->fetch()){
				$OcasionId[] = '{id:  '.$id.' ,  nombre:  '.$nombre.'}';
			}
			return $OcasionId;
			$conn->close();
		}
//insertar en la tabla Ocasion
	public function postOcasion($nombre){
		$consulta=("INSERT INTO ocasion (nombre_ocasion)VALUES (\"".$nombre."\")");
		echo $consulta;
		$db = new Connection();
		$cliente =$db->executeQuery($consulta);
		
	}



//=======================OFERTA====================================
//para obtener todos los datos de la tabla ofertas 
	public function getOferta(){
		$consulta = "SELECT idoferta,fecha_inicio_oferta, fecha_fin_oferta, descuento_oferta, cantidad_oferta, estado_oferta, pedido_idpedido FROM oferta";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare($consulta);
		$stmt->execute();
		$ofertaA = array();
		$stmt->bind_result($id, $finicio, $fin, $descuento, $cantidad, $estado, $idpedido);

		while($stmt->fetch()){
			$ofertaA = '{id:  '.$id.' ,  finicio:  '.finicio.' ,  ffin  '.$fin.' ,  descuento: '.$descuento.' ,  cantidad: '.$cantidad.' ,  estado:  '.$estado.' ,  idpedido'.$idpedido.'}';
		}
		return $ofertaA;
	}


//para buscar por ID en la tabla Oferta
	public function getOfertaId($id){
		$consulta = "SELECT idoferta,fecha_inicio_oferta, fecha_fin_oferta, descuento_oferta, cantidad_oferta, estado_oferta, pedido_idpedido FROM oferta WHERE idoferta = ".$id."";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare($consulta);
		$stmt->execute();
		$ofertaA = array();
		$stmt->bind_result($id, $finicio, $fin, $descuento, $cantidad, $estado, $idpedido);

		while($stmt->fetch()){
			$ofertaA = '{id:  '.$id.' ,  finicio:  '.finicio.' ,  ffin  '.$fin.' ,  descuento: '.$descuento.' ,  cantidad: '.$cantidad.' ,  estado:  '.$estado.' ,  idpedido'.$idpedido.'}';
		}
		return $ofertaA;
	}	

//insertar en la tabla ofertas
	public function postOferta($finicio, $ffin, $descuento, $cantidad, $estado, $idpedido){
		$consulta=("INSERT INTO oferta (fecha_inicio_oferta, fecha_fin_oferta, descuento_oferta, cantidad_oferta, estado_oferta, pedido_idpedido)VALUES (\"".$finicio."\", \"".$ffin."\", \"".$descuento."\", \"".$cantidad."\", \"".$estado."\", \"".$idpedido."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//======================PASTELES PEDIDO=================================
//para seleccionar todos los clientes
	public function getPedidoPastel(){
		$Query = "SELECT idpasteles_pedido, cantidad_pasteles_pedido, rebanadas_pasteles_pedido, pasteles_venta_idpasteles_venta, pedido_idpedido FROM pasteles_pedido ;";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pasteles_pedido = array();
		$stmt->bind($id, $cantidad, $rebanadas, $id_pastelesVenta, $idPedido);
		while($stmt->fetch()){
			$pasteles_pedido[] = '{id:  '.$id.' ,  cantidad: '.$cantidad.' ,  rebanadas: '.$rebanadas.' ,  id_pastelesVenta:  '.$id_pastelesVenta.' ,  id_pedido:  '.$idPedido.'} ';
		}
		return $pasteles_pedido;

	}

//para buscar por ID en la tabla Pasteles Pedido
	public function getPedidoPastelId($id){
		$Query = "SELECT idpasteles_pedido, cantidad_pasteles_pedido, rebanadas_pasteles_pedido, pasteles_venta_idpasteles_venta, pedido_idpedido FROM pasteles_pedido WHERE idpasteles_pedido = ".$id.";";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pasteles_pedido = array();
		$stmt->bind($id, $cantidad, $rebanadas, $id_pastelesVenta, $idPedido);
		while($stmt->fetch()){
			$pasteles_pedido[] = '{id:  '.$id.' ,  cantidad: '.$cantidad.' ,  rebanadas: '.$rebanadas.' ,  id_pastelesVenta:  '.$id_pastelesVenta.' ,  id_pedido:  '.$idPedido.'} ';
		}
		return $pasteles_pedido;
	}

//para insertar en la tabla ofertas
	public function postPedidoPastel($cantidad, $rebanadas, $id_pastelesVenta, $idPedido){
		$consulta=("INSERT INTO pasteles_pedido (cantidad_pasteles_pedido, rebanadas_pasteles_pedido, pasteles_venta_idpasteles_venta, pedido_idpedido)VALUES (\"".$cantidad."\", \"".$rebanadas."\", \"".$id_pastelesVenta."\", \"".$idPedido."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}

//===============================PASTELES VENTA===========================
//para seleccionar todos los Pasteles para venta
	public function getPastelesVenta(){
		$Query = "SELECT idpasteles_venta, nombre_pasteles_venta, precio_pasteles_venta, descripcion_pasteles_venta, fotografia_pasteles_venta, ocasion_idocasion FROM pasteles_venta;";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pasteles_pedido = array();
		$stmt->bind($id, $nombre, $precio, $descripcion, $fotografia,$idOcasion);
		while($stmt->fetch()){
			$pasteles_pedido[] = '{id:  '.$id.' ,  nombre: '.$cantidad.' ,  precio: '.$precio.' ,  fotografia:  '.$fotografia.' ,  idOcasion:  '.$idOcasion.' } ';
		}
		return $pasteles_pedido;

	}
	 
//para seleccionar Pasteles Venta por ID
	public function getPastelesVentaId($id){
		$Query = "SELECT idpasteles_venta, nombre_pasteles_venta, precio_pasteles_venta, descripcion_pasteles_venta, fotografia_pasteles_venta, ocasion_idocasion FROM pasteles_venta WHERE idpasteles_venta = ".$id.";";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pasteles_pedido = array();
		$stmt->bind($id, $nombre, $precio, $descripcion, $fotografia,$idOcasion);
		while($stmt->fetch()){
			$pasteles_pedido[] = '{id:  '.$id.' ,  nombre: '.$cantidad.' ,  precio: '.$precio.' ,  fotografia:  '.$fotografia.' ,  idOcasion:  '.$idOcasion.' } ';
		}
		return $pasteles_pedido;

	}

//para insertar pasteles para la venta
	public function postPastelesVenta($nombre, $precio, $descripcion, $fotografia,$idOcasion){
		$consulta=("INSERT INTO pasteles_venta (nombre_pasteles_venta, precio_pasteles_venta, descripcion_pasteles_venta, fotografia_pasteles_venta, ocasion_idocasion)VALUES (\"".$nombre."\", \"".$precio."\", \"".$descripcion."\", \"".$fotografia."\", \"".$idOcasion."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}

//================================PEDIDOS================================
//funcion para ver todos los pedidos	
	public function getPedido(){
		$Query = "SELECT idpedido, fecha_entrega_pedido, correo_contacto_pedido, boleta_deposito_pedido, cliente_idcliente FROM pedido;";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pedido = array();
		$stmt->bind($id, $fEntrega, $correo, $boleta, $idCliente);
		//fEntrega = fecha de Entrega 
		while($stmt->fetch()){
			$pedido[] = '{id:  '.$id.' ,  fEntrega: '.$fEntrada.' ,  correo: '.$correo.' ,  boleta:  '.$boleta.' ,  idCliente:  '.$idCliente.' } ';
		}
		return $pedido;
	}

//funcion para buscar pedidos por ID
	public function getPedidoId(){
		$Query = "SELECT idpedido, fecha_entrega_pedido, correo_contacto_pedido, boleta_deposito_pedido, cliente_idcliente FROM pedido WHERE idpedido = ".$id.";";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pedido = array();
		$stmt->bind($id, $fEntrega, $correo, $boleta, $idCliente);
		//fEntrega = fecha de Entrega 
		while($stmt->fetch()){
			$pedido[] = '{id:  '.$id.' ,  fEntrega: '.$fEntrada.' ,  correo: '.$correo.' ,  boleta:  '.$boleta.' ,  idCliente:  '.$idCliente.' } ';
		}
		return $pedido;
	}

//funcion para insertar en Pedido	
	public function postPedido($fEntrega, $correo, $boleta, $idCliente){
		$consulta=("INSERT INTO pedido (fecha_entrega_pedido, correo_contacto_pedido, boleta_deposito_pedido, cliente_idcliente)VALUES (\"".$fEntrada."\", \"".$correo."\", \"".$boleta."\", \"".$idCliente."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//===========================Tipo Usuarios==============================
//Seleccionar Tipos Usuarios por id 
//se puede realizar por varias formas falta definir 
			public function getTipoUsuario($id){
				$consulta="SELECT idtipo_usuario, nombre_tipo_usuario FROM tipo_usuario where idtipo_usuario=".$id."";
				$conn = new Connection();
				$stmt = $conn->mysqli->prepare($consulta);
				$stmt->execute();
				$tipoUsuarioA = array();
				$stmt->bind_result($id,$nombre);
					while($stmt->fetch())
					{
						$tipoUsuarioA[] = '{idtipo_usuario:  '.$id.' nombre_tipo_usuario: '.$nombre.'}';
					}		 	
					
				return $tipoUsuarioA;	
				$conn->close();
			 }

//Seleccionar todos los Tipos Usuarios
	public function seleccionarTipoUsuarios(){
			$consulta="SELECT idtipo_usuario, nombre_tipo_usuario FROM tipo_usuario;";
			$conn = new Connection();
			$stmt = $conn->mysqli->prepare($consulta);
			$stmt->execute();
			$tipoUsuarioA = array();
			$stmt->bind_result($id,$nombre);
				while($stmt->fetch())
				{
					$tipoUsuarioA[] = '{idtipo_usuario:  '.$id.' nombre_tipo_usuario: '.$nombre.'}';
				}	
		 	 	
		return $tipoUsuarioA;	
		$conn->close();
	}
//insertar tipo usuarios
	public function postTipoUsuario($tipo_usuario){
		$consulta=("INSERT INTO tipo_usuario (nombre_tipo_usuario)VALUES (\"".$tipo_usuario."\")");
		echo $consulta;
		$conn = new Connection();
		$tipo_usuario = mysqli_query($conn, $consulta);
		$conn->close();
	}
	

//
//============================usuarios==================================
//funcion para ver todos los usuarios
	public function getusuarios(){
		$Query = "SELECT idusuario, nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, nickname_usuario, pasword_usuario, tipo_usuario_idtipo_usuario FROM usuario;";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pedido = array();
		$stmt->bind($id, $nombre, $apellido, $direccion, $telefono, $nickname, $password, $idtipo_usuario);
		//fEntrega = fecha de Entrega 
		while($stmt->fetch()){
			$pedido[] = '{id:  '.$id.' ,  nombre: '.$nombre.' ,  apellido: '.$apellido.' ,  direccion:  '.$direccion.' ,  telefono:  '.$telefono.' ,  nickname: '.$nickname.' ,  password: '.$password.' ,  idTipoUsuario'.$idtipo_usuario.' } ';
		}
		return $pedido;
	}

//funcion para buscar usuarios por ID 
	public function getUsuariosId($id){
		$Query = "SELECT idusuario, nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, nickname_usuario, pasword_usuario, tipo_usuario_idtipo_usuario FROM usuario WHERE idusuario = ".$id.";";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare();
		$stmt->execute();
		$pedido = array();
		$stmt->bind($id, $nombre, $apellido, $direccion, $telefono, $nickname, $password, $idtipo_usuario);
		//fEntrega = fecha de Entrega 
		while($stmt->fetch()){
			$pedido[] = '{id:  '.$id.' ,  nombre: '.$nombre.' ,  apellido: '.$apellido.' ,  direccion:  '.$direccion.' ,  telefono:  '.$telefono.' ,  nickname: '.$nickname.' ,  password: '.$password.' ,  idTipoUsuario'.$idtipo_usuario.' } ';
		}
		return $pedido;
	}
//insertar en usuarios
	public function postUsuario($nombre, $apellido, $direccion, $telefono, $nickname, $password, $idtipo_usuario){
		$consulta=("INSERT INTO tipo_usuario (nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, nickname_usuario, pasword_usuario, tipo_usuario_idtipo_usuario)VALUES (\"".$nombre."\", \"".$apellido."\", \"".$direccion."\", \"".$telefono."\", \"".$nickname."\", \"".$password."\" , \"".$idtipo_usuario."\")");
		echo $consulta;
		$conn = new Connection();
		$tipo_usuario = mysqli_query($conn, $consulta);
		$conn->close();
	}

//
//========================VALIDAR PEDIDO================================
//funcion para obtener todos los datos de validar pedido
	public function getValidarPedido(){
		$consulta="SELECT idvalidar_pedido, estado_validar_pedido, usuario_idusuario, pedido_idpedido FROM validar_pedido;";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare($consulta);
		$stmt->execute();
		$ValidarP = array();
		$stmt->bind_result($id,$estado, $idUsuario, $idPedido);
			while($stmt->fetch())
			{
				$ValidarP[] = '{id:  '.$id.' estado: '.$estado.' ,  idusuario:  '.$idUsuario.'  , idpedido:'.$idPedido.'}';
			}		 	
			
		return $ValidarP;	
		$conn->close();
	}

//funcion para buscar en la tabla pedido por ID 
	public function getValidarPedidoId($id){
		$consulta="SELECT idvalidar_pedido, estado_validar_pedido, usuario_idusuario, pedido_idpedido FROM validar_pedido where idtipo_usuario=".$id."";
		$conn = new Connection();
		$stmt = $conn->mysqli->prepare($consulta);
		$stmt->execute();
		$ValidarP = array();
		$stmt->bind_result($id,$estado, $idUsuario, $idPedido);
			while($stmt->fetch())
			{
				$ValidarP[] = '{id:  '.$id.' estado: '.$estado.' ,  idusuario:  '.$idUsuario.'  , idpedido:'.$idPedido.'}';
			}		 	
			
		return $ValidarP;	
		$conn->close();
	}

//funcion para insertar en la tabla Validar pedido
	public function postValidarPedido($estado, $idUsuario, $idPedido){
		$consulta=("INSERT INTO valiar_pedido (estado_validar_pedido, usuario_idusuario, pedido_idpedido)VALUES (\"".$estado."\", \"".$idUsuario."\", \"".$idPedido."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//

//actualizacion 
	public function actualizarUsuario($tabla, $campo, $nuevoValor, $id)
	{
		$consulta = "UPDATE ".$tabla." SET ".$tabla."_".$campo."= ".$nuevoValor." WHERE "."id".$tabla."=".$id.";";
		echo $consulta;
		$db = new Connection();
		$administradorP =$db->executeQuery($consulta);
	}

//funcion para eliminar
	public function eliminarTabla($id, $tabla)
	{
		$consulta="DELETE FROM ".$tabla."  WHERE  id".$tabla." =".$id.";";
		echo $consulta;
		$db = new Connection();
		$administradorP =$db->executeQuery($consulta);
	}


}

/*


*/
?>