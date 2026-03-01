<center> <h1 style="color: #6E00FF;"> Componente Offcanvas </center> </h1>

<hr>
<center><h4>Panel lateral deslizante - Documentación y ejemplos</h4></center>
<h2 style="color: #6E00FF;"> ¿Qué es el Offcanvas? </h2>
<hr>
El **Offcanvas** es un componente de Bootstrap que muestra un panel lateral (o superior/inferior) que se desliza desde fuera de la pantalla cuando el usuario hace clic en un botón. Es muy útil para menús de navegación, filtros, carritos de compra o cualquier contenido extra que no queremos mostrar siempre en pantalla.

Funciona de forma similar a un modal, pero en lugar de aparecer en el centro, se desplaza desde uno de los cuatro bordes de la pantalla.

<h2 style="color: #6E00FF;"> Estructura básica del HTML </h2>
<hr>
Para crear un Offcanvas necesitas **dos partes**: el botón que lo abre y el panel en sí.

<b>1. El botón disparador:</b>
```
<button type="button"
		data-bs-toggle="offcanvas"
		data-bs-target="#miPanel">
	Abrir panel
</button>
```
<i>El atributo <b>data-bs-target</b> debe coincidir con el <b>id</b> del panel.</i>
<b>2. El panel Offcanvas:</b>
```
<div class="offcanvas offcanvas-start"
	tabindex="-1"
	id="miPanel"
	aria-labelledby="miPanelLabel">
	
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="miPanelLabel">
		Título del panel
		</h5>
		<button type="button"
			class="btn-close"
			data-bs-dismiss="offcanvas">
		</button>
	</div>
		<div class="offcanvas-body">
			Aquí va el contenido del panel.
		</div>
</div>
```


<h4 style="color: lightgrey;">Clases principales</h4>

<table>
  <thead>
    <tr>
      <th>Clase / Atributo</th>
      <th>Para qué sirve</th>
    </tr>
  </thead>
  <tbody>
    <tr><td><code>offcanvas</code></td><td>Activa el panel (oculto por defecto)</td></tr>
    <tr><td><code>offcanvas-start</code></td><td>El panel sale desde la izquierda</td></tr>
    <tr><td><code>offcanvas-end</code></td><td>El panel sale desde la derecha</td></tr>
    <tr><td><code>offcanvas-top</code></td><td>El panel sale desde arriba</td></tr>
    <tr><td><code>offcanvas-bottom</code></td><td>El panel sale desde abajo</td></tr>
    <tr><td><code>offcanvas-header</code></td><td>Cabecera del panel (título + botón cerrar)</td></tr>
    <tr><td><code>offcanvas-body</code></td><td>Cuerpo del panel donde va el contenido</td></tr>
    <tr><td><code>data-bs-toggle="offcanvas"</code></td><td>Le dice a Bootstrap que este botón abre un offcanvas</td></tr>
    <tr><td><code>data-bs-dismiss="offcanvas"</code></td><td>Cierra el panel (usado en el botón X)</td></tr>
  </tbody>
</table>

<h2 style="color: #6E00FF;">Posiciones del panel</h2>
<hr>
El panel puede aparecer desde cualquiera de los cuatro lados de la pantalla. Solo tienes que cambiar la clase de posición:
<table>
  <thead>
    <tr>
      <th>Clase</th>
      <th>Posición</th>
      <th>Descripción</th>
    </tr>
  </thead>
  <tbody>
    <tr><td><code>offcanvas-start</code></td><td>⬅️ Izquierda</td><td>Sale desde el borde izquierdo</td></tr>
    <tr><td><code>offcanvas-end</code></td><td>➡️ Derecha</td><td>Sale desde el borde derecho</td></tr>
    <tr><td><code>offcanvas-top</code></td><td>⬆️ Arriba</td><td>Sale desde la parte superior</td></tr>
    <tr><td><code>offcanvas-bottom</code></td><td>⬇️ Abajo</td><td>Sale desde la parte inferior</td></tr>
  </tbody>
</table>


<h2 style="color: #6E00FF;">Opciones de comportamiento</h2>
<hr>
Puedes controlar cómo se comporta el panel con estos atributos HTML:

<h4><b>Backdrop estático (no se cierra al hacer clic fuera)</b></h4>
Normalmente, al hacer clic fuera del panel este se cierra. Con data-bs-backdrop="static" el panel solo
se puede cerrar con el botón X.
```
<div class="offcanvas offcanvas-start"
	data-bs-backdrop="static"
	id="miPanel" ...>
```

<h4><b>Scroll del cuerpo habilitado</h4></b>
Por defecto, cuando el panel está abierto no puedes hacer scroll en la página. Con data-bs-scroll="true"
puedes seguir desplazándote por la página aunque el panel esté visible.
```
<div class="offcanvas offcanvas-start"
	data-bs-scroll="true"
	data-bs-backdrop="false"
	id="miPanel" ...>
```

<h4 style="color: lightgrey;">Resumen de opciones</h4>
<table>
  <thead>
    <tr>
      <th>Atributo</th>
      <th>Valor por defecto</th>
      <th>Descripción</th>
    </tr>
  </thead>
  <tbody>
    <tr><td><code>data-bs-backdrop</code></td><td><code>true</code></td><td>Fondo oscuro al abrir. <code>"static"</code> = no cierra al hacer clic fuera</td></tr>
    <tr><td><code>data-bs-scroll</code></td><td><code>false</code></td><td>Permite hacer scroll en la página mientras el panel está abierto</td></tr>
    <tr><td><code>data-bs-keyboard</code></td><td><code>true</code></td><td>Permite cerrar el panel con la tecla Escape</td></tr>
  </tbody>
</table>

<h2 style="color: #6E00FF;">Ejemplo completo: Menú de navegación</h2>
<hr>
Un uso muy común del Offcanvas es como menú de navegación para móviles. Aquí tienes un ejemplo completo:

```
<!-- Botón para abrir el menú -->
<button class="btn btn-dark"
	data-bs-toggle="offcanvas"
	data-bs-target="#menuNavegacion">
	Menú
</button>
<!-- Panel del menú -->
<div class="offcanvas offcanvas-start"
	tabindex="-1"
	id="menuNavegacion"
	aria-labelledby="menuLabel">
	<div class="offcanvas-header bg-dark text-white">
	<h5 class="offcanvas-title" id="menuLabel">Navegación</h5>
		<button type="button"
			class="btn-close btn-close-white"
			data-bs-dismiss="offcanvas">
		</button>
	</div>
	<div class="offcanvas-body">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">
				<a href="#">Inicio</a>
			</li>
			<li class="list-group-item">
				<a href="#">Productos</a>
			</li>
			<li class="list-group-item">
				<a href="#">Contacto</a>
			</li>
		</ul>
	</div>
</div>
```

<h2 style="color: #6E00FF;">Resumen rápido</h2>
<hr>
<table>
  <thead>
    <tr>
      <th>¿Qué quieres hacer?</th>
      <th>¿Cómo se hace?</th>
    </tr>
  </thead>
  <tbody>
    <tr><td>Abrir panel desde la izquierda</td><td><code>class="offcanvas offcanvas-start"</code></td></tr>
    <tr><td>Abrir panel desde la derecha</td><td><code>class="offcanvas offcanvas-end"</code></td></tr>
    <tr><td>Que no se cierre al clic fuera</td><td><code>data-bs-backdrop="static"</code></td></tr>
    <tr><td>Permitir scroll mientras está abierto</td><td><code>data-bs-scroll="true"</code></td></tr>
    <tr><td>Cerrar el panel (botón dentro)</td><td><code>data-bs-dismiss="offcanvas"</code></td></tr>
  </tbody>
</table>
