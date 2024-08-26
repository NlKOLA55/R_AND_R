const form = document.getElementById('signIn');
form.addEventListener('submit', function(event) {
    event.preventDefault();

    if (validateForm()) {
        // If validation passes, submit the form data via AJAX
        submitForm();

    }
});

function validateForm() {
    var flag = true;
    // Get data
    const fname = document.getElementById('fname');
    const lname = document.getElementById('lname');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirmPassword');
    const birthDate = document.getElementById('birthDate');

    //Check data
    if (fname.value === '') {
        fname.style.outline = "2px solid red";
        fname.addEventListener('click', function(){removeWorning(fname)});
        flag = false;
    }
    const namePattern = /^[A-Za-z\s]+$/;
    if (!namePattern.test(fname.value)) {
        fname.style.outline = "2px solid red";
        fname.addEventListener('click', function(){removeWorning(fname)});
        flag = false;
    }

    if (lname.value === '') {
        lname.style.outline = "2px solid red";
        lname.addEventListener('click', function(){removeWorning(lname)});
        flag = false;
    }
    if (!namePattern.test(lname.value)) {
        lname.style.outline = "2px solid red";
        lname.addEventListener('click', function(){removeWorning(lname)});
        flag = false;
    }

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

    if (birthDate.value === ''){
        birthDate.style.outline = "2px solid red";
        birthDate.addEventListener('click', function(){removeWorning(birthDate)});
        flag = false;
    }
    return flag;
}

function submitForm() {
    const formData = new FormData(document.getElementById('signIn'));
    console.log(formData)
    fetch('../../Backend/PHP/db_Insert_SingIn.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data)
        if (data.success) {
            alert('Form submitted successfully!');
            form.reset();
            window.location.href = 'UserLogin.php';
        } else {
            alert('Form submission failed: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during form submission.');
    });
}
function removeWorning(x){
    x.style.outline = "none";
}