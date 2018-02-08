<?php
$respuesta=json_decode(file_get_contents("https://api.themoviedb.org/3/movie/500?language=es-ES&api_key=49db17578d1b5dab0aee2a93584c24c7"),true);
foreach ($respuesta as $k=>$v)
    print_r ($k." => ".$v."<br/>");
//echo file_get_contents("https://api.themoviedb.org/3/movie/500?language=es-ES&api_key=49db17578d1b5dab0aee2a93584c24c7");