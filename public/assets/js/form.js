(() => {
    'use strict';
  
    const form_join = document.querySelector('#form_sign');
    
    form_join.addEventListener('submit', event => {
        if (!form_join.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form_join.classList.add('was-validated');
    }, false);
})();


const form_logo = document.querySelector('#form_icon');

if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
    form_logo.style.filter="invert(1)";
} else {
    form_logo.style.filter="invert(0)";
}

btn_switch_mode.addEventListener('click',()=>{
    if (document.documentElement.getAttribute('data-bs-theme') == 'dark') {
        form_logo.style.filter="invert(1)";
    }
    else {
        form_logo.style.filter="invert(0)";
    }
});





const input_password = document.querySelector('#joinPassword');
const eye_password = document.querySelector('#eyePassword');

eye_password.addEventListener('click',()=>{
    if (input_password.type == 'password') {
        input_password.type = 'text';
    }
    else {
        input_password.type = 'password';
    }
    eye_password.classList.toggle("bi-eye");
    eye_password.classList.toggle("bi-eye-slash");
});






