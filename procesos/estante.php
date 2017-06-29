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
		$tabla		= "estante";
		$campos		= "nombreEstante";
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
		$tabla		= "estante";
		$campos		= "nombreEstante  = '$txtNombre'";
		$condicion	= "idEstante = $hCodigo";
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
	$tabla = "estante";
	$condicion = "idEstante =".$hCodigo;
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
	$sqlMostrar ='SELECT * FROM estante';
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
                            <td>".$fila['idEstante']."</td>
                            <td>".$fila['nombreEstante']."</td>
                            <td style='text-align: center;'>
				<a href='frmEstante.php?accion=update&hCodigo=".$fila['idEstante']."&txtNombre=".$fila['nombreEstante']."'>
                                    <button type='submit' class='btn btn-warning boton' id='btnEditar'>Editar</button>
				</a>
				<a href='tblEstante.php?accion=delete&hCodigo=".$fila['idEstante']."&txtNombre=".$fila['nombreEstante']."' onclick='return confirmDelete();'>
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
                        {print'<li><a id="pag" class="fa fa-angle-double-left" href="tblEstante.php?pag=' . ($pag-5).'"></a></li>';}	
			print '<li><a id="pag" class=" 	fa fa-angle-left" href="tblEstante.php?pag=' . ($pag-1) . '"></a></li>';
		}

	       	print '<li><a id="link" href="tblEstante.php?pag=' . $pag . '">' . $pag .' / '. $num .'</a></li>';	

		if($pag<$num)
		{
                      print'<li><a id="pag" class=" fa fa-angle-right" href="tblEstante.php?pag=' . ($pag+1).'"></a></li>';
                      
                      if ($pag>=$num-5)
                      {
                        $n = $num-$pag;
			print'<li><a id="pag" class="fa fa-angle-double-right" href="tblEstante.php?pag=' . ($pag+$n).'"></a></li>'; 
                      }
                        else
                        {
                            print'<li><a id="pag" class="fa fa-angle-double-right" href="tblEstante.php?pag=' . ($pag+5).'"></a></li>';
                        }
                        
                      }
	
	print '</ul></td></tr></tbody>';
        
}//Fin del metodo mostrar
?>