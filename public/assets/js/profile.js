(() => {
    'use strict';
  
    const form_change_password = document.querySelector('#form_change_password');
    
    form_change_password.addEventListener('submit', event => {
        if (!form_change_password.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form_change_password.classList.add('was-validated');
    }, false);
})();



async function paysFetch(){
    try {
      	let data_pays = await fetch('https://restcountries.com/v3.1/all');
     	if (!data_pays.ok) {
       		throw new Error(data_pays.status);
        }
        /* console.log(data); */
      	let reponse = await data_pays.json();
      	/* console.log(reponse); */
		optionPays(reponse);
	} catch(err) {
		console.log(err);
	}
}

paysFetch();


const listPays = document.querySelector("#list_pays");


function optionPays(pays) {

    pays.sort((a, b) => {
		const nameA = a.name.common;
		const nameB = b.name.common;
		return nameA.localeCompare(nameB);
	});

	pays.forEach(p => {
        nameCountry = p.name.common.replaceAll(' ', '&nbsp;');
        flagCountry = (p.flag + " " + p.name.common).replaceAll(' ', '&nbsp;');
		listPays.innerHTML += "<option value=" + nameCountry + ">" + flagCountry + "</option>";
	});

}




/* const button_avatar = document.querySelector('#change_avatar');
const update_avatar = document.querySelector('#update_avatar');

const button_password = document.querySelector('#change_password');
const update_password = document.querySelector('#update_password');


button_avatar.addEventListener('click',()=>{
	if (!update_password.classList.contains("d-none")) {
		button_password.click();
	}

    button_avatar.classList.toggle("btn-secondary");
    button_avatar.classList.toggle("btn-outline-secondary");

	update_avatar.classList.toggle("d-none");

});

button_password.addEventListener('click',()=>{
	if (!update_avatar.classList.contains("d-none")) {
		button_avatar.click();
	}
	
    button_password.classList.toggle("btn-secondary");
    button_password.classList.toggle("btn-outline-secondary");

	update_password.classList.toggle("d-none");

}); */


const profile_updated = document.querySelector('#UpdatedProfile');

if (profile_updated) {
	window.addEventListener('load', (event) => {
		const modal_profile_updated = new bootstrap.Modal('#profileUpdatedModal');
		modal_profile_updated.show();
	});
}


const error_change_password = document.querySelector('#changePasswordError');

if (error_change_password) {
	window.addEventListener('load', (event) => {
		const modal_change_password = new bootstrap.Modal('#passwordModal');
		modal_change_password.show();
	});
}



const password_changed = document.querySelector('#changedPassword');

if (password_changed) {
	window.addEventListener('load', (event) => {
		const modal_password_changed = new bootstrap.Modal('#passwordChangedModal');
		modal_password_changed.show();
	});
}



const error_delete = document.querySelector('#deleteError');

if (error_delete) {
	window.addEventListener('load', (event) => {
		const modal_delete = new bootstrap.Modal('#deleteModal');
		modal_delete.show();
	});
}



const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
