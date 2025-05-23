

document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('exampleInputPassword1');
    const eyeIcon = document.getElementById('eyeIcon');

    // Toggle the type attribute
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);

    // Toggle the eye icon
    eyeIcon.classList.toggle('fa-eye');
    eyeIcon.classList.toggle('fa-eye-slash');
});
