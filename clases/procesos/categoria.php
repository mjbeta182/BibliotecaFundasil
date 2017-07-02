<?php
include('../clases/conexion.php');
// print 'holi';


$hCodigo	= (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNombre	= (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert');
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		$tabla		= "categoria";
		$campos		= "nombreCategoria";
		$valores	= "'$txtNombre'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
                print "<div class='container'>
                        <div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>¡Éxito!</strong> Registro guardado de forma exitosa.
                        </div>
                       </div>";
		}
		if ( $_REQUEST['accion']== 'update')
		{
		$tabla		= "categoria";
		$campos		= "nombreCategoria  = '$txtNombre'";
		$condicion	= "idCategoria = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
                print "<div class='container'>
                        <div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>¡Éxito!</strong> Registro modificado de forma exitosa.
                        </div>
                       </div>";
		}
}//Fin de boton Guardar

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='delete')
{
	$tabla = "categoria";
	$condicion = "idCategoria =".$hCodigo;
	$bdConexion->eliminarDB($tabla,$condicion);
        print "<div class='container'>
                        <div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>¡Éxito!</strong> Registro eliminado de forma exitosa.
                        </div>
                       </div>";
}//Fin de boton Eliminar

function mostrarDatos($bdConexion)
{



	//Cantidad de registros que se desea mostrar
	$cantidad_por_pagina= 10;

	//Numero de registros encontrados 
	$sqlMostrar ='SELECT * FROM categoria';
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	$cantidad_de_registros = mysqli_num_rows($rsMostrar);

	//Numero total de paginas
	$num = ceil($cantidad_de_registros / $cantidad_por_pagina);

	//Numero de pagina en la que se encuentra el usuario
	if (!isset($_GET['pag'])) { $pag = 1;} else {$pag = $_GET['pag'];}

	//Determina el primer indice en el limit sql 
	$primer_indice = ($pag-1)*$cantidad_por_pagina;

	//Devuelve los resultados de la base de datos que se mostraran en la pagina
	$sqlMostrar='SELECT * FROM categoria LIMIT ' . $primer_indice . ',' .  $cantidad_por_pagina;
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
        
	print '	<thead >
	            <tr>
	                <th>Código</th>
	                <th>Nombre </th>
	                <th style="text-align: center;">Acciones</th> 
	            </tr>
       		 </thead>';
	//Muestran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tbody>
            	<tr>
				<td>".$fila['idCategoria']."</td>
				<td>".$fila['nombreCategoria']."</td>
				<td style='text-align: center;'>
					<a href='frmCategoria.php?accion=update&hCodigo=".$fila['idCategoria']."&txtNombre=".$fila['nombreCategoria']."'>
					<button type='submit' class='btn btn-warning boton'>Editar</button>
					</a>
					<a href='tblCategoria.php?accion=delete&hCodigo=".$fila['idCategoria']."&txtNombre=".$fila['nombreCategoria']."' onclick='return confirmDelete();'>
					<button type='submit' class='btn btn-danger boton'>Eliminar</button>
					</a>
				</td>
			   </tr> 
			   </tbody>";
	}//Fin While
        //Despliega los links para paginacion
	print'<tr><td colspan="3" id="pagination"><ul class="pagination">';
	for ($pag=1;$pag<=$num;$pag++) {
	 print '<li><a id="link" href="tblCategoria.php?pag=' . $pag . '">' . $pag . '</a></li>';	
	}
        print'</ul></td></tr></tbody>';
}//Fin del metodo mostrar

?>
            