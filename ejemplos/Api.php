<?php


$cadena =file_get_contents( "https://api.themoviedb.org/3/movie/50?language=es-ES&api_key=49db17578d1b5dab0aee2a93584c24c7");
   $jsonPeli = json_code($cadena);

var_dump($jsonPeli);

foreach ($jsonPeli as $k => $v){



}