### Tarea 1. Busca en internet RFCs FTP y SSH.

- RFC FTP
	Los RFC clave para FTP (File Transfer Protocol) incluyen el fundamental RFC 959, que define el protocolo básico para la transferencia de archivos, y el RFC 114, una de sus primeras versiones; también hay RFCs importantes para mejoras y extensiones como el RFC 2389 (negociación de características) y el RFC 5797 (registro de comandos y extensiones), que detallan cómo funciona, cómo se extiende y cómo se manejan sus comandos y respuestas a través de Internet, operando en puertos TCP 21 (control) y puertos dinámicos (datos).

- RFC SSH
	Los RFC clave para SSH (Secure Shell) definen la arquitectura y protocolos, destacando el conjunto de RFC 425x que estandariza SSH-2: RFC 4251 (Arquitectura), RFC 4252 (Autenticación), RFC 4253 (Capa de Transporte), y RFC 4254 (Protocolo de Conexión), que describen cómo se establecen, cifran y autentican las conexiones seguras para acceso remoto, sustituyendo a versiones anteriores. 

### Tarea 2 : Describe como funciona el protocolo FTP

El protocolo FTP (
Protocolo de Transferencia de Archivos) funciona con un modelo cliente-servidor, estableciendo dos canales de conexión separados: uno de control (puerto 21) para comandos (login, navegar) y otro de datos (puerto 20 en modo activo, o puertos dinámicos en pasivo) para la transferencia de archivos, permitiendo subir (PUT) o bajar (GET) archivos entre dispositivos, mediante autenticación o de forma anónima. 
Pasos básicos de una conexión FTP:

Inicio de conexión: Un cliente (tu ordenador) se conecta a un servidor FTP (otro ordenador).
- Establecimiento de canales: Se abren dos conexiones TCP/IP:
	- Canal de Control: Se usa el puerto 21 para enviar comandos (login, listar archivos, etc.) y recibir respuestas.
	- Canal de Datos: Se usa el puerto 20 (en modo activo) o puertos dinámicos (en modo pasivo) para transferir los archivos reales.
- Autenticación: El cliente se autentica con usuario y contraseña (modo normal) o usa credenciales genéricas como "ftp" o "anonymous" (modo anónimo).
- Comandos y Transferencia:
	- El cliente envía comandos como LIST para ver archivos, GET para descargar o PUT para subir.
	- El servidor procesa el comando y, si es una transferencia, se usa el canal de datos para mover los paquetes binarios.
- Modos de Conexión:
    - Activo: El servidor inicia la conexión de datos (desde su puerto 20) al cliente. Puede ser bloqueado por firewalls.
    - Pasivo (PASV): El cliente pide al servidor que abra un puerto y el cliente inicia la conexión de datos, lo que funciona mejor con firewalls.
- Cierre de Sesión: El cliente envía QUIT o simplemente cierra la aplicación para terminar la sesión. 