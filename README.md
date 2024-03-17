<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


# MyJob's
MyJob's es una aplicación dedicada a encontrar trabajo. Se destaca porque el usuario no tiene que rellenar formularios ni volver a ingresar los datos que ya están en su CV. Solo debes subir tu CV en formato PDF y el reclutador lo verá directamente.

si tienes alguna duda o pregunta, contáctame acá: Miguel.sarpi@gmail.com.

# Para usar este proyecto adecuadamente necesitas tener instalado:

estos pasos son adecuados para su funcionamiento en windows, pero fue creado mediante docker con WSL con una distribución de ubuntu y "Sail", en las próximas actualizaciones traeré los pasos a pasos para que puedan usarlo de esa manera.

[PHP v8.1.12 o superior](https://www.php.net/downloads)  
[Laravel v10 o superior](https://laravel.com/)  
[composer v2.4.4 o superior](https://getcomposer.org/)  
[node v20.9.0](https://nodejs.org/en)  
[xampp](https://www.apachefriends.org/es/download.html)  
[Mailtrap](https://mailtrap.io/)

Opcional:  
[vsCode](https://code.visualstudio.com/)  
[Dbeaver](Dbeaver)  
[git bash](https://git-scm.com/downloads)

## Configuración de XAMPP y Creación de Base de Datos Local

Esta guía te ayudará a configurar XAMPP y crear una base de datos local para tu aplicación.

### Paso 1: Descargar e Instalar XAMPP

Descarga e instala XAMPP desde [https://www.apachefriends.org/index.html](https://www.apachefriends.org/index.html).

### Paso 2: Iniciar Apache y MySQL

Inicia XAMPP y asegúrate de que los servicios de Apache y MySQL estén activos.

### Paso 3: Acceder a phpMyAdmin

Abre tu navegador y visita [http://localhost/phpmyadmin](http://localhost/phpmyadmin) para acceder a la interfaz de administración de MySQL (phpMyAdmin).

### Paso 4: Crear una Nueva Base de Datos

1. Haz clic en la pestaña "Bases de datos" en phpMyAdmin.
2. Ingresa un nombre para tu nueva base de datos en el campo "Crear nueva base de datos".
3. Haz clic en el botón "Crear".

Con esto ya tendremos una base de datos lista para usarse, debes guardar el nombre de la base de datos para usarlo a futuro.

### Posible error: host 'localhost' is not allowed to connect to this mariadb server

Para solucionarlo, solo debes abrir XAMPP y dirigirte a la sección de MySQL. Luego, ve a la configuración y selecciona my.ini. Esto abrirá un archivo en el Bloc de notas. Busca la sección [mysqld] y justo debajo de ella, agrega la línea: skip-grant-tables

### Paso 5: Crear cuanta y configuración de mailtrap

Crear una cuenta: Primero, crea una cuenta en Mailtrap. Si ya tienes una cuenta, inicia sesión.

Crear una caja de correos: Una vez iniciada la sesión, ve a la sección "Email Testing" y luego a "Inboxes". Aquí puedes crear cajas de correos para diferentes proyectos. Si acabas de crear una cuenta, puedes ir directamente a la caja predeterminada creada por el sistema, llamada "My Box". O bien, puedes crear una nueva caja para recibir los correos.

Configurar la caja de correos: Una vez dentro de la caja de correos, a la derecha encontrarás la configuración para agregarla a tu aplicación.

Obtener los datos de conexión: Ve a "SMTP Settings" -> "Integrations", y selecciona "Laravel 9+". Te proporcionará los datos de conexión que necesitas agregar al archivo .env de tu sistema.

Debería verse algo como esto:

```bash
MAIL_MAILER=smtp
MAIL_HOST=****.smtp.mailtrap.io
MAIL_PORT=****
MAIL_USERNAME=**********
MAIL_PASSWORD=**********
```
Haz clic en "Copy" para copiar los datos, y guárdalos para cuando configures el archivo .env. Es importante que copies estos datos en el lugar indicado como "Copy".


## Guía de Instalación para MyJob's

Descargar proyecto e instalar dependencias
Clonar el repositorio: Ejecuta el siguiente comando en tu terminal para clonar el repositorio desde GitHub:

```
git clone https://github.com/MSarpi/my-job-s.git
```
Acceder al directorio: Ingresa al directorio del proyecto clonado:

```
cd my-job-s
```
Instalar dependencias de PHP: Utiliza Composer para instalar las dependencias del proyecto:

```
composer install
```

Instalar dependencias de JavaScript: Utiliza npm para instalar las dependencias de JavaScript:

```
npm install
```

### Configuración del entorno
Configurar archivo .env:

Copia el archivo .env.example y pégalo en la misma raíz de la carpeta con el nombre .env.
Abre el archivo .env y modifica la sección DB_DATABASE con el nombre de la base de datos que creaste en XAMPP. Por ejemplo: myjobs

DB_DATABASE=myjobs

### Configurar sistema de correos:

En el archivo .env, pega la configuración guardada previamente de Mailtrap en la sección MAIL_MAILER.

### Configuración de la base de datos
Migrar la base de datos: Ejecuta el siguiente comando en tu terminal para migrar todos los campos de la base de datos:
```
php artisan migrate --seed
```
Iniciar la aplicación y Iniciar servidores:

Abre dos terminales.
En el primer terminal, ejecuta el siguiente comando para iniciar el servidor de Laravel:
```
php artisan serve
```
En el segundo terminal, ejecuta el siguiente comando para compilar los assets de node:
```
npm run dev
```
Acceder a la aplicación: Abre tu navegador web favorito y visita http://127.0.0.1:8000/.

### Generar la clave de la aplicación: 
Si recibes el error "No application encryption key has been specified", genera la clave de la aplicación. Ve a la sección derecha de la misma página y haz clic en "Generate app key". Luego, refresca la página.

¡Listo! La página debería iniciar sin problemas y podrás usarla sin inconvenientes. Recuerda que al crear nuevas cuentas, debes ir a Mailtrap para verificarlas, de lo contrario, no podrás verificarlas.

## License

[SarpiDesign](https://sarpidesign.netlify.app/)