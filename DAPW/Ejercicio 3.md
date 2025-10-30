1. Crear el directorio dir2 y dir3 en el directorio PRUEBA ¿Cuáles son los actuales permisos del directorio dir2?
	drwxr-xr-x
2. Utilizando la notación simbólica, eliminar todos los permisos de escritura (propietario, grupo, otros) del directorio dir2.
	chmod a-w dir2
3. Utilizando la notación octal, eliminar el permiso de lectura del directorio dir2, al resto de los usuarios.
	chmod 551 PRUEBA/dir2
4. ¿Cuáles son ahora los permisos asociados a dir2?
	dr-xr-x--x
5. Crear bajo dir2, un directorio llamado dir2l.
	mkdir PRUEBA/dir2/dir2l
6. Concederse a sí mismo permiso de escritura en el directorio dir2 e intentar de nuevo el paso anterior.
	chmod u+w PRUEBA/dir2
	mkdir PRUEBA/dir2/dir2l
7. ¿Cuáles son los valores por omisión asignados a los archivos?
	rwxr-xr-x
8. Cambiar el directorio actual al directorio dir3. Imprimir su trayectoria completa para verificar el cambio.
	 cd PRUEBA/dir3
	pwd

9. ¿Cuáles son los permisos asignados en su momento a este directorio?
	drwxrwxr-x
10. Establecer mediante el comando umask (buscar este comando) los siguientes valores por omisión: rwxr--r-- para los directorios y rw-r--r-- para los archivos ordinarios.
	umask 022
11. Crear cuatro nuevos directorios llamados dira, dirb, dirc, y dird bajo el directorio actual.
	mkdir dira dirb dirc dird
12. Comprobar los permisos de acceso de los directorios recién creados para comprobar el funcionamiento del comando umask.
	ls -ld dira dirb dirc dird
13. Crear el fichero uno. Quitarle todos los permisos de lectura. Comprobarlo. Intentar borrar dicho fichero.
	touch uno
	chmod a-r uno
	ls -l uno
	rm uno

14. Quitarle todos los permisos de paso al directorio dir2 y otorgarle todos los demás.
	chmod a-x PRUEBA/dir2
	chmod a+rw PRUEBA/dir2
	ls -ld PRUEBA/dir2

15. Crear en el directorio propio:
	El directorio carpeta1 con los tres permisos para el propietario, dentro de él fich1 con lectura y
	escritura para todos y fich2 con lectura y escritura para el propietario y sólo lectura para el resto.
	El directorio carpeta2 con todos los permisos para el propietario y lectura y ejecución para los del
	mismo grupo. Dentro file1 con lectura y escritura para el propietario y los del grupo y file2 con los
	mismos para el propietario y sólo lectura para el grupo.

	carpeta 1:
	mkdir carpeta1
	chmod 700 carpeta1
	touch carpeta1/fich1 carpeta1/fich2
	chmod 666 carpeta1/fich1
	chmod 644 carpeta1/fich2

	carpeta 2:
	mkdir carpeta2
	chmod 750 carpeta2
	touch carpeta2/file1 carpeta2/file2
	chmod 660 carpeta2/file1
	chmod 640 carpeta2/file2


16. Desde otro usuario probar todas las operaciones que se pueden hacer en los ficheros y directorios creados.
	su - usuario2
	ls, cd, cat, rm...
17. Visualizar la trayectoria completa del directorio actual. Crear dos directorios llamados correo y fuentes debajo del directorio actual.
	pwd
	mkdir correo fuentes

18. Posicionarse en el directorio fuentes y crear los directorios dir1, dir2, dir3.
	cd fuentes
	mkdir dir1 dir2 dir3

19. Crear el directorio menus bajo correo sin moverse del directorio actual.
	mkdir ../correo/menus

20. Posicionarse en el directorio HOME. Borrar los directorios que cuelgan de fuentes que acaben en un número que no sea el 1.
	cd ~
	rm -r fuentes/dir[2-9]
