#!/bin/bash

echo -e "Selecciona la opción para desarrollar en ShiftPress: \n 1) Elixir \n 2) Solo gulp >"
read number

Option_Shift=$number

if [ $Option_Shift = 1 ]
then
   echo "Seleccionaste Elixir"
   cp ./gulpfile-elixir.js ./gulpfile.js
   echo "EL archivo gulpfile.js se ha generado correctamente! Puedes usar los comandos de elixir"
   rm ./gulpfile-elixir.js
   rm ./gulpfile-gulp.js
   rm ./structure-development.sh
elif [ $Option_Shift = 2 ]
then
   echo "Seleccionaste Gulp"
   cp ./gulpfile-gulp.js ./gulpfile.js
   echo "EL archivo gulpfile.js se ha generado correctamente!"
   rm ./gulpfile-elixir.js
   rm ./gulpfile-gulp.js
   rm ./structure-development.sh
else
   echo "Seleccion incorrecta intentalo nuevamente"
fi
