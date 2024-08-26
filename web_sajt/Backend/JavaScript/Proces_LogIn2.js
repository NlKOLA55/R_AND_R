const form = document.getElementById('logIn');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    if (validateForm()) {
        // If validation passes, submit the form data via AJAX
        submitForm();

    }
});
function validateForm() {
    var flag = true
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');

    emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email.value)) {
        email.style.outline = "2px solid red";
        email.addEventListener('click', function(){removeWorning(email)});
        flag = false;
    }
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.])[A-Za-z\d@$!%*?&.]{8,}$/;
    if (!passwordPattern.test(password.value)){
        password.style.outline = "2px solid red";
        password.addEventListener('click', function(){removeWorning(password)});
        flag = false;
    }
    else if(!(password.value === confirmPassword.value)){
        confirmPassword.style.outline = "2px solid red";
        confirmPassword.addEventListener('click', function(){removeWorning(confirmPassword)});
        flag = false;
    }
    return flag;
}
function submitForm() {
    const formData = new FormData(document.getElementById('logIn'));
    console.log(formData)
    fetch('../../Backend/PHP/db_Insert_Login.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data)
        if (data.success) {
            //alert('Form submitted successfully!');
            form.reset();
            window.location.href = 'index.php';s
        } else {
            alert('Form submission failed: ' + data.message);
        }
    })
    .catch(error => {
        // console.error('Error:', error);
        // alert('An error occurred during form submission.');
    });
}
function removeWorning(x){
    x.style.outline = "none";
}