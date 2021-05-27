function check(){
	user = document.getElementById('usuari').value;
	console.log(user);
	checkuser(user);
}

function checkuser(user) {
	$("#preloader").show(); //mostrem el gif de preloader
	return $.ajax({ //ajax
		url: "checkuser.php", //l'arxiu php que valida
		data: {usuari:user}, //el nom de l'usuari
		type: "POST", //tipus d'enviament (POST)

		success: function(resposta){ //si es correcte la resposta de checkuser.php
			if (resposta == "disponible"){ //si checkuser.php diu: disponible
				$("#missatge").html("<span class='disponible'>usuari disponible</span>"); //mostrem missatge
				$("#enviar").html("<input type='submit'>"); //mostrem input d'enviament
				$("#preloader").hide(); //amaguem el preloader
			}else{ //so e checkuser.php diu: no disponible
				$("#missatge").html("<span class='no-disponible'>usuari no disponible</span>"); //mostrem missatge
				$("#enviar").html(""); //eliminem botó d'enviament
				$("#preloader").hide(); //amaguem el preloader
			}
		},
		error:function (){
		}
	});
}

