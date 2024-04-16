let btnModifMail = document.querySelector("#btnModifMail");
let btnValidModifMail = document.querySelector("#btnValidModifMail");
let divMail = document.querySelector("#mail");
let divModificationMail = document.querySelector("#modificationMail");
let btnSupCompte = document.querySelector("#btnSupCompte");
let suppressionCompte = document.querySelector("#suppressionCompte");

btnModifMail.addEventListener("click", function () {
	divMail.classList.add("d-none");
	divModificationMail.classList.remove("d-none");
});

btnSupCompte.addEventListener("click", function () {
	suppressionCompte.classList.remove("d-none");
});
