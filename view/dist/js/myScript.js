var password = document.getElementById("password")
var confirmPassword = document.getElementById("confirmPassword");
var telPerso = document.getElementById("telPerso");

function validatePassword(){
	if(password.value != confirmPassword.value) {
		confirmPassword.setCustomValidity("Les mots de passe ne correspondent pas");
	}else {
		confirmPassword.setCustomValidity('');
	}
	if (telPerso.value.length != 10) {
		telPerso.setCustomValidity("Le numéro doit être composé de 10 chiffres");	
	} 
	else {
		telPerso.setCustomValidity("");	
	}
}

telPerso.onkeyup = validatePassword;
password.onchange = validatePassword;
confirmPassword.onkeyup = validatePassword;