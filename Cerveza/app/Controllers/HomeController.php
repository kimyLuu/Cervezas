<?php
namespace App\Controllers;
use App\Models\Beer;
require "app/models/Beer.php";



class HomeController{
    function __construct()
    {
        //echo "Contruyendo un home controller";
    }

    function index()
    {
        $cervezas = Beer::all();
        //print_r($cervezas);
        //die();
        // echo "<br> En e INDEX de beer";
        require "Views/home/index.php";
    }
    /*Ver detalles de una cerveza */

    function show($args)
    {
        $id = (int)$args[0];
        $cerveza = Beer::find($id);

        // Verificar si la cerveza se encontró antes de incluir la vista
        if ($cerveza) {
            require "Views/home/show.php";
        } else {
            //  mostrar un mensaje de error
            echo "La cerveza no se encontró o hubo un problema al recuperarla.";
        }
    }

}