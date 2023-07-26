<?php

require_once "ConexionBD.php";

class ProveedoresM extends ConexionBD
{

	/* -------------------------------------------------------------------------- */
	/*                              Ver los Usuarios                              */
	/* -------------------------------------------------------------------------- */
	/* -------------------------------------------------------------------------- */
	/*                 Funcion statica por que llevara parametros                 */
	/* -------------------------------------------------------------------------- */
	static public function VerProveedoresM($tablaBD)
	{
		/* -------------------------------------------------------------------------- */
		/*                          crearemos la variable pdo                         */
		/* -------------------------------------------------------------------------- */

		$pdo = ConexionBD::cBD()->prepare("SELECT id,nombre_prov,rfc,direccion,telefono,atn,email FROM $tablaBD WHERE  estado = 1");
		/* -------------------------------------------------------------------------- */
		/*           variable pdo para que se nos ejecute la consulta SELECT          */
		/* -------------------------------------------------------------------------- */
		$pdo->execute();
		/* -------------------------------------------------------------------------- */
		/*     retornamos el pdo con un fetchAll() para mostrar todos los usuarios    */
		/* -------------------------------------------------------------------------- */
		return $pdo->fetchAll();
		/* -------------------------------------------------------------------------- */
		/*                        Cerramos la conexion de la BD                       */
		/* -------------------------------------------------------------------------- */
		$pdo->close();
	}

	/* -------------------------------------------------------------------------- */
	/*                      Consulta de proveedores combobox                      */
	/* -------------------------------------------------------------------------- */
	static public function VercombProveedoresM($tablaBD, $item, $valor)
	{

		if ($item != null) {

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item AND estado = 1");

			$pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo->fetch();
		} else {

			$pdo = ConexionBD::cBD()->prepare("SELECT* FROM $tablaBD WHERE estado = 1");

			$pdo->execute();

			return $pdo->fetchAll();
		}

		$pdo->close();
		$pdo = null;
	}

	/* -------------------------------------------------------------------------- */
	/*                             Agregar Proveedores                            */
	/* -------------------------------------------------------------------------- */
	static public function AgregarProveedorM($tablaBD, $datosC)
	{

		$pdo = ConexionBD::cBD()->prepare("INSERT INTO $tablaBD (familia_prov,nombre_prov,razon_sprov,rfc,act_comercial_prov,direccion,catalogo_servicio_prov,autorizacion_pago_prov,telefono,atn,email,pag_web_prov,estado) VALUES (:familia_prov,:nombre_prov,:razon_sprov,:rfc,:act_comercial_prov,:direccion,:catalogo_servicio_prov,:autorizacion_pago_prov, :telefono, :atn, :email,:pag_web_prov, 1)");

		/* -------------------------------------------------------------------------- */
		/*                            enlazamos parametros                            */
		/* -------------------------------------------------------------------------- */
		$pdo->bindParam(":familia_prov", $datosC["familia_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":nombre_prov", $datosC["nombre_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":razon_sprov", $datosC["razon_sprov"], PDO::PARAM_STR);
		$pdo->bindParam(":rfc", $datosC["rfc"], PDO::PARAM_STR);
		$pdo->bindParam(":act_comercial_prov", $datosC["act_comercial_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo->bindParam(":catalogo_servicio_prov", $datosC["catalogo_servicio_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":autorizacion_pago_prov", $datosC["autorizacion_pago_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
		$pdo->bindParam(":atn", $datosC["atn"], PDO::PARAM_STR);
		$pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo->bindParam(":pag_web_prov", $datosC["pag_web_prov"], PDO::PARAM_STR);


		/* -------------------------------------------------------------------------- */
		/*utilizaremos una condicion si nuestra variable pdo se nos ejecula vamos a 
										retornar verdadero
																		              */
		/* -------------------------------------------------------------------------- */

		if ($pdo->execute()) {
			return true;
			/* -------------------------------------------------------------------------- */
			/*                 si no se cumple que nos retorne como falso                 */
			/* -------------------------------------------------------------------------- */
		} else {
			return false;
		}

		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo->close();
		$pdo = null;
	}

	/* -------------------------------------------------------------------------- */
	/*                            ELIMINAR PROVEEDORES                            */
	/* -------------------------------------------------------------------------- */
	static public function BorrarProveedoresM($tablaBD, $datosC)
	{

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET estado = 0  WHERE id= :id");

		$pdo->bindParam(":id", $datosC, PDO::PARAM_INT);


		if ($pdo->execute()) {
			return true;
			/* -------------------------------------------------------------------------- */
			/*                 si no se cumple que nos retorne como falso                 */
			/* -------------------------------------------------------------------------- */
		} else {
			return false;
		}

		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo->close();
		$pdo = null;
	}

	/* -------------------------------------------------------------------------- */
	/*                             Llamar Proveedores                             */
	/* -------------------------------------------------------------------------- */
	static public function EProveedoresM($tablaBD, $item, $valor)
	{

		if ($item != null) {

			$pdo = ConexionBD::cBD()->prepare("SELECT * FROM $tablaBD WHERE $item = :$item");

			$pdo->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$pdo->execute();

			return $pdo->fetch();
		} else {

			$pdo = ConexionBD::cBD()->prepare("SELECT* FROM $tablaBD WHERE estado = 1");

			$pdo->execute();

			return $pdo->fetchAll();
		}
		$pdo->close();
		$pdo = null;
	
	}

	/* -------------------------------------------------------------------------- */
	/*                           Actualizar proveedores                           */
	/* -------------------------------------------------------------------------- */
	static public function ActualizarProveedoresM($tablaBD, $datosC)
	{

		$pdo = ConexionBD::cBD()->prepare("UPDATE $tablaBD SET familia_prov = :familia_prov, nombre_prov = :nombre_prov, razon_sprov = :razon_sprov, rfc = :rfc, 
		 act_comercial_prov = :act_comercial_prov, atn = :atn ,email = :email, pag_web_prov = :pag_web_prov,  telefono = :telefono
		 ,direccion = :direccion, catalogo_servicio_prov = :catalogo_servicio_prov, autorizacion_pago_prov = :autorizacion_pago_prov,
		 otros = :otros WHERE id = :id");

		$pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
		$pdo->bindParam(":familia_prov", $datosC["familia_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":nombre_prov", $datosC["nombre_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":razon_sprov", $datosC["razon_sprov"], PDO::PARAM_STR);
		$pdo->bindParam(":rfc", $datosC["rfc"], PDO::PARAM_STR);
		$pdo->bindParam(":act_comercial_prov", $datosC["act_comercial_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":atn", $datosC["atn"], PDO::PARAM_STR);
		$pdo->bindParam(":email", $datosC["email"], PDO::PARAM_STR);
		$pdo->bindParam(":pag_web_prov", $datosC["pag_web_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
		$pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo->bindParam(":catalogo_servicio_prov", $datosC["catalogo_servicio_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":autorizacion_pago_prov", $datosC["autorizacion_pago_prov"], PDO::PARAM_STR);
		$pdo->bindParam(":otros", $datosC["otros"], PDO::PARAM_STR);


		if ($pdo->execute()) {
			return true;
			/* -------------------------------------------------------------------------- */
			/*                 Si no se cumple que nos retorne como falso                 */
			/* -------------------------------------------------------------------------- */
		} else {
			return false;
		}
		/* -------------------------------------------------------------------------- */
		/*                          Cerramos conexion de pdo                          */
		/* -------------------------------------------------------------------------- */
		$pdo->close();
		$pdo = null;
	}
}
