
//REGISTRAR USUARIO 
document.getElementById("registro-form").addEventListener("submit", async (e) => {
  e.preventDefault();
  limpiarAlertas();

  // Obtener valores
  const nombre = document.getElementById("nombre").value.trim();
  const apellido = document.getElementById("apellido").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value;
  const terminos = document.getElementById("terminos").checked;

  // Validaciones manuales
  const errores = [];
  if (!nombre) errores.push("El nombre es obligatorio.");
  if (!apellido) errores.push("El apellido es obligatorio.");
  if (!email) errores.push("El correo electrónico es obligatorio.");
  else if (!/^\S+@\S+\.\S+$/.test(email)) errores.push("El correo electrónico no es válido.");
  if (!password) errores.push("La contraseña es obligatoria.");
  else if (password.length < 6) errores.push("La contraseña debe tener al menos 6 caracteres.");
  if (!terminos) errores.push("Debes aceptar los términos y condiciones.");

  if (errores.length > 0) {
    mostrarErrores(errores);
    return;
  }

  // Si pasa validación, enviar datos
  const datos = { nombre, apellido, email, password };

  try {
    const response = await fetch("http://localhost/ProT2_42791957/api/registro", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(datos),
    });


    const responseData = await response.json();

    if (!response.ok) {
      const errorMsg = responseData.message || "Algo salió mal al registrar.";
      if (errorMsg.toLowerCase().includes("usuario ya existe") || errorMsg.toLowerCase().includes("email ya está registrado")) {
        mostrarErrores(["El usuario o correo ya está registrado."]);
      } else if (errorMsg.toLowerCase().includes("contraseña") && errorMsg.toLowerCase().includes("más de 6 caracteres")) {
        mostrarErrores(["La contraseña debe tener más de 6 caracteres."]);
      } else {
        mostrarErrores([errorMsg]);
      }
      return;
    }

    mostrarExito("Usuario registrado correctamente.");
    document.getElementById("registro-form").reset();

  } catch (err) {
    mostrarErrores(["Error de conexión con el servidor."]);
    console.error("Error al enviar el formulario:", err);
  }
});

// Funciones mostrar alertas con estilo y animaciones
function mostrarErrores(errores) {
  const contenedor = document.getElementById("alertas");
  contenedor.innerHTML = ""; // Limpiar primero
  contenedor.style.display = "block"; // Forzar visualización
  
  errores.forEach(error => {
    const div = document.createElement("div");
    div.className = "alerta-error"; // Usar className en lugar de classList
    div.textContent = error;
    div.style.opacity = "1"; // Forzar visibilidad
    contenedor.appendChild(div);
    
    // Debug adicional
    console.log("Div creado:", div);
    console.log("Estilos calculados:", window.getComputedStyle(div));
  });
}

function mostrarExito(mensaje) {
  const contenedor = document.getElementById("alertas");
  contenedor.innerHTML = "";
  const div = document.createElement("div");
  div.classList.add("alerta-exito");
  div.textContent = mensaje;
  contenedor.appendChild(div);
  // Animación fadeIn con CSS
}

function limpiarAlertas() {
  document.getElementById("alertas").innerHTML = "";
}
