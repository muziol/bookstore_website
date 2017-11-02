var button_sign = document.getElementsByClassName('sign_up_submit');
button_sign[0].addEventListener('click', function(){
    var form_sign = document.getElementsByClassName('sign_up');
    var form_log = document.getElementsByClassName('log_in');
    form_sign[0].classList.add('show');
    form_sign[0].classList.remove('hide');
    form_log[0].classList.add('hide');
    form_log[0].classList.remove('show');
});

var button_log = document.getElementsByClassName('log_in_submit');
button_log[0].addEventListener('click', function(){
    var form_sign = document.getElementsByClassName('sign_up');
    var form_log = document.getElementsByClassName('log_in');
    form_sign[0].classList.add('hide');
    form_sign[0].classList.remove('show');
    form_log[0].classList.add('show');
    form_log[0].classList.remove('hide');
});