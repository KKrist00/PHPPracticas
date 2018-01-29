<?php

error_reporting(E_ALL);

function pruebaFichero($fich){

    if (!file_exists($fich)) {

        echo "Fichero no encontrado ".$fich;
        die();
    }

    $file = fopen($fich, "r");

    while (!feof($file))

        echo fgets($file) . "<br />";

    fclose($file);
}

function leerOrdenado($rutaFichero){

// abrir el fichero

    $fich_desc = fopen($rutaFichero);

    $c1_total = 0;
    $c1_subtotal = 0;
    $registro = fgets($fich_desc); // lectura del primer registro
    $c1 = explode("$", $registro)[0];
    $c1_ant = $c1;

    while (!feof($fich_desc)) {

        $c1 = explode("$", $registro)[0];
        $c1_ant = $c1;

        while (!feof($fich_desc) && ($c1 == $c1_ant)) {
            
            $c1 = explode("$", $registro)[0];
            $c1_subtotal += explode("$", $registro)[1];
            $registro = fgets($fich_desc); // leer siguiente ...
        }

        $c1_total += $c1_subtotal;

    }

    fclose($fich_desc);
}