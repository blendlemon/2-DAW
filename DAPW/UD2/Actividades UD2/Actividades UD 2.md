# Actividad 1: Busca en internet la organización que se encarga de los dominios a nivel mundial


La organización que se encarga de los dominios a nivel mundial es la Internet Corporation for Assigned Names and Numbers (ICANN). Esta entidad sin fines de lucro coordina la administración del sistema de nombres de dominio (DNS) para garantizar que todas las direcciones de Internet sean únicas y que los usuarios puedan acceder a ellas. 

- Función principal:
    La ICANN supervisa el sistema para asegurar que cada dirección web sea única en todo el mundo. 

- Delegación de gestión:
	Si bien la ICANN tiene la autoridad global, delega la gestión de dominios específicos a organizaciones "Registry" y "Registrar". 

    - Los Registry son los que administran los dominios de primer nivel, como .com, .net, .org, o los ccTLD (dominios de código de país) como .es para España. 

	- Los Registrar son empresas acreditadas que venden esos dominios a los usuarios finales. 

# Actividad 2: Busca en internet la organización que se encarga de los dominios .es

La entidad pública empresarial Red.es es la organización encargada de la gestión de los dominios de Internet bajo la extensión .es en España. Dentro de Red.es, el departamento ESNIC (Registro de nombres de dominio de Internet para el dominio .es) tiene la autoridad de registro y gestiona la política de estos dominios, siguiendo las directrices de la ICANN y del Ministerio de Asuntos Económicos y Transformación Digital. 

- Función de Red.es/ESNIC:
    Es la entidad que registra y administra los dominios .es, siendo el "registro" (registry) oficial para este dominio de primer nivel (ccTLD). 

- Marco de actuación:
	Sus actuaciones se alinean con las políticas y directrices de la corporación internacional ICANN (Corporación de Internet para la Asignación de Nombres y Números), que coordina el sistema global de nombres de dominio. 
- Agentes registradores:
	Para la comercialización de los dominios, Red.es trabaja a través de los agentes registradores acreditados, que son las empresas a las que los usuarios acuden para registrar un nombre de dominio .es, como se puede ver en la sección de agentes registradores de dominios.es. 

# Actividad 3: Busca en Internet todos los dominios de primer nivel
1. Dominios genéricos (gTLD)
	Son los más comunes y no están vinculados a un país específico. Algunos ejemplos clásicos son:

    .com – comercial (el más usado a nivel mundial)
    .org – organizaciones (generalmente sin fines de lucro)
    .net – redes o servicios de infraestructura
    .info – información
    .biz – negocios
    .name – personas individuales

También existen nuevos gTLD que se han introducido en años recientes, como:

    .app, .blog, .tech, .guru, .store, .xyz, entre cientos más 

    .
2. Dominios de código de país (ccTLD)
	Están asociados a un país o territorio específico. Ejemplos:

    .es – España
    .mx – México
    .ar – Argentina
    .uk – Reino Unido
    .fr – Francia
    .de – Alemania
    .us – Estados Unidos
    .br – Brasil
    .jp – Japón
    .cn – China

Estos dominios suelen estar regulados por entidades nacionales y pueden tener restricciones de uso 
3. Dominios patrocinados (sTLD)
	Son un subconjunto de gTLD que están patrocinados por organizaciones específicas y tienen requisitos de uso. Ejemplos:

    .gov – gobiernos (EE.UU.)
    .edu – instituciones educativas
    .mil – fuerzas militares (EE.UU.)
    .int – organizaciones internacionales establecidas por tratados 

4. Dominios infraestructurales

    .arpa – utilizado exclusivamente para infraestructura de Internet (no es para sitios web comunes) 

# Actividad 4: Describe con tus palabras como funciona un DNS

1. Tú le dices el nombre: Cuando escribes un nombre de dominio fácil de recordar, como www.google.com, es como si buscaras el nombre de una persona en tu agenda.

2. El sistema busca el número: Internet, en realidad, no funciona con nombres, sino con números muy largos llamados direcciones IP. El DNS es el servicio que traduce ese nombre de google.com al número de dirección IP que le corresponde.

3. Te conecta con el destino: Una vez que el DNS ha encontrado el número, le dice a tu navegador dónde encontrar la página de Google y te conecta automáticamente. 

De esta manera, no es necesario memorizar números complejos, y el DNS se encarga de llegar al sitio web correcto de forma rápida y transparente. 


# **Actividad 5:** Cual es el dominio de nuestro instituto

`ieschandomonte.edu.es`

# **Actividad 6:** Busca en internet un archivo de zona de un dominio. ¿Qué es lo que entiendes?

Un archivo de zona es uno de los componentes de la base de datos DNS. Cada zona contiene un conjunto de **registros de recursos (RR)** estructurados

De estos registros, se pueden entender varios campos y tipos:

**Campos de Nivel Superior de un Registro de Recursos (RR):**

• **Propietario:** Indica el nombre de dominio DNS al que pertenece el registro de recursos

• **Tiempo de vida (TTL):** Indica el tiempo que otros servidores DNS deben mantener la información en caché antes de que caduque. Un TTL de 0 se usa para datos volátiles que no deben almacenarse en caché

• **Clase:** Es obligatorio y contiene texto nemotécnico estándar, donde el valor **"IN"** indica que el registro pertenece a la clase Internet

• **Tipo:** Es obligatorio y contiene texto nemotécnico estándar que indica el tipo de registro de recursos (ej., "A")

• **Datos específicos del registro:** Es un campo obligatorio de longitud variable con la información que describe el recurso

**Registros DNS más Utilizados (RR):**

• **SOA (Start Of Authority):** Proporciona información sobre el servidor DNS primario de la zona. Contiene campos como el número de serie, el intervalo de actualización, el intervalo de reintento y la caducidad

• **A y AAAA:** Se utilizan para traducir nombres de _hosts_ a direcciones **IPv4**

e **IPv6**, respectivamente.

• **CNAME (Canonical Name):** Se usa para crear nombres de _hosts_ adicionales o **alias**. El _host_ al que se referencia debe haber sido definido previamente como un registro tipo "A"

• **MX (Mail eXchange):** Asocia un nombre de dominio a una lista de servidores de intercambio de correo. Incluye un número de preferencia, donde a menor número, mayor preferencia

• **NS (Name Server):** Indica cuáles servidores de nombres tienen autoridad total sobre un dominio concreto

• **PTR (Pointer):** También conocido como **'registro inverso'**, traduce direcciones IP en nombres de dominio

• **TXT (TeXT):** Permite a los dominios identificarse mediante una cadena de texto arbitraria

• **SPF (Sender Policy Framework):** Es un registro de tipo TXT que se usa para combatir el _SPAM_ al especificar cuáles _hosts_ están autorizados a enviar correo desde el dominio dado

# **Actividad 7:** Describe con tus palabras que es una búsqueda recursiva, iterativa, directa e inversa

**1. Búsqueda Directa** En la mayoría de las consultas DNS, los clientes realizan una **búsqueda directa**. Este tipo de consulta busca y espera recibir una **dirección IP** como respuesta a la consulta de un nombre de dominio (ejemplo: buscar la IP de `www.ejemplo.com`)

**2. Búsqueda Inversa** El DNS también ofrece un proceso de **búsqueda inversa**, cuyo objetivo es buscar el **nombre de un** **host** a través de una dirección IP (ejemplo: ¿Cuál es el nombre DNS del _host_ que utiliza la dirección IP 192.168.200.100?). Para que esta búsqueda sea práctica, se utiliza un dominio especial reservado, como `in-addr.arpa` para IPv4, donde el orden de los octetos de la IP se invierte. Requiere el uso de un registro de recursos de puntero (**PTR**)

**3. Búsqueda Recursiva** Ocurre cuando el cliente DNS solicita a su servidor DNS preferido que **resuelva completamente el nombre** en nombre del cliente antes de devolver una respuesta. Si el servidor preferido no tiene la respuesta en sus zonas locales o caché, utiliza la recursividad, lo que implica contactar con otros servidores DNS, utilizando las sugerencias de raíz para localizarlos, hasta encontrar el servidor con autoridad y reenvía la respuesta definitiva al cliente solicitante


**4. Búsqueda Iterativa** Es el tipo de resolución que se usa cuando el cliente no solicita la recursividad o esta se encuentra deshabilitada en el servidor DNS. En una solicitud iterativa, el cliente espera la **mejor respuesta que el servidor DNS pueda proporcionar inmediatamente**. El servidor DNS responde basándose en su propio conocimiento (caché), y si no tiene la respuesta final, proporciona una **referencia** (una lista de otros servidores DNS más cercanos al nombre consultado). El cliente DNS asume la responsabilidad de continuar realizando consultas adicionales e independientes (iterativas) a esos otros servidores hasta resolver el nombre.