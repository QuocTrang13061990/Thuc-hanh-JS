const usernameEl = document.getElementById('username');
const emailEl = document.getElementById('email');
const passwordEl = document.getElementById('password');
const confirmPasswordEl = document.getElementById('confirm-password');

const form = document.getElementById('signin');
const btnSigninEl = document.getElementById('btn-Signin');

// console.log(usernameEl, emailEl, passwordEl, confirmPasswordEl, form);
const isRequired = value => value === '' ? false : true;
const isBetween = (length, min, max) => length < min || length > max ? false : true;
const isEmailValid = (email) => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email); // kiểm tra email có đúng định dạng re hay không
}
const isPasswordSecure = (password) => {
    const re = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
    return re.test(password);
};
// input la mot trong cac input: userNameEl, emailEl, passwordEl, confirmPasswordEl
const showError = (input, message) => {
    const formField = input.parentElement;
    formField.classList.remove('success');
    formField.classList.add('error');
    const error = formField.querySelector('small');
    error.textContent = message;
}
const showSuccess = (input) => {
    const formField = input.parentElement;
    formField.classList.remove('error');
    formField.classList.add('success');
    const error = formField.querySelector('small');
    error.textContent = '';
}
// 1. Validate the username field: không trống, 3=<length<=25
const checkUsername = () => {
    let valid = false;
    const min = 3, max = 25;
    // lấy value của field input (trim() giống như bên PHP)
    const usernameVl = usernameEl.value.trim();
    if (!isRequired(usernameVl)) {
        showError(usernameEl, 'Username cannot be blank');
    } else if (usernameVl.length < min || usernameVl.length > 25) {
        showError(usernameEl, `Username must be between ${min} and ${max} characters.`);
    } else {
        showSuccess(usernameEl);
        valid = true;
    }
    return valid;
}
// 2. Validate the email field
const checkEmail = () => {
    let valid = false;
    // lấy value của field input (trim() giống như bên PHP)
    const emailVl = emailEl.value.trim();
    if (!isRequired(emailVl)) {
        showError(emailEl, 'Email cannot be blank');
    } else if (!isEmailValid(emailVl)) {
        showError(emailEl, 'Email is not valid.')
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
}
// 3. Validate the password field
const checkPassword = () => {
    let valid = false;
    // lấy value của field input (trim() giống như bên PHP)
    const passwordVl = passwordEl.value.trim();
    if (!isRequired(passwordVl)) {
        showError(passwordEl, 'Password cannot be blank');
    } else if (!isPasswordSecure(passwordVl)) {
        showError(passwordEl, 'Password must has at least 8 characters that include at least 1 lowercase character, 1 uppercase characters, 1 number, and 1 special character in (!@#$%^&*)')
    } else {
        showSuccess(passwordEl);
        valid = true;
    }
    return valid;
}
// 4. Validate the confirm-password field
const checkConfirmPassword = () => {
    let valid = false;
    // lấy value của field input (trim() giống như bên PHP)
    const confirmPasswordVl= confirmPasswordEl.value.trim();
    const passwordVl = passwordEl.value.trim();

    if (!isRequired(confirmPasswordVl)) {
        showError(confirmPasswordEl, 'Please enter the password again');
    } else if (confirmPasswordVl !== passwordVl) {
        showError(confirmPasswordEl, 'Confirm password does not match')
    } else {
        showSuccess(confirmPasswordEl);
        valid = true;
    }
    return valid;
}
// Khi bấm submit thì check xem có valid hay không
btnSigninEl.addEventListener('click', function () {
    // lưu ý  biến isEmailValid dưới đây khác với isEmailValid() ở trên (dù trùng tên nhưng không thành vấn đề)
    let isUsernameValid = checkUsername(), isEmailValid = checkEmail(), isPasswordValid = checkPassword(), isConfirmPasswordValid = checkConfirmPassword();
    let isFormValid = isUsernameValid && isEmailValid && isPasswordValid && isConfirmPasswordValid;
    if (true) {
        const userNameVl = usernameEl.value.trim();
        const emailVl = emailEl.value.trim();
        const passwordVl = passwordEl.value.trim();
        const confirmPasswordVl = confirmPasswordEl.value.trim();
        $.ajax({
            url : "register.php",
            type : "POST",
            data : {
                username : userNameVl,
                email : emailVl,
                password : passwordVl,
                confirmpassword : confirmPasswordVl
            },
            success : function(response){
                console.log(response);
            }
        });
    }
})
/* Add Instant feedback feature
    - Thông thường khi submit thì mới biết là success hay không
    - Tuy nhiên, việc làm dưới đây giúp ta có phản hồi ngay lập tức khi nhập đúng 
*/
form.addEventListener('input', function (e) {
    switch (e.target.id) {
        case 'username': 
        checkUsername();
        break;
    }
    switch (e.target.id) {
        case 'email': 
        checkEmail();
        break;
    }
    switch (e.target.id) {
        case 'password': 
        checkPassword();
        break;
    }
    switch (e.target.id) {
        case 'confirm-password': 
        checkConfirmPassword();
        break;
    }
})


// function debounce: sau khoảng thời gian delay thì nó mới có phản hồi (hàm này có thì tốt hơn, trải nghiệm ok hơn)
// const debounce = (fn, delay = 1000) => {
//     let timeoutId;
//     return (...args) => {
//         // cancel the previous timer
//         if (timeoutId) {
//             clearTimeout(timeoutId);
//         }
//         // setup a new timer
//         timeoutId = setTimeout(() => {
//             fn.apply(null, args)
//         }, delay);
//     };
// };

// form.addEventListener('input', debounce(function (e) {
//     switch (e.target.id) {
//         case 'username': 
//         checkUsername();
//         break;
//     }
//     switch (e.target.id) {
//         case 'email': 
//         checkEmail();
//         break;
//     }
//     switch (e.target.id) {
//         case 'password': 
//         checkPassword();
//         break;
//     }
//     switch (e.target.id) {
//         case 'confirm-password': 
//         checkConfirmPassword();
//         break;
//     }
// }))
