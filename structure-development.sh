#!/bin/bash

echo -n "Selecciona la opción para desarrollar en Shift Press: 1) Elixir - 2) Solo gulp > "
read number

Option_Shift=$number

if [ $Option_Shift = 1 ]
then
	echo "Seleccionaste Elixir"
	cp --archive ./gulpfile-elixir.js ./gulpfile.js
	echo "EL archivo gulpfile.js se ha generado correctamente! Puedes usar los comandos de elixir"
elif [ $Option_Shift = 2 ]
then
 	echo "Seleccionaste Gulp"
	cp --archive ./gulpfile-gulp.js ./gulpfile.js
	echo "EL archivo gulpfile.js se ha generado correctamente!"
else
	echo "Seleccion incorrecta intentalo nuevamente"
fi