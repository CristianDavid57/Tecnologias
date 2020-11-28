

// JQUERY - Ante el evento de hacer click en la opción Mapa, se llama la función de inicializar mapa.	
$(function(){
    $("a[href='#Maps']").on('shown.bs.tab', function() {
        console.log("Aqui");
        //initMap();
    });
});	
$(document).ready(function(){
	$("#FormR").submit(function(event){
		console.log("entro");
		event.preventDefault();
		submitFormInsert();
	});
});
function submitFormInsert(){
    var name = $("#name").val();
    var lastname = $("#lastname").val();
    var adress = $("#adress").val();
    var phone = $("#phone").val();
    var age = $("#age").val();
    var email = $("#email").val();
    var user = $("#phone").val();
    var pass = $("#pass").val();
    var confirm =$("#confirmed").val();
    var object = {"Nombre":name,"Apellido":lastname,"Direccion":adress,"Celular":phone,"Edad":age ,"Email":email,"Usuario":user, "Contrasena":pass}
    if(confirm === pass){
    fetch('http://localhost/Tostao/Conexion.php',{
	method:	'POST',
	headers:{
		'Content-Type' : 'application/json'
	},
	body: JSON.stringify(object),
	cache: 'no-cache'
	
	}).then(function(response){
        console.log("entró");
        return response.text();
        
    }).then(function(){
			formSuccess();
	}).catch(function(err){
		console.error(err);
    });
    }
    else{
        alert("Error su contraseña no coincide");
    }
}
function formSuccess(){
    alert("Datos almacenados");
}
$("#Verifica").click(function() {
    var email = $("#IngreEmail").val();
    var contra = $("#IngreContra").val();
    console.log(email);
    if (email !== "" && contra !== ""){
    submitConsulta();
    }
    else{alert("Por favor rellenar los campos");}
});
function submitConsulta(){
    var email = $("#IngreEmail").val();
    var contra = $("#IngreContra").val();
    object = {"email":email, "contra":contra};
	console.log("Entró a llamar");
	fetch('http://localhost/Tostao/Consulta.php',{
	method:	'POST',
	headers:{
		'Content-Type' : 'application/json'
	}
	}).then(response => response.json())
        .then(result => {
            if (result.length > 0) {
                cargarDatos(result);
            } else {
                console.log(JSON.stringify(result));
            }
        })
        .catch(error => console.log('error: ' + error));
    }
    function cargarDatos(data){
        var rows = "";
        
            rows = "";
 
        alert("buena pa");
        
    }
$('.carousel').carousel();


