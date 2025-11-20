## 🧱 1. Fundamentos de las Aplicaciones Web

### 📚 Introducción teórica
Este tema se basa en la presentación de **Juan Pavón Mestras**, experto en arquitecturas de aplicaciones web. Se enfoca en los **protocolos y arquitecturas de aplicaciones en Internet**, especialmente en el uso de **HTML** como lenguaje de marcado para estructurar contenido web.

### 🕰️ Hitos históricos clave

| Año | Evento | Descripción |
|-----|--------|-------------|
| 1969 | **ARPANET** | Primera red de conmutación de paquetes. Financiada por el Departamento de Defensa de EE.UU. Objetivo: mantener comunicación entre centros militares e investigación incluso en caso de ataque nuclear. |
| 1971 | ARPANET se hace pública | Se expande a universidades y centros de investigación. |
| 1972 | **Correo electrónico** | Ray Tomlinson crea el sistema de email y introduce el símbolo `@`. |
| 1974 | **TCP/IP** | Vinton Cerf y Robert Kahn definen el protocolo que será la base de Internet. |
| 1983 | TCP/IP se adopta oficialmente | ARPANET migra a este protocolo. |
| 1984 | **DNS** | Sistema de nombres de dominio para traducir nombres legibles a IPs. |
| 1986 | **IETF** | Organismo que desarrolla estándares abiertos para Internet (RFCs). |
| 1989 | **WWW** | Tim Berners-Lee propone la World Wide Web en el CERN. |
| 1993 | **Navegador Mosaic** | Primer navegador gráfico popular. |
| 1994 | **W3C** | Fundado por Berners-Lee para estandarizar tecnologías web. |

### 🧩 Tecnologías fundamentales de la Web
- **HTML:** estructura del contenido.
- **URL:** dirección de recursos.
- **HTTP/HTTPS:** protocolo de transferencia.
- **Navegadores:** interpretan HTML y permiten interacción.

---

## 🌐 2. Web Estática vs Web Dinámica

### 🧱 Web Estática
- El **servidor web** almacena archivos HTML estáticos.
- El cliente solicita una página mediante HTTP.
- El servidor responde con el archivo HTML.
- El **navegador interpreta** y muestra el contenido.
- **No hay procesamiento del lado del servidor.**

### ⚙️ Web Dinámica
- El cliente envía una petición HTTP.
- El **servidor web** la deriva al **servidor de aplicaciones**.
- Este puede consultar una **base de datos**.
- Genera una respuesta HTML **dinámica** y se la envía al cliente.
- **Procesamiento del lado del servidor.**

---

## 🖥️ 3. Lado Cliente

### 🎯 Función
Inicia la comunicación vía HTTP usando un navegador.

### 🧰 Tecnologías involucradas
- **HTML:** estructura.
- **CSS:** estilos.
- **JavaScript:** interactividad.
- **HTTP:** protocolo de comunicación.

---

## 🖥️ 4. Lado Servidor

### 🧱 Componentes clave

#### ✅ Servidor Web
- Atiende peticiones HTTP.
- Puede servir contenido estático (HTML, imágenes, etc.).
- Ejemplos: **Apache**, **Nginx**, **IIS**.

#### ✅ Servidor de Aplicaciones
- Ejecuta lógica de negocio.
- Accede a bases de datos.
- Ejemplos: **JBoss**, **GlassFish**, **Tomcat**.

> ⚠️ Nota: La línea entre servidor web y servidor de aplicaciones se ha difuminado. Muchos servidores modernos pueden hacer ambas funciones.

---

## 🧪 4.1 Servidores Web y de Aplicaciones

### 🔧 Servidores Web
| Servidor | Características |
|----------|-----------------|
| **Nginx** | Código abierto, rápido, con balanceo de carga y caché HTTP. |
| **Apache** | Muy usado, flexible, compatible con muchos módulos. |
| **IIS** | De Microsoft, integrado con Windows, soporte para FTP, SMTP, etc. |

### 🧪 Servidores de Aplicaciones
| Servidor | Características |
|----------|-----------------|
| **JBoss EAP** | Basado en WildFly, para entornos empresariales. |
| **GlassFish** | Implementación de referencia de Jakarta EE. |
| **Tomcat** | Ligero, para servlets y JSP, **no es un servidor Java EE completo**. |

---

## 💻 4.2 Lenguajes de Programación en el Servidor

### 🧩 Tipos de lenguajes según ejecución

#### 🔹 Scripting (interpretados)
- PHP, Python, Perl.
- Se mezclan con HTML.
- Requieren un **motor de scripting** en el servidor.

#### 🔹 Precompilados
- CGI, JSP.
- Código ejecutable independiente.
- Generan páginas HTML como salida.

#### 🔹 Híbridos
- ASP.NET (Microsoft).
- Separan lógica y presentación (code-behind).
- Usan lenguajes como C# o VB.NET.

---

## 🧰 4.3 Tecnologías destacadas

### ✅ Jakarta EE (antes Java EE)
- Plataforma para aplicaciones Java.
- Tecnologías: **Servlets**, **JSP**, **EJB**.
- Ventajas: gran ecosistema, librerías, comunidad.
- Actualmente mantenida por la **Fundación Eclipse**.

### ✅ AMP / LAMP / WAMP / MAMP
- **Apache + MySQL + PHP/Perl/Python**.
- Según el sistema operativo:
  - **LAMP** (Linux)
  - **WAMP** (Windows)
  - **MAMP** (macOS)
- Alternativas: PostgreSQL en vez de MySQL.

### ✅ CGI / Perl
- Perl: lenguaje script potente.
- CGI: estándar para ejecutar programas en el servidor.
- Desventaja: **bajo rendimiento** por crear un proceso nuevo por cada solicitud.

### ✅ ASP.NET
- Plataforma **propietaria** de Microsoft.
- Usa **IIS** como servidor.
- Lenguajes: C#, VB.NET.
- IDE: Visual Studio.
- Ventajas: integración total con ecosistema Microsoft.
- Desventajas: **cerrada y costosa**.

---

## 📄 4.4 Ejemplos prácticos

### 🔹 CGI
- El servidor ejecuta un programa externo.
- Puede estar escrito en C, Python, Perl, etc.
- Devuelve HTML como resultado.

### 🔹 ASP.NET
- Se puede ver un ejemplo funcional en el enlace del curso.

### 🔹 Servlets
- Clases Java que extienden `HttpServlet`.
- Métodos clave: `doGet()`, `doPost()`.
- Requieren despliegue en un servidor como Tomcat.

### 🔹 JSP
- Archivos `.jsp` con código Java incrustado.
- Se traducen a servlets antes de ejecutarse.
- Útiles para vistas dinámicas.

### 🔹 PHP
- Ejemplo básico disponible en el enlace del curso.

---

## 🔄 4.5 Métodos HTTP: GET vs POST

| Método | Uso | Características |
|--------|-----|-----------------|
| **GET** | Solicitar datos | Visible en URL, limitado en tamaño, idempotente. |
| **POST** | Enviar datos | No visible en URL, permite archivos, más seguro. |

> 🔍 Ejemplos reales:
- GET: búsqueda en Zara.
- POST: formulario de contacto de Naturgy.

---

## ⚖️ 4.6 JSP vs Servlets

| Característica | Servlet | JSP |
|----------------|---------|-----|
| Tipo | Código Java | HTML con Java |
| Rol en MVC | Controlador | Vista |
| Procesamiento | Alto | Bajo |
| Sesiones | Manual | Automática |
| Separación lógica | No | Sí (con JavaBeans) |
| Rendimiento | Rápido | Más lento (se traduce a servlet) |

---

## 🛠️ 5. Herramientas de Desarrollo

### 🧰 Navegadores
- Chrome, Firefox, Safari, Edge.

### 🧰 IDEs
- **VS Code** (ligero, gratuito).
- **Eclipse / IntelliJ** (Java).
- **PHPStorm** (PHP).
- **Visual Studio** (Microsoft).

### 🧰 Bases de datos
- MySQL, PostgreSQL, SQLite, etc.

### 🧰 Servidores locales
- **XAMPP**: Apache + MySQL + PHP + Perl.
- **Tomcat**: para Java.

---

## 🐛 6. Depuración con Xdebug y VS Code

### ✅ Modo 1: **"Listen for Xdebug"**
- VS Code **espera** conexión del servidor.
- Se activa al **acceder a una página PHP** en el navegador.
- Ideal para depurar aplicaciones web reales.

### ✅ Modo 2: **"Launch"**
- Ejecuta un archivo PHP directamente.
- Útil para **scripts o pruebas simples**.
- No requiere navegador.

---

## ✅ Resumen final (para estudiar)

- La web evolucionó desde **ARPANET** hasta **Jakarta EE** y **XAMPP**.
- Existen **arquitecturas estáticas y dinámicas**.
- El **lado cliente** usa HTML/CSS/JS; el **servidor** usa PHP, Java, Python, etc.
- **Servidores web** (Apache, Nginx) y **de aplicaciones** (Tomcat, JBoss) pueden combinarse.
- **GET** y **POST** son métodos HTTP clave.
- **JSP** y **Servlets** se complementan en Java.
- **Herramientas** como VS Code y Xdebug permiten desarrollar y depurar eficientemente.

---