const logo = document.querySelector('#home_icon');
const btn_switch_mode = document.querySelector('#btnSwitch');
/* console.log(btn_switch_mode); */
document.documentElement.setAttribute('data-bs-theme', localStorage.getItem("mode"));

if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
    /* btn_switch_mode.childNodes[0].classList.add("bi-moon-fill"); */
    btn_switch_mode.children[1].style.display = 'block';
    btn_switch_mode.children[0].style.display = 'none';
    logo.style.filter="invert(1)";
} else {
    /* btn_switch_mode.childNodes[0].classList.add("bi-sun-fill"); */
    btn_switch_mode.children[0].style.display = 'block';
    btn_switch_mode.children[1].style.display = 'none';
    logo.style.filter="invert(0)";
}

btn_switch_mode.addEventListener('click',()=>{
    if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
        document.documentElement.setAttribute('data-bs-theme', 'light');
        btn_switch_mode.children[0].style.display = 'block';
        btn_switch_mode.children[1].style.display = 'none';
        logo.style.filter="invert(0)";
    }
    else {
        document.documentElement.setAttribute('data-bs-theme', 'dark');
        btn_switch_mode.children[1].style.display = 'block';
        btn_switch_mode.children[0].style.display = 'none';
        logo.style.filter="invert(1)";
    }
    localStorage.setItem("mode", document.documentElement.getAttribute('data-bs-theme'));
    /* btn_switch_mode.childNodes[0].classList.toggle("bi-sun-fill");
    btn_switch_mode.childNodes[0].classList.toggle("bi-moon-fill"); */
});



/* const signModal = document.querySelector("#signModal");
const modalEmail = document.querySelector("#modalEmail");
signModal.addEventListener('shown.bs.modal', function() {
    modalEmail.focus();
}); */
  

(() => {
    'use strict';
  
    const form_join = document.querySelector('#fast_sign');
    
    form_join.addEventListener('submit', event => {
        if (!form_join.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form_join.classList.add('was-validated');
    }, false);
})();




const error_deleted = document.querySelector('#deletedError');
console.log(error_deleted);
if (error_deleted) {
	window.addEventListener('load', (event) => {
		const modal_deleted = new bootstrap.Modal('#deletedModal');
		modal_deleted.show();
	});
}