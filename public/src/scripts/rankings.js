document.addEventListener('DOMContentLoaded', function() {
    // Selector de divisiones
    const divisionButtons = document.querySelectorAll('.btn-division');
    
    divisionButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remover clase active de todos los botones
            divisionButtons.forEach(btn => btn.classList.remove('active'));
            
            // Agregar clase active al botón clickeado
            this.classList.add('active');
            
            // Mostrar la sección correspondiente
            const division = this.getAttribute('data-division');
            document.getElementById('men-rankings').style.display = division === 'men' ? 'block' : 'none';
            document.getElementById('women-rankings').style.display = division === 'women' ? 'block' : 'none';
        });
    });
});