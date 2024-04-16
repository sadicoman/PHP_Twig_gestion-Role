let nouveauPassword = document.querySelector("#nouveauPassword");
let confirmNouveauPassword = document.querySelector("#confirmNouveauPassword");
let btnSubmit = document.querySelector("#btnSubmit");
let erreur = document.querySelector("#erreur");

nouveauPassword.addEventListener("input", verificationPassword);
confirmNouveauPassword.addEventListener("input", verificationPassword);

function verificationPassword() {
	if (nouveauPassword.value === confirmNouveauPassword.value) {
		btnSubmit.disabled = false;
		erreur.classList.add("d-none");
	} else {
		btnSubmit.disabled = true;
		erreur.classList.remove("d-none");
	}
}
