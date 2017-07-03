<?php

class plantilla 
{
	
	function __construct()
	{
		# code...
	}

	function header()
	{
		print '
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
            <title>Biblioteca FUNDASIL</title>

            <!-- Archivos de Estilo css -->
            <link rel="stylesheet" href="../css/estilo.css">
            <link rel="stylesheet" href="../css/shop-homepage.css" >
            <link rel="stylesheet" href="../css/bootstrap.min.css" >
           

             <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            <script src="../js/funciones.js"></script>
             <script src="../js/bootstrap.js"></script>
            
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

             <!-- Librerias js -->
            <script src="../js/jquery.js"></script>

              <!-- Latest compiled and minified CSS -->
             <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/
             3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


               <!-- Latest compiled and minified JavaScript -->
             <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
            <!-- Llamado y opciones de librerías -->
             <script src="../js/script.js"></script>

             <!-- Librería datepicker -->
             <script src="../libs/bootstrap-datepicker/js/bootstrap-datepicker.js" charset="UTF-8"></script>

             <!-- Formato español para datepicker -->
             <script src="../libs/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>

             <!-- Librería confirmation -->
             <script src="../libs/bootstrap-confirmation/bootstrap-confirmation.js"></script>

             <!-- Tema para datepicker -->
             <link rel="stylesheet" href="../libs/bootstrap-datepicker/css/bootstrap-datepicker.css">

               <!-- Librerias para DataTables -->
            <script type="text/javascript"  src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript"  src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
              
   		 </head>';
	}

	function barraNavegacion()
	{
		print'
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    		<div class="container">
    			<div class="navbar-header">
    				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
    					<span class="sr-only">Toggle navigation</span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
    				<a class="navbar-brand" href="#">Inicio  <span class="fa fa-home"></a>
    		</div>
    		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
                        <a href="#">Prestamos  <span class="fa fa-list-alt"></span></a>
                    </li>
                    <li>
						<a href="#">Libros  <span class="fa fa-book"></span></a>
					</li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">Usuarios  <span class="fa fa-group"></span>
                        <strong class="caret "></strong></a>
                        <ul class="dropdown-menu" style="background:#1C1C1C;">
                            <li>
                                <a id="char" href="#">Empleados</a>
                            </li>
                            <li>
                                <a id="char" href="#">Lectores</a>
                            </li>
                        </ul>
					<li class="dropdown">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">Varios  <span class="   fa fa-th-list"></span><strong class="caret"></strong></a>
                        <ul class="dropdown-menu" style="background:#1C1C1C;">
                            <li >
                                <a id="char" href="#" >Autores</a>
                            </li>
                            <li>
                                <a id="char" href="#">Categorías</a>
                            </li>
                            <li>
                                <a id="char" href="#">Librera</a>
                            </li>
                            <li>
                                <a id="char" href="#">Estante</a>
                            </li>
                            <li>
                                <a id="char" href="#">Biblioteca</a>
                            </li>
                            <li>
                                <a id="char" href="#">Oficina</a>
                            </li>
                        </ul>
                    </li>
					<li>
						<a href="#">Ayuda <span class="fa fa-question-circle"></a>
					</li>
				</ul>
    		</div><!-- /.navbar-collapse -->
    		</div><!-- /.container -->
    	</nav>';
	}

	function footer()
	{
		print '
		<div class="container">
		    <hr>
			<footer>
				<div class="row">
					<div class="col-lg-12">
						<a href="http://www.fundasil.org"> <p>&copy; FUNDASIL 2017</p></a>
					</div>
				</div>
			</footer>
		</div><!-- /.container -->';
	}
}


?>