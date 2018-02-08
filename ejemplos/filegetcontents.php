<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 08/02/2018
 * Time: 10:11
 */
$cadena=file_get_contents("https://api.themoviedb.org/3/movie/500?language=es-ES&api_key=49db17578d1b5dab0aee2a93584c24c7");
$jsonPeli = json_decode($cadena);
//var_dump($jsonPeli);
echo $jsonPeli -> title;
//foreach ($jsonPeli as $k => $v)
//  echo $k. " => ". $v. "<br/>";