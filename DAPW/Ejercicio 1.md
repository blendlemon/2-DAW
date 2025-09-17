Todos lo que entregues en formato pdf
1. Listar todos los archivos del directorio bin.
	ls /bin/
2. Listar todos los archivos del directorio tmp.
	ls /tmp/
3. Listar todos los archivos del directorio etc que empiecen por t en orden inverso.
	ls /etc/t* -r
4. Listar todos los archivos del directorio dev que empiecen por tty y tengan 5 caracteres.
	ls /dev/tty??
5. Listar todos los archivos del directorio dev que empiecen por tty y acaben en 1,2,3 ó 4.
	ls /dev/tty[1-4]
6. Listar todos los archivos del directorio dev que empiecen por t y acaben en C1.
	 ls /dev/t\*C1
7. Listar todos los archivos, incluidos los ocultos, del directorio raíz.
	ls -a /
8. Listar todos los archivos del directorio etc que no empiecen por t.
	ls /etc/[!t]*
9. Listar todos los archivos del directorio usr y sus subdirectorios.
	 ls /usr/ -R
10. Cambiarse al directorio tmp.
	cd /tmp/
11. Verificar que el directorio actual ha cambiado.
	pwd
12. Mostrar el día y la hora actual. Comando Date
	date
13. Con un solo comando posicionarse en el directorio $HOME.
	cd ~
14. Verificar que se está en él.
	pwd
15. Listar todos los ficheros del directorio HOME mostrando su número de i-nodo.
	ls -i ~
16. Borrar todos los archivos y directorios visibles de vuestro directorio PRUEBA.
	rm -r ~/PRUEBA/
17. Crear los directorios dir1, dir2 y dir3 en el directorio PRUEBA. Dentro de dir1 crear el directorio dir11. Dentro del directorio dir3 crear el directorio dir31. Dentro del directorio dir31, crear los directorios dir311 y dir312.
	mkdir /PRUEBA/dir1
	mkdir /PRUEBA/dir2
	mkdir /PRUEBA/dir3
	mkdir /PRUEBA/dir1/dir11
	mkdir /PRUEBA/dir3/dir31
	mkdir /PRUEBA/dir3/dir31/dir311
	mkdir /PRUEBA/dir3/dir31/dir312
18. Copiar el archivo /etc/motd a un archivo llamado mensaje de vuestro directorio PRUEBA.
	sudo cp ~/PRUEBA/mensaje /etc/motd
19. Copiar mensaje en dir1, dir2 y dir3.
	cp ~/PRUEBA/mensaje /PRUEBA/dir1
20. Comprobar el ejercicio anterior mediante un solo comando.
	ls ~/PRUEBA / -R
21. Copiar los archivos del directorio rc.d que se encuentra en /etc al directorio dir31.
	cp -r  /etc/rc0.d/* ~/PRUEBA/dir3/dir31
22. Copiar en el directorio dir311 los archivos de /bin que tengan una a como segunda letra y su nombre tenga cuatro letras.
	cp /bin/?a?? ~/PRUEBA/dir3/dir31/dir311
23. Copiar el directorio de otro usuario y sus subdirectorios debajo de dir11 (incluido el propio directorio).
	sudo cp -r /home/otrousuario /home/diego/PRUEBA/dir1/dir11
24. Mover el directorio dir31 y sus subdirectorios debajo de dir2.
	mv ~/PRUEBA/dir3/dir31 ~/PRUEBA/dir2
25. Mostrar por pantalla los archivos ordinarios del directorio HOME y sus subdirectorios.
	ls /HOME/ -R
26. Ocultar el archivo mensaje del directorio dir3.
	mv ~/PRUEBA/dir3/mensaje.txt ~/PRUEBA/dir3/.mensaje.txt
27. Borrar los archivos y directorios de dir1, incluido el propio directorio.
	sudo rm -r ~/PRUEBA/dir1
28. Copiar al directorio dir312 los ficheros del directorio /dev que empiecen por t, acaben en una letra que vaya de la a a la b y tengan cinco letras en su nombre.
	cp /dev/t??[a-b] ~/PRUEBA/dir3/dir31/dir312
29. Borrar los archivos de dir312 que no acaben en b y tengan una q como cuarta letra.
	sudo rm -r ~/PRUEBA/dir3/dir31/dir312/???q[!b]
30. Mover el directorio dir312 debajo de dir3.
	mv ~/PRUEBA/dir3/dir31/dir312/ ~/PRUEBA/dir3/