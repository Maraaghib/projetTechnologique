var telPerso = document.getElementById("telPerso");
var telPersoDiv = document.getElementById("telPersoDiv");
var telDivClassName = telPersoDiv.className;
var confirmPasswordDiv = document.getElementById("confirmPasswordDiv");
var confPswDivClassName = confirmPasswordDiv.className;
var password = document.getElementById("password");
var confirmPassword = document.getElementById("confirmPassword");

// Créer deux fonctions respectivement pour les blocc if (success) et pour les blocs else (error)

function inputValidation(type){
	if(type == "confirmPassword") {
		if(password.value != confirmPassword.value) {
			confirmPassword.setCustomValidity("Les mots de passe ne correspondent pas");
			confirmPasswordDiv.className = confPswDivClassName + " has-error";
			document.getElementById("helpConfirmPassword").innerHTML = "Ces mots de passe ne correspondent pas";
			$(function () {
				$('[data-toggle="popover"]').popover()
			})
			confirmPassword.setAttribute("data-toggle", "popover");
			confirmPassword.setAttribute("title", "Confirmation mot de passe");
			confirmPassword.setAttribute("data-content", "Ces mots de passe ne correspondent pas");
			confirmPassword.setAttribute("aria-describedly", "helpConfirmPassword");
			//confirmPassword.focus(); // Placer le focus dans ce champ
		}else {
			confirmPassword.setCustomValidity("");
			confirmPasswordDiv.className = confPswDivClassName + " has-success";
			document.getElementById("helpConfirmPassword").innerHTML = "";
			$('#confirmPassword').popover('destroy');
			confirmPassword.removeAttribute("data-toggle");
			confirmPassword.removeAttribute("title");
			confirmPassword.removeAttribute("data-content");
			confirmPassword.removeAttribute("aria-describedly");
			confirmPassword.removeAttribute("data-original-title");
		}
	}

	if (type == "tel") {
		if (telPerso.value.substring(0, 1) != "0") {
			telPerso.setCustomValidity("Le numéro doit commencer par 0");
			telPersoDiv.className = telDivClassName + " has-error";
			document.getElementById("helpTel").innerHTML = "Le numéro doit commencer par 0";
			$(function () {
				$('[data-toggle="popover"]').popover()
			})
			telPerso.setAttribute("data-toggle", "popover");
			telPerso.setAttribute("title", "Numéro de téléphone");
			telPerso.setAttribute("data-content", "Veuillez entrer le bon format d'un numéro de téléphone");
			telPerso.setAttribute("aria-describedly", "helpTel");
		}
		else if (telPerso.value.length != 10) {
			telPerso.setCustomValidity("Le numéro doit être composé de 10 chiffres");
			telPersoDiv.className = telDivClassName + " has-error";
			document.getElementById("helpTel").innerHTML = "Le numéro doit être composé de 10 chiffres";
			$(function () {
				$('[data-toggle="popover"]').popover()
			})
			telPerso.setAttribute("data-toggle", "popover");
			telPerso.setAttribute("title", "Numéro de téléphone");
			telPerso.setAttribute("data-content", "Veuillez entrer le bon format d'un numéro de téléphone");
			telPerso.setAttribute("aria-describedly", "helpTel");
		}
		else {
			telPerso.setCustomValidity("");
			telPersoDiv.className = telDivClassName + " has-success";
			document.getElementById("helpTel").innerHTML = "";
			$('#telPerso').popover('destroy');
			telPerso.removeAttribute("data-toggle");
			telPerso.removeAttribute("title");
			telPerso.removeAttribute("data-content");
			telPerso.removeAttribute("aria-describedly");
			telPerso.removeAttribute("data-original-title");
		}
	}

}
