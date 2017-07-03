$(document).ready(function(){
        verlistado();
    //CARGAMOS EL ARCHIVO QUE NOS LISTA LOS REGISTROS, CUANDO EL DOCUMENTO ESTA LISTO
})
function verlistado(){ //FUNCION PARA MOSTRAR EL LISTADO EN EL INDEX POR JQUERY
              
            var randomnumber=Math.random()*11;
			var tabla = document.getElementById('tabla').value;
            var  id = document.getElementById('id').value;
            $.post("../procesos/listarDatos.php", {
                randomnumber:randomnumber,
                tabla : tabla , id:id
            }, function(data){
              $("#contenido").html(data);
            });
}
