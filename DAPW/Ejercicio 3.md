1. Crear el directorio dir2 y dir3 en el directorio PRUEBA ¿Cuáles son los actuales permisos del directorio dir2?
2. Utilizando la notación simbólica, eliminar todos los permisos de escritura (propietario, grupo, otros) del directorio dir2.
3. Utilizando la notación octal, eliminar el permiso de lectura del directorio dir2, al resto de los usuarios.
4. ¿Cuáles son ahora los permisos asociados a dir2?
5. Crear bajo dir2, un directorio llamado dir2l.
6. Concederse a sí mismo permiso de escritura en el directorio dir2 e intentar de nuevo el paso anterior.
7. ¿Cuáles son los valores por omisión asignados a los archivos?
8. Cambiar el directorio actual al directorio dir3. Imprimir su trayectoria completa para verificar el cambio.
9. ¿Cuáles son los permisos asignados en su momento a este directorio?
10. Establecer mediante el comando umask (buscar este comando) los siguientes valores por omisión: rwxr--r-- para los directorios y rw-r--r-- para los archivos ordinarios.
11. Crear cuatro nuevos directorios llamados dira, dirb, dirc, y dird bajo el directorio actual.
12. Comprobar los permisos de acceso de los directorios recién creados para comprobar el funcionamiento del comando umask.
13. Crear el fichero uno. Quitarle todos los permisos de lectura. Comprobarlo. Intentar borrar dicho fichero.
14. Quitarle todos los permisos de paso al directorio dir2 y otorgarle todos los demás.
15. Crear en el directorio propio:
	El directorio carpeta1 con los tres permisos para el propietario, dentro de él fich1 con lectura y
	escritura para todos y fich2 con lectura y escritura para el propietario y sólo lectura para el resto.
	El directorio carpeta2 con todos los permisos para el propietario y lectura y ejecución para los del
	mismo grupo. Dentro file1 con lectura y escritura para el propietario y los del grupo y file2 con los
	mismos para el propietario y sólo lectura para el grupo.
16. Desde otro usuario probar todas las operaciones que se pueden hacer en los ficheros y directorios creados.
17. Visualizar la trayectoria completa del directorio actual. Crear dos directorios llamados correo y fuentes debajo del directorio actual.
18. Posicionarse en el directorio fuentes y crear los directorios dir1, dir2, dir3.
19. Crear el directorio menus bajo correo sin moverse del directorio actual.
20. Posicionarse en el directorio HOME. Borrar los directorios que cuelgan de fuentes que acaben en un número que no sea el 1.