# Instrucciones para recrear el esqueleto de Symfony WebApp 7.4

Este proyecto se ha creado siguiendo los pasos indicados a continuación:

## 1️⃣ Crear el proyecto base

```bash
composer create-project symfony/skeleton:"7.4.*" my_project_directory
cd my_project_directory
composer require webapp
```

## 2️⃣ Eliminar elementos que no se utilizarán

Ejecutar los siguientes comandos:

```bash
php bin/console importmap:remove @hotwired/stimulus
php bin/console importmap:remove @hotwired/turbo
php bin/console importmap:remove @symfony/stimulus-bundle
```

## 3️⃣ Añadir estilos de Bootstrap

```bash
php bin/console importmap:require bootstrap
```

## 4️⃣ Modificar el archivo `assets/app.js`

Comentar la siguiente línea:

```js
// import './stimulus_bootstrap.js';
```

Añadir la siguiente línea:

```js
import 'bootstrap/dist/css/bootstrap.min.css';
```

## ✅ Proyecto listo

Con estos pasos conseguimos un esqueleto limpio de Symfony 7.4 con Bootstrap integrado y sin Stimulus ni Turbo.
Arranca el servidor local con:
```bash
symfony server:start
```


