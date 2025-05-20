document.getElementById("registro-form").addEventListener("submit", async (e) => {
    e.preventDefault();

    const datos = {
        nombre: document.getElementById("nombre").value,
        apellido: document.getElementById("apellido").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value
    };

    try {
        const response = await fetch("http://localhost/proyecto_td/public/api/registro", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(datos)
        });

        const responseData = await response.json();

        if (!response.ok) {
            console.error("Error en la respuesta del servidor:", responseData);
            alert("Error: " + (responseData.message || "Algo salió mal."));
            return;
        }

        console.log("Usuario registrado:", responseData);
        alert("Usuario registrado correctamente");
    } catch (err) {
        console.error("Error en el fetch:", err);
        alert("Error al conectar con el servidor.");
    }
});
