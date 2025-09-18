4) Busca diferencias entre programas interpretados y programas compilados.

	- [ ] Lenguajes compilados: Son convertidos directamente a código máquina que el procesador puede ejecutar. Como resultado, suelen ser más rápidos y más eficientes al ejecutarse en comparación con los lenguajes interpretados.
	
	- [ ] Lenguajes interpretados: Ejecutan línea por línea el programa y a  la vez ejecutan cada comando. Antes eran significativamente más lentos que los lenguajes compilados. Pero, con el desarrollo de la **compilación justo a tiempo**, esa diferencia se está reduciendo.
	
5) Busca información sobre vulnerabilidades comunes en JavaScript en cliente (ejemplo: XSS –Cross-Site Scripting).
	• Define qué es y cómo funciona.
	• Explica por qué ocurre en el cliente.
	• Propón al menos una medida de prevención.

	El Cross-Site Scripting es una vulnerabilidad de seguridad en la que un atacante inyecta código malicioso, generalmente JavaScript, en una aplicación web, el cual se ejecuta en el navegador de los usuarios que visitan esa página web.

	El atacante introduce código malicioso en una aplicación web (ya sea mediante formularios u otros medios). Cuando un usuario visita la página infectada, el código se ejecuta en su navegador, ya que se considera parte de la página.
	Los atacantes utilizan esto para:
	- Robar información
	- Tomar el control de sesiones
	- Redirigir a sitios maliciosos
	- Modificar contenido

	**Medida de prevención:**
	Validar todas las entradas que provienen de los usuario y eliminar o convertir a un formato sus entradas de manera que no sean considerados como código a la hora de almacenarlo en la página web (mismamente convirtiendo todos los datos a formato string o similares).
	
6) Investiga los siguientes motores de ejecución de JavaScript:
	• V8 (Chrome/Edge).
	• SpiderMonkey (Firefox).
	• JavaScriptCore (Safari).
Responde a:
	• ¿En qué año fueron creados?
	• ¿Qué características o innovaciones introdujeron?
	• ¿Por qué V8 fue clave en la popularización de Node.js?
	

|                | Año de creación | Innovaciones                                                                                              |
| -------------- | --------------- | --------------------------------------------------------------------------------------------------------- |
| V8             | 2008            | Traducción a código máquina<br>Combina interpretación y compilación<br>Énfasis en la velocidad y potencia |
| SpiderMonkey   | 2004            | Optimización de código JavaScript<br>Novedades en la especificación ECMAScript                            |
| JavaScriptCore | 2007            | Eficiencia y rendimiento<br>Integración con el ecosistema Apple                                           |

V8 fue clave en la popularización de Node.js porque permite ejecutar código JavaScript de manera eficiente fuera del navegador, posibilitando la construcción de servidores y aplicaciones en tiempo real de alto rendimiento.