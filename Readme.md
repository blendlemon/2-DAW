# 2-DAW

Repositorio de apuntes, actividades y prácticas del ciclo **Desarrollo de Aplicaciones Web (2º DAW)**. El contenido está organizado por módulos y unidades.

## Estructura del repositorio
- **DAPW/**: material de *Despliegue de Aplicaciones Web* (UD1–UD4 + comandos Linux).
- **DIW/**: actividades y material de *Diseño de Interfaces Web* (UD1, UD2, 2º trimestre).
- **DWCC/**: ejercicios y prácticas de *Desarrollo Web en Entorno Cliente* (UD1–UD4 + test).
- **DWCS/**: ejercicios, apuntes y proyectos de *Desarrollo Web en Entorno Servidor*.
  - Incluye dependencias PHP vía **Composer** (`DWCS/composer.json`).
  - Carpetas de documentación y proyectos (por ejemplo `docs/`, `phpdocproject/`).
- **examenes/**: enunciados y/o prácticas tipo examen (Datatables, DIW, etc.).

## Archivos sueltos en la raíz
- `aula_virtual.html`: exportación/captura de contenido (HTML) relacionada con el aula virtual.
- `out.html`, `out 1.html`: archivos HTML de salida/exportación.
- `delete_auto_generated_files.md`: nota/guía de limpieza de ficheros autogenerados.
- `Pasted image *.png`: capturas usadas como apoyo.

## Tecnologías
Según la composición del repositorio, predominan:
- **HTML (~69.8%)**
- **PHP (~24.6%)**
- JavaScript (~3%)
- CSS (~2.3%)
- Twig (~0.3%)

## Cómo usar este repositorio
- Navega por carpetas por módulo (**DAPW**, **DIW**, **DWCC**, **DWCS**) y por unidades.
- Si vas a ejecutar prácticas en `DWCS/`, necesitarás un entorno con **PHP** y, si aplica, instalar dependencias con Composer:
  ```bash
  cd DWCS
  composer install
  ```

## Notas
Este repositorio está pensado como material de clase/estudio. Puede contener archivos exportados o generados automáticamente.