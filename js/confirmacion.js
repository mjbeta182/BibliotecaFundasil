function confirmDelete() {
    return confirm("¿Está seguro de eliminar el registro?");
}//Fin funcion confirm

function confirmUpdate() {
    var accion = $('#accion').val();
  
    if (accion == "update"){
	 return confirm("¿Desea actualizar el registro seleccionado?");
    }
}//Fin funcion confirmUpdate

