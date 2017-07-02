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
		$tabla		= "biblioteca";
		$campos		= "nombreBiblioteca";
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
		$tabla		= "biblioteca";
		$campos		= "nombreBiblioteca  = '$txtNombre'";
		$condicion	= "idBiblioteca = $hCodigo";
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
	$tabla = "biblioteca";
	$condicion = "idBiblioteca =".$hCodigo;
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
    
        $cantidad_por_pagina=25;

	//Numero de registros encontrados 
	$sqlMostrar ='SELECT * FROM biblioteca';
	$rsMostrar = $bdConexion->ejecutarSql($sqlMostrar);
	$cantidad_de_registros = mysqli_num_rows($rsMostrar);

	//Numero total de paginas
	$num = ceil($cantidad_de_registros / $cantidad_por_pagina);

	//Numero de pagina en la que se encuentra el usuario
	if (!isset($_GET['pag'])) { $pag = 1;} else {$pag = $_GET['pag'];}
	if ($pag == ""){$pag = 1;}
        
	//Determina el primer indice en el limit sql 
	$primer_indice = ($pag-1)*$cantidad_por_pagina;

	print '	<thead >
	            <tr>
	                <th>Código</th>
	                <th>Nombre</th>
	                <th style="text-align: center;">Acciones</th> 
	            </tr>
       		 </thead>';
	//Muestran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tbody>
            	<tr>
				<td>".$fila['idBiblioteca']."</td>
				<td>".$fila['nombreBiblioteca']."</td>
				<td style='text-align: center;'>
					<a data-toggle='confirmation' data-title='¿Está seguro de actualizar este registro?' data-btn-ok-label='Si' 
                                           data-btn-ok-icon='glyphicon glyphicon-ok' data-btn-ok-class='btn-success' 
                                           data-btn-cancel-label='No' data-btn-cancel-icon='glyphicon glyphicon-remove'
                                           data-btn-cancel-class='btn-danger' href='frmBiblioteca.php?accion=update&hCodigo=".$fila['idBiblioteca']."&txtNombre=".$fila['nombreBiblioteca']."'>
					<button type='submit' class='btn btn-warning boton' id='btnEditar'>Editar</button>
					</a>
					<a data-toggle='confirmation' data-title='¿Está seguro de eliminar este registro?' data-btn-ok-label='Si' 
                                           data-btn-ok-icon='glyphicon glyphicon-ok' data-btn-ok-class='btn-success' 
                                           data-btn-cancel-label='No' data-btn-cancel-icon='glyphicon glyphicon-remove'
                                           data-btn-cancel-class='btn-danger' href='tblBiblioteca.php?accion=delete&hCodigo=".$fila['idBiblioteca']."&txtNombre=".$fila['nombreBiblioteca']."'>
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
                        {print'<li><a id="pag" class="fa fa-angle-double-left" href="tblBiblioteca.php?pag=' . ($pag-5).'"></a></li>';}	
			print '<li><a id="pag" class=" 	fa fa-angle-left" href="tblBiblioteca.php?pag=' . ($pag-1) . '"></a></li>';
		}

	       	print '<li><a id="link" href="tblBiblioteca.php?pag=' . $pag . '">' . $pag .' / '. $num .'</a></li>';	

		if($pag<$num)
		{
                      print'<li><a id="pag" class=" 	fa fa-angle-right" href="tblBiblioteca.php?pag=' . ($pag+1).'"></a></li>';
                      
                      if ($pag>=$num-5)
                      {
                        $n = $num-$pag;
			print'<li><a id="pag" class="fa fa-angle-double-right" href="tblBiblioteca.php?pag=' . ($pag+$n).'"></a></li>'; 
                      }
                        else
                        {
                            print'<li><a id="pag" class="fa fa-angle-double-right" href="tblBiblioteca.php?pag=' . ($pag+5).'"></a></li>';
                        }
                        
                      }
	
	print '</ul></td></tr></tbody>';
}//Fin del metodo mostrar
?>