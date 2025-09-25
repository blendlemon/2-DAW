
1. Crear los directorios dir1, dir2 y dir3 en vuestro HOME.
	sudo mkdir dir1 && sudo mkdir dir2 && sudo mkdir dir3
2. Crear el directorio dir3/dir31/dir311 con un solo comando.
	sudo mkdir -p dir3/dir31/dir311
3. Crear un enlace simbólico al directorio dir1 dentro del directorio dir3 llamado enlacedir1.
	sudo ln -s -r dir1 dir3
4. Posicionarse en dir3 y, empleando el enlace creado en el ejercicio anterior, crear el directorio nuevo1 dentro de dir1.
	sudo mkdir dir3/dir1/nuevo1
5. Utilizando el enlace creado copiar los archivos que empiecen por u del directorio /bin en directorio nuevo1.
	sudo cp /bin/u* dir3/dir1/nuevo1
6. Posicionarse en $HOME y copiar el fichero /etc/passwd como fich1.
	sudo cp /etc/passwd fich1
7. Crear dos enlaces duros del fichero fich1, llamarlo enlace, en los directorios dir1 y dir2.
	cp -l  fich1 dir1/enlace
	cp -l fich1 dir3/enlace
8. Borrar el archivo fich1 y copiar enlace en dir3.
	cp -l  fich1 dir2/enlace
	rm fich1
9. Crear un enlace simbólico (llamado enlafich1) al fichero enlace de dir2 en dir1.
	cp -s /dir2/enlace dir1/enlafich1
10. Posicionarse en dir1 y, mediante el enlace creado, copiar el archivo fichl dentro de dir311.
	cd dir1
	cp fich1 /dir3/dir31/dir311
11. Seguir en dir1 y, mediante el enlace creado, sacar por pantalla las líneas que tiene el archivo fich1.
	cat enlafich1
12. Borrar el fichero fich1 de dir2.
	rm dir2/fich1
13. Borrar todos los archivos y directorios creados durante los ejercicios.
	rm -r dir[1-3]