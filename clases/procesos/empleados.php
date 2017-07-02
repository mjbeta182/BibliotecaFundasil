<?php
include('../clases/conexion.php');
$hCodigo = (isset($_REQUEST['hCodigo'])?$_REQUEST['hCodigo']:null);
$txtNombre = (isset($_REQUEST['txtNombre'])?$_REQUEST['txtNombre']:null);
$txtFechaNac = (isset($_REQUEST['txtFechaNac'])?$_REQUEST['txtFechaNac']:null);
$txtDireccion = (isset($_REQUEST['txtDireccion'])?$_REQUEST['txtDireccion']:null);
$txtTelefono = (isset($_REQUEST['txtTelefono'])?$_REQUEST['txtTelefono']:null);
$txtDui = (isset($_REQUEST['txtDui'])?$_REQUEST['txtDui']:null);
$accion   	= (isset($_REQUEST['accion'])?$_REQUEST['accion']:'insert');
$txtBuscar 	= (isset($_REQUEST['txtBuscar'])?$_REQUEST['txtBuscar']:null);

if (isset($_REQUEST['btnGuardar']))
{
		if ($accion=='insert')
		{
		$tabla		= "persona";
		$campos		= "nombre, fechaNacimiento, direccion, telefono";
		$valores	= "'$txtNombre', '$txtFechaNac', '$txtDireccion', '$txtTelefono'";
		$bdConexion->insertarDB($tabla,$campos,$valores);
                $hCodigo = $bdConexion->retornarId();
                
                    if($hCodigo>0)
			{
				$tabla		= "empleado";
				$campos		= "idPersona, dui";
				$valores	= "'$hCodigo', '$txtDui'";
				$bdConexion->insertarDB($tabla,$campos,$valores);
			}
                
                print "<div class='container'>
                        <div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>¡Éxito!</strong> Registro guardado de forma exitosa.
                        </div>
                       </div>";
		}
		if ( $_REQUEST['accion']== 'update')
		{
		$tabla		= "persona";
		$campos		= "nombre  = '$txtNombre', fechaNacimiento = '$txtFechaNac', direccion = '$txtDireccion', telefono = '$txtTelefono'";
		$condicion	= "idPersona = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
                
                $tabla		= "empleado";
		$campos		= "dui  = '$txtDui'";
		$condicion	= "idPersona = $hCodigo";
		$bdConexion->actualizarDB($tabla,$campos,$condicion);
                
                print "<div class='container'>
                        <div class='alert alert-success alert-dismissable'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <strong>¡Éxito!</strong> Registro modificado de forma exitosa.
                        </div>
                       </div>";
		}
}//Fin de boton Guardar

if (isset($_REQUEST['accion']) and $_REQUEST['accion']=='delete' and isset($_REQUEST['hCodigo']))
{
        $delete = $_REQUEST['hCodigo'];
	$tabla = "empleado";
	$condicion = "idPersona =".$hCodigo;
	$bdConexion->eliminarDB($tabla,$condicion);
        
        $hCodigo = $_REQUEST['hCodigo'];
	$tabla = "persona";
	$condicion = "idPersona =$hCodigo";
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
	$cantidad_por_pagina=25;

	//Numero de registros encontrados 
	$sqlMostrar ='SELECT p.idPersona, p.nombre, p.fechaNacimiento, p.direccion, p.telefono, e.dui '
                . 'FROM persona p INNER JOIN empleado e ON p.idPersona = e.idPersona';
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
                        <th>Fecha de nacimiento</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>DUI</th>
	                <th style="text-align: center;">Acciones</th> 
	            </tr>
       		 </thead>';
	//Muestran detalle de registros
	while($fila = mysqli_fetch_array($rsMostrar))
	{
		print "<tbody>
                        <tr>
                            <td>".$fila['idPersona']."</td>
                            <td>".$fila['nombre']."</td>
                            <td>".$fila['fechaNacimiento']."</td>
                            <td>".$fila['direccion']."</td>
                            <td>".$fila['telefono']."</td>
                            <td>".$fila['dui']."</td>
                            <td style='text-align: center;'>
				<a data-toggle='confirmation' data-title='¿Está seguro de actualizar este registro?' data-btn-ok-label='Si' 
                                           data-btn-ok-icon='glyphicon glyphicon-ok' data-btn-ok-class='btn-success' 
                                           data-btn-cancel-label='No' data-btn-cancel-icon='glyphicon glyphicon-remove'
                                           data-btn-cancel-class='btn-danger' href='frmEmpleados.php?accion=update&hCodigo=".$fila['idPersona']."&txtNombre=".$fila['nombre']."&txtFechaNac=".$fila['fechaNacimiento']."&txtDireccion=".$fila['direccion']."&txtTelefono=".$fila['telefono']."&txtDui=".$fila['dui']."'>
                                    <button type='submit' class='btn btn-warning boton' id='btnEditar'>Editar</button>
				</a>
				<a data-toggle='confirmation' data-title='¿Está seguro de eliminar este registro?' data-btn-ok-label='Si' 
                                           data-btn-ok-icon='glyphicon glyphicon-ok' data-btn-ok-class='btn-success' 
                                           data-btn-cancel-label='No' data-btn-cancel-icon='glyphicon glyphicon-remove'
                                           data-btn-cancel-class='btn-danger' href='tblEmpleados.php?accion=delete&hCodigo=".$fila['idPersona']."&txtNombre=".$fila['nombre']."'>
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
                        {print'<li><a id="pag" class="fa fa-angle-double-left" href="tblLibrera.php?pag=' . ($pag-5).'"></a></li>';}	
			print '<li><a id="pag" class=" 	fa fa-angle-left" href="tblLibrera.php?pag=' . ($pag-1) . '"></a></li>';
		}

	       	print '<li><a id="link" href="tblLibrera.php?pag=' . $pag . '">' . $pag .' / '. $num .'</a></li>';	

		if($pag<$num)
		{
                      print'<li><a id="pag" class=" fa fa-angle-right" href="tblLibrera.php?pag=' . ($pag+1).'"></a></li>';
                      
                      if ($pag>=$num-5)
                      {
                        $n = $num-$pag;
			print'<li><a id="pag" class="fa fa-angle-double-right" href="tblLibrera.php?pag=' . ($pag+$n).'"></a></li>'; 
                      }
                        else
                        {
                            print'<li><a id="pag" class="fa fa-angle-double-right" href="tblLibrera.php?pag=' . ($pag+5).'"></a></li>';
                        }
                      }
	
	print '</ul></td></tr></tbody>';
        
}//Fin del metodo mostrar
?>