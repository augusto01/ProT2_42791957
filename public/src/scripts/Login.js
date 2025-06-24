function initPasswordToggle() {
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (!togglePassword || !passwordInput || !eyeIcon) {
        console.error('No se encontraron todos los elementos necesarios');
        return;
    }

    togglePassword.addEventListener('click', () => {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        eyeIcon.classList.toggle('fa-eye');
        eyeIcon.classList.toggle('fa-eye-slash');
    });
}

// Versión 1: Cuando el DOM está listo
document.addEventListener('DOMContentLoaded', initPasswordToggle);

// Versión 2: Como fallback si DOMContentLoaded ya ocurrió
if (document.readyState !== 'loading') {
    initPasswordToggle();
}

console.log('Login.js cargado correctamente');