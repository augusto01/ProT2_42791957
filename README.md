Trabajo Integrador del Tramo 2 de Talentos Digitales 2025 - UFC
Descripción del Proyecto
Este proyecto tiene como objetivo crear una página web para la venta y promoción de combates de MMA. Utilizando el framework CodeIgniter, se desarrollará una plataforma que permitirá a los usuarios acceder a información sobre eventos, comprar entradas y seguir sus luchadores favoritos.

Requisitos Previos
Antes de comenzar, asegúrate de tener instalado lo siguiente:

XAMPP (para ejecutar el servidor local)
PHP (compatible con la versión de CodeIgniter que estés utilizando)
MySQL (incluido en XAMPP)
Instrucciones de Instalación
Clonar el Repositorio
Clona el repositorio del proyecto en tu máquina local. Abre una terminal y ejecuta el siguiente comando:

Copiar
git clone <URL_DEL_REPOSITORIO>
Mover el Proyecto a XAMPP
Copia la carpeta del proyecto clonado dentro de la carpeta htdocs de tu instalación de XAMPP. La ruta normalmente es:

Copiar
C:\xampp\htdocs\
Configurar Variables de Entorno
Abre los siguientes archivos en la carpeta App de CodeIgniter y configura las variables de entorno necesarias:

app.php

Asegúrate de que las configuraciones de base de datos y otras variables sean correctas según tu entorno local.
Database.php

Configura la conexión a la base de datos. Asegúrate de que los valores de hostname, username, password, y database sean correctos.
Copiar
$db['default'] = array(
    'dsn'   => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'nombre_de_tu_base_de_datos',
    'dbdriver' => 'mysqli',
    // Otras configuraciones...
);
Iniciar el Servidor

Abre el panel de control de XAMPP y asegúrate de que los módulos de Apache y MySQL estén en ejecución.
Acceder a la Aplicación

Abre tu navegador y dirígete a http://localhost/nombre_de_tu_carpeta.

