<?php

echo "Soy B";

//warning No se resuelve el directorio
include "..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."C".DIRECTORY_SEPARATOR."C.php";

//correcto
//include __DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."C".DIRECTORY_SEPARATOR."C.php";