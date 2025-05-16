const button = document.getElementById('colorButton');

button.addEventListener('mouseover', () => {
    button.style.backgroundColor = 'red'; // Cambia a rojo al pasar el mouse
});

button.addEventListener('mouseout', () => {
    button.style.backgroundColor = 'black'; // Vuelve a negro al salir el mouse
});
