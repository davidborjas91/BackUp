<?php
	session_start();/*agregado*/
	include 'conexion.php';	
	try 
	{		
		$conex = new db($_SESSION['user'],$_SESSION['pass'],$_SESSION['server'],$_SESSION['bdd'],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
		
		$ident=$_POST['x1'];//agregado
		if ($ident=="") {
			$sp_name = "SELECT 
						e.d_agencia, 
						cast(a.f_mov as date)as f_mov, 
						c.d_asoc_negocio, 
						b.c_ahorro,
						cast((a.v_monto_mov/0.002)as decimal(18,2))as monto, 
						a.v_monto_mov
						FROM aho_mov_enc a 
						INNER JOIN aho_cta_enc b ON a.c_ahorro=b.c_ahorro
						INNER JOIN adm_asoc_negocio c ON b.c_asoc_negocio=c.c_asoc_negocio
						INNER JOIN aho_retencion_tasa d ON b.c_asoc_negocio=d.c_asoc_negocio
						INNER JOIN cre_agencia e ON d.c_agencia=e.c_agencia
						WHERE a.c_tipo_mov='S'";
			$query_1 = $conex->getFilas($sp_name, array());
		}else{
			$sp_name = "SELECT 
						e.d_agencia, 
						cast(a.f_mov as date)as f_mov, 
						c.d_asoc_negocio, 
						b.c_ahorro,
						cast((a.v_monto_mov/0.002)as decimal(18,2))as monto, 
						a.v_monto_mov
						FROM aho_mov_enc a 
						INNER JOIN aho_cta_enc b ON a.c_ahorro=b.c_ahorro
						INNER JOIN adm_asoc_negocio c ON b.c_asoc_negocio=c.c_asoc_negocio
						INNER JOIN aho_retencion_tasa d ON b.c_asoc_negocio=d.c_asoc_negocio
						INNER JOIN cre_agencia e ON d.c_agencia=e.c_agencia
						WHERE a.c_tipo_mov='S' AND b.c_ahorro = ?";
			$query_1 = $conex->getFilas($sp_name, array($ident));
		}

		$data = array('cuentas' => $query_1);
		$conex->desconectar();
		echo json_encode($data);
		
	}catch(PDOException $e) {
		$conex->desconectar();
		echo json_encode($e->getMessage());
	}
?>