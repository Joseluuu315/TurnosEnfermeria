TurnosEnfermería
Este proyecto es un sistema de gestión de turnos para enfermería, diseñado para facilitar la organización y seguimiento de los turnos del personal de salud en hospitales y clínicas. El sistema permite agregar, editar y eliminar turnos de manera fácil e intuitiva a través de una interfaz de usuario moderna y funcional.

Funcionalidades
Visualización de turnos: Los turnos se muestran en un calendario interactivo usando FullCalendar, permitiendo a los usuarios ver sus turnos de manera clara.

Gestión de turnos: Los usuarios pueden agregar, editar y eliminar turnos. Se pueden elegir entre los turnos disponibles: Mañana, Tarde, Noche, Mañana y Tarde, o Libre.

Modal de selección: El sistema incluye un modal de selección de turno personalizado con colores agradables, facilitando la experiencia del usuario.

Exportación a PDF: Los turnos pueden ser exportados a un archivo PDF para su impresión o distribución.

Estadísticas de turnos: Permite ver estadísticas sobre los turnos asignados y el tiempo trabajado.

Tecnologías Utilizadas
PHP: Para la lógica del servidor y la gestión de la base de datos.

MySQL: Base de datos relacional para almacenar los turnos.

FullCalendar: Biblioteca JavaScript para la visualización interactiva de calendarios.

Bootstrap 5: Framework CSS para crear una interfaz moderna y responsive.

JavaScript: Para la interactividad en la interfaz del calendario.

Instalación
Para instalar y ejecutar este proyecto en tu entorno local, sigue los siguientes pasos:

Clona el repositorio:
git clone https://github.com/Joseluuu315/TurnosEnfermeria.git
Configura el servidor local:
Este proyecto está diseñado para ser ejecutado en un servidor web que soporte PHP, como XAMPP, WAMP, o MAMP.

Configura la base de datos:

Crea una base de datos en MySQL llamada turnosenfermeria.

Importa el archivo turnos.sql que se encuentra en la carpeta db dentro del proyecto para crear las tablas necesarias.

Configuración de la conexión a la base de datos:

En el archivo db.php, asegúrate de configurar las credenciales de conexión a la base de datos (usuario, contraseña, host).

Accede a la aplicación:
Una vez que hayas configurado todo correctamente, abre tu navegador y dirígete a la URL correspondiente en tu servidor local (por ejemplo: http://localhost/TurnosEnfermeria/).

Uso
Accede al sistema con tu usuario.

Visualiza los turnos asignados en el calendario.

Añade, edita o elimina turnos haciendo clic en las fechas del calendario.

Exporta los turnos a un archivo PDF utilizando el botón correspondiente.

Consulta las estadísticas de turnos asignados con el botón de estadísticas.

Contribuciones
¡Las contribuciones son bienvenidas! Si tienes alguna sugerencia de mejora o has encontrado algún error, por favor abre un issue o envía un pull request.

Licencia
Este proyecto está licenciado bajo la Licencia MIT.

