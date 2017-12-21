<?php
	//include_once('globals.php');
	include 'conn.php';
	/**
	*/
	class api 
	{
//=======================Clientes====================================
//insertar cliente
		public function postCliente($nombre, $apellido,$direccion, $telefono,$nickname,$password,$correo,$nit){
			$consulta=("INSERT INTO cliente (nombre_cliente, apellido_cliente,direccion_cliente,telefono_cliente)VALUES (\"".$nombre."\", \"".$apellido."\", \"".$direccion."\", \"".$telefono."\", \"".$nickname."\", \"".$password."\", \"".$correo."\", \"".$nit."\")");
			echo $consulta;
			$db = new Connection();
			$cliente = $db->executeQuery($consulta);
			
		}
//
//=======================NOTIFICACION===============================
//insertar notificaciones
		public function postNotificacion($estado, $idpedido){
			$consulta=("INSERT INTO notificacion (estado_notificacion, pedido_idpedido)VALUES (\"".$estado."\", \"".$idpedido."\")");
			echo $consulta;
			$db = new Connection();
			$cliente =$db->executeQuery($consulta);
			
		}
//
//===================OCASION============================================
//insertar en la tabla Ocasion
	public function postOcasion($nombre){
		$consulta=("INSERT INTO ocasion (nombre_ocasion)VALUES (\"".$nombre."\")");
		echo $consulta;
		$db = new Connection();
		$cliente =$db->executeQuery($consulta);
		
	}
//
//=======================OFERTA====================================
//insertar en la tabla ofertas
	public function postOferta($finicio, $ffin, $descuento, $cantidad, $estado, $idpedido){
		$consulta=("INSERT INTO oferta (fecha_inicio_oferta, fecha_fin_oferta, descuento_oferta, cantidad_oferta, estado_oferta, pedido_idpedido)VALUES (\"".$finicio."\", \"".$ffin."\", \"".$descuento."\", \"".$cantidad."\", \"".$estado."\", \"".$idpedido."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//
//======================PASTELES PEDIDO=================================
//para insertar en la tabla ofertas
	public function postPedidoPastel($cantidad, $rebanadas, $id_pastelesVenta, $idPedido){
		$consulta=("INSERT INTO pasteles_pedido (cantidad_pasteles_pedido, rebanadas_pasteles_pedido, pasteles_venta_idpasteles_venta, pedido_idpedido)VALUES (\"".$cantidad."\", \"".$rebanadas."\", \"".$id_pastelesVenta."\", \"".$idPedido."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//
//===============================PASTELES VENTA===========================
//para insertar pasteles para la venta
	public function postPastelesVenta($nombre, $precio, $descripcion, $fotografia,$idOcasion){
		$consulta=("INSERT INTO pasteles_venta (nombre_pasteles_venta, precio_pasteles_venta, descripcion_pasteles_venta, fotografia_pasteles_venta, ocasion_idocasion)VALUES (\"".$nombre."\", \"".$precio."\", \"".$descripcion."\", \"".$fotografia."\", \"".$idOcasion."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//
//================================PEDIDOS================================
//funcion para insertar en Pedido	
	public function postPedido($fEntrega, $correo, $boleta, $idCliente){
		$consulta=("INSERT INTO pedido (fecha_entrega_pedido, correo_contacto_pedido, boleta_deposito_pedido, cliente_idcliente)VALUES (\"".$fEntrada."\", \"".$correo."\", \"".$boleta."\", \"".$idCliente."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//
//===========================Tipo Usuarios==============================
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
//insertar en usuarios
	public function postUsuario($nombre, $apellido, $direccion, $telefono, $nickname, $password, $idtipo_usuario){
		$consulta=("INSERT INTO tipo_usuario (nombre_usuario, apellido_usuario, direccion_usuario, telefono_usuario, nickname_usuario, pasword_usuario, tipo_usuario_idtipo_usuario)VALUES (\"".$nombre."\", \"".$apellido."\", \"".$direccion."\", \"".$telefono."\", \"".$nickname."\", \"".$password."\" , \"".$idtipo_usuario."\")");
		echo $consulta;
		$conn = new Connection();
		$tipo_usuario = mysqli_query($conn, $consulta);
		$conn->close();
	}

//
//insertar imagenes de pasteles
//============================insertar imagenes de pasteles=============
	public function postFotografia($fotografia,$idPasteles){
		$consulta = ("INSERT INTO fotografias_pasteles(fotografia_p,pasteles_venta_idpasteles_venta) VALUES (\"".$fotografia."\", \"".$idPasteles."\")");
		echo $consulta;
		$conn = new Connection();
		$fotografia = mysqli_query($conn, $consulta);
		$conn->close();
	}

//
//========================VALIDAR PEDIDO================================
//funcion para insertar en la tabla Validar pedido
	public function postValidarPedido($estado, $idUsuario, $idPedido){
		$consulta=("INSERT INTO valiar_pedido (estado_validar_pedido, usuario_idusuario, pedido_idpedido)VALUES (\"".$estado."\", \"".$idUsuario."\", \"".$idPedido."\")");
		echo $consulta;
		$db = new Connection();
		$cliente = $db->executeQuery($consulta);
	}
//
//
//funcion para actualizar datos 
	public function actualizarUsuario($tabla, $campo, $nuevoValor, $id)
	{
		$consulta = "UPDATE ".$tabla." SET ".$tabla."_".$campo."= ".$nuevoValor." WHERE "."id".$tabla."=".$id.";";
		echo $consulta;
		$db = new Connection();
		$administradorP =$db->executeQuery($consulta);
	}
//
//funcion para eliminar
	public function eliminarTabla($id, $tabla)
	{
		$consulta="DELETE FROM ".$tabla."  WHERE  id".$tabla." =".$id.";";
		echo $consulta;
		$db = new Connection();
		$administradorP =$db->executeQuery($consulta);
	}
//
//funcion para seleccionar las tablas 
	public function getRegistrosTabla($tabla){
		$consulta="SELECT * FROM ".$tabla.";";
        $db = new Connection();
		
		if($result = $db->executeQuery($consulta)){
			$total_rows = $result->num_rows;
			
					if($total_rows > 0){
						// Hace el rrecorrido por el array de datos y lo guarda en la variable $rows
						while ($rows[] = $result->fetch_assoc());
					}
					else{
						$rows[] = null;	
					}
		}
		else{
			$rows[] = null;
		}

		        // Retorna el resultado obtenido
        return $rows;
	}
//funcion para realizar busqueda dentro de las tablas
	public function getRegistrosTablaValor($tabla,$columna,$valor){
		$consulta='SELECT * FROM '.$tabla.' WHERE '.$columna.' = '.$valor.';';
		$db = new Connection();

	if($result = $db->executeQuery($consulta)){
		$total_rows = $result->num_rows;
		// Hace el rrecorrido por el array de datos y lo guarda en la variable $rows
		if($total_rows > 0){
			while ($rows[] = $result->fetch_assoc());
				
		}
			else{
			$rows[] = null;	
			}

	}
	else{
		$rows[] = null;
	}
		
		        // Retorna el resultado obtenido
      return $rows;
	}


}

/*


*/
?>