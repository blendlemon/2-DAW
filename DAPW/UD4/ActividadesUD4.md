
# Actividad 1: Cifrados de seguridad en HTTPS

## Descripción
El protocolo HTTPS utiliza varios cifrados de seguridad para garantizar la confidencialidad, integridad y autenticidad de los datos transmitidos.

## Cifrados principales

### 1. **TLS (Transport Layer Security)**
Protocolo de seguridad que cifra la comunicación entre cliente y servidor. Reemplaza al obsoleto SSL.

### 2. **RSA (Rivest-Shamir-Adleman)**
Algoritmo de cifrado asimétrico usado para el intercambio de claves. Utiliza un par de claves (pública y privada).

### 3. **AES (Advanced Encryption Standard)**
Algoritmo de cifrado simétrico que protege los datos durante la sesión. Es rápido y altamente seguro.

### 4. **SHA (Secure Hash Algorithm)**
Función hash criptográfica que verifica la integridad de los datos. Versiones: SHA-1, SHA-256, SHA-512.

### 5. **HMAC (Hash-based Message Authentication Code)**
Combina hash y clave secreta para autenticar y verificar la integridad de mensajes.

## Conclusión
HTTPS combina estos cifrados en un handshake seguro para establecer una conexión confiable y proteger la información del usuario.

# Actividad 2: Métodos HTTP y sus funciones

## Descripción
Los métodos HTTP son verbos que indican la acción que debe realizarse sobre un recurso en el servidor.

- **TRACE**: Devuelve la solicitud recibida para depuración
- **OPTIONS**: Describe opciones de comunicación disponibles
- **CONNECT**: Establece un túnel a través de un proxy
- **MOVE**: Mueve un recurso a una nueva ubicación
- **MKCOL**: Crea una colección (carpeta)
- **PROPFIND**: Obtiene propiedades de un recurso
- **PROPPATCH**: Modifica propiedades de un recurso
- **MERGE**: Fusiona cambios en control de versiones
- **UPDATE**: Actualiza versiones en control de versiones
- **LABEL**: Asigna etiquetas a versiones

# Actividad 3: Códigos de estado HTTP

## Códigos 1xx: Respuestas informativas
Indica que la petición ha sido recibida y se está procesando.

## Códigos 2xx: Respuestas correctas
Indica que la petición ha sido procesada correctamente.
- **200 OK**: La solicitud se ha ejecutado con éxito y se ha devuelto la información en el mensaje de respuesta.
- **201 Created**: El recurso ha sido creado exitosamente.
- **204 No Content**: La solicitud fue exitosa pero no hay contenido que devolver.

## Códigos 3xx: Respuestas de redirección
Indica que el cliente necesita realizar más acciones para finalizar la petición.
- **301 Moved Permanently**: El objeto solicitado ha sido movido permanentemente; la nueva URL se especifica en la cabecera Location.
- **302 Found**: El recurso solicitado se movió temporalmente a otra ubicación.
- **304 Not Modified**: El recurso no se modificó desde la última consulta; el navegador debería leerlo de la caché.

## Códigos 4xx: Errores del cliente
Indica que ha habido un error en el procesado de la petición causado por el cliente.
- **400 Bad Request**: La solicitud no ha sido comprendida por el servidor.
- **401 Unauthorized**: No estás autorizado a acceder al recurso solicitado.
- **403 Forbidden**: El servidor rechaza procesar la solicitud.
- **404 Not Found**: El documento solicitado no existe en este servidor.
- **408 Request Timeout**: Se agotó el tiempo de conexión.

## Códigos 5xx: Errores del servidor
Indica que ha habido un error en el procesado de la petición causado por un fallo en el servidor.
- **500 Internal Server Error**: Error interno del servidor por fallo en la configuración.
- **502 Bad Gateway**: El servidor recibió una respuesta inválida de otro servidor.
- **503 Service Unavailable**: El servidor no puede responder, por ejemplo está sobrecargado.
- **505 HTTP Version Not Supported**: La versión de protocolo HTTP solicitada no es soportada.
