Para realizar estos ejercicios utiliza el comando curl. Aprende sus distintas opciones para realizar las siguientes peticiones.

**a.****1****)** Realiza una petición con el método HEAD para visualizar la información de la cabeceras de los URL:

https://centros.edu.xunta.gal/ieschanmonte/aulavirtual/login/index.php

Identifica todos los parámetros que puedas.

![[Pasted image 20260211181329.png]]

**a.2)** Realiza la misma petición con el navegador y utiliza las herramientas de desarrollo del mismo para identificar las cabeceras de las peticiones y de las respuestas.

![[Pasted image 20260211181750.png]]

**b.****1****)** Realiza una petición GET obtén el contenido de la página y redirige la salida a un fichero llamado out.html:

https://centros.edu.xunta.gal/ieschanmonte/aulavirtual/login/index.php

![[Pasted image 20260211182011.png]]
![[out 1.html]]
![[Pasted image 20260211194958.png]]
**b.****2****)**Comprueba con el navegador cuantas peticiones se realizan al acceder a estas páginas. ¿Por qué se producen este número de peticiones?
![[Pasted image 20260211182313.png]]
26 solicitudes

- **El archivo HTML es solo el "mapa":** La primera petición descarga el código HTML. Al leerlo, el navegador descubre que para mostrar la página correctamente necesita más archivos.
- **Recursos externos:** Por cada elemento mencionado en el código, el navegador debe realizar una **nueva petición HTTP**:
    - **CSS:** Archivos de estilos para que la página no se vea como texto plano.
    - **JavaScript:** Scripts para la interactividad (archivos `.js`).
    - **Imágenes/Iconos:** Archivos `.jpg`, `.png`, `.svg` o el `favicon.ico`.
    - **Fuentes:** Tipografías especiales (Google Fonts, etc.).
- **Peticiones de terceros:** Muchas páginas cargan rastreadores (Google Analytics), anuncios, o scripts de redes sociales que generan sus propias peticiones adicionales.

**c)** Utiliza el método GET para enviar a la siguiente URL un parámetro denominado id con el valor 242.

https://centros.edu.xunta.gal/ieschanmonte/aulavirtual/course/view.php

![[Pasted image 20260211182836.png]]

**d****)** Usando el método POST (que envía el contenido en el cuerpo) realiza una búsqueda para todos los centros de titularidad pública de Marín en la página:

https://www.edu.xunta.gal/centroseducativos/BuscaCentros.do

Nota: para ver el código de los parámetros enviados puedes utilizar el navegador.
![[Pasted image 20260211192353.png]]

¿Es posible realizar esta petición con el método GET? Demuestralo.
https://www.edu.xunta.gal/centroseducativos/BuscaCentros.do?OWASP_CSRFTOKEN=O8KY-GZOL-0L3U-3J7J-M3PY-54DX-HLPM-SUA0&campoDeControl=S&codigo=&tipoCentro=&provincia=36&concello=36026&titularidade=&dependente=&concertado=&plan=&rexime=&ensinoPrincipal=&codAsistencia=&codQuenda=&ensConcertado=&ensinoModalidade=&ensinoEspecialidade=&DIALOG-EVENT-buscar=Buscar&resultadosPaxina=10

![[Pasted image 20260211193300.png]]

**e****)** Empleando curl intenta obtener en un fichero aula_virtual.html el código del aula virtual del módulo de DAW.

Pista: necesitas enviar una cookie de sesión de Moodle.

Para utilizar el gestor de paquetes apt desde la red del instituto es necesario configurar el proxy. Los pasos a seguir son:

1. Crear el fichero /etc/apt/apt.conf.d/proxy.conf

2. Incluir las siguientes líneas dentro del fichero creado:

Acquire::http::Proxy "http://192.168.0.11:3128/";

Acquire::https::Proxy "http://192.168.0.11:3128/";  
  
**UTILIZAR CURL CON EL PROXY  
-x "http://192.168.0.11:3128"**

curl -x "http://192.168.0.11:3128" \
     -b "MoodleSessionieschanmonte=2h79me462h8bqfcfg5ft4ob0is" \
     "https://centros.edu.xunta.gal/ieschanmonte/aulavirtual/course/view.php?id=242" \
     > aula_virtual.html
     
 ![[Pasted image 20260211194834.png]]
![[aula_virtual.html]]

**Formato de entrega:**

**Fichero PDF con capturas de pantalla que demuestren los pasos seguidos y las explicaciones cuando sean necesarias.**