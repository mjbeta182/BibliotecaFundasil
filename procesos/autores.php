<?php
include('../clases/conexion.php');
$hCodigo = (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNombre = (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert');
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		$tabla		= "autor";
		$campos		= "nombreAutor";
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
		$tabla		= "autor";
		$campos		= "nombreAutor  = '$txtNombre'";
		$condicion	= "idAutor = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
                print "<div class='container'>
                        <div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>¡Éxito!</strong> Registro modificado de forma exitosa.
                        </div>
                       </div>";
		}
}//Fin de boton Guardar

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='editar')
{
	$accion = 'update';
}

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='eliminar')
{
	$tabla = "autor";
	$condicion = "idAutor =".$hCodigo;
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
	$cantidad_por_pagina= 25;

	//Numero de registros encontrados 
	$sqlMostrar ='SELECT * FROM autor';
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	$cantidad_de_registros = mysqli_num_rows($rsMostrar);

	//Numero total de paginas
	$num = ceil($cantidad_de_registros / $cantidad_por_pagina);

	//Numero de pagina en la que se encuentra el usuario
	if (!isset($_GET['pag'])) { $pag = 1;} else {$pag = $_GET['pag'];}
        if ($pag == ""){$pag = 1;}
        
	//Determina el primer indice en el limit sql 
	$primer_indice = ($pag-1)*$cantidad_por_pagina;

	//Devuelve los resultados de la base de datos que se mostraran en la pagina
	$sqlMostrar='SELECT * FROM autor LIMIT ' . $primer_indice . ',' .  $cantidad_por_pagina;
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
				<td>".$fila['idAutor']."</td>
				<td>".$fila['nombreAutor']."</td>
				<td style='text-align: center;'>
					<a href='frmAutores.php?accion=editar&hCodigo=".$fila['idAutor']."&txtNombre=".$fila['nombreAutor']."'>
					<button type='submit' class='btn btn-warning boton' id='btnEditar'>Editar</button>
					</a>
					<a href='tblAutores.php?accion=eliminar&hCodigo=".$fila['idAutor']."&txtNombre=".$fila['nombreAutor']."' onclick='return confirmDelete();'>
					<button type='submit' class='btn btn-danger boton'>Eliminar</button>
					</a>
				</td>
			   </tr> 
			   </tbody>";
	}//Fin While
        //Despliega los links para paginacion
	print'<tr><td colspan="4" id="pagination"><ul class="pagination">';

		if($pag>1 && $pag>0)
		{
                        if($pag>5)
                        {print'<li><a id="pag" class="fa fa-angle-double-left" href="tblAutores.php?pag=' . ($pag-5).'"></a></li>';}	
			print '<li><a id="pag" class=" 	fa fa-angle-left" href="tblAutores.php?pag=' . ($pag-1) . '"></a></li>';
		}

	       	print '<li><a id="link" href="tblAutores.php?pag=' . $pag . '">' . $pag .' / '. $num .'</a></li>';	

		if($pag<$num)
		{
                      print'<li><a id="pag" class=" fa fa-angle-right" href="tblAutores.php?pag=' . ($pag+1).'"></a></li>';
                      
                      if ($pag>=$num-5)
                      {
                        $n = $num-$pag;
			print'<li><a id="pag" class="fa fa-angle-double-right" href="tblAutores.php?pag=' . ($pag+$n).'"></a></li>'; 
                      }
                        else
                        {
                            print'<li><a id="pag" class="fa fa-angle-double-right" href="tblAutores.php?pag=' . ($pag+5).'"></a></li>';
                        } 
                      }
	print '</ul></td></tr></tbody>';
}//Fin del metodo mostrar

?>

