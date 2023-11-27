<?php


namespace App\Controllers;

use App\Models\Beer;

require "app/models/Beer.php";


class BeerController
{
    function __construct()
    {
        //echo "Contruyendo un beer controller";
    }

    function index()
    {
        $cervezas = Beer::all();
        //print_r($cervezas);
        //die();
        // echo "<br> En e INDEX de beer";
        require "Views/beer/index.php";
    }
    /*Ver detalles de una cerveza */

    function show($args)
    {
        $id = (int)$args[0];
        $cerveza = Beer::find($id);

        // Verificar si la cerveza se encontró antes de incluir la vista
        if ($cerveza) {
            require "Views/beer/show.php";
        } else {
            //  mostrar un mensaje de error
            echo "La cerveza no se encontró o hubo un problema al recuperarla.";
        }
    }


    function store()
{
    $cerveza = new Beer();

    // Obtener datos del formulario
    $cerveza->nombre = htmlspecialchars($_POST["nombre"]);
    $cerveza->tipo = htmlspecialchars($_POST["tipo"]);
    $cerveza->graduacionAlcoholica = (float)$_POST["graduacionAlcoholica"];
    $cerveza->pais = htmlspecialchars($_POST["pais"]);
    $cerveza->precio = (float)$_POST["precio"];

    // Manejar la imagen
    if ($_FILES["rutaImagen"]["error"] == UPLOAD_ERR_OK) {
        $imagenTmpName = $_FILES["rutaImagen"]["tmp_name"];
        $imagenContent = file_get_contents($imagenTmpName);
        $cerveza->rutaImagen = $imagenContent;
    }

    // Insertar en la base de datos
    $resultado = $cerveza->insert();

    // Guardar el documento asociado
    $documento = $_FILES["rutaImagenDesc"];

    if ($documento["error"] == UPLOAD_ERR_OK) {
        $extension = pathinfo($documento["name"], PATHINFO_EXTENSION);
        $extensionesPermitidas = array("pdf", "docx");

        if (in_array(strtolower($extension), $extensionesPermitidas)) {
            $documentoTmpName = $documento["tmp_name"];
            $documentoName = "beer_desc/" . $cerveza->nombre . "." . $extension;

            // Mover el archivo a la carpeta "beer_desc"
            move_uploaded_file($documentoTmpName, $documentoName);
        } else {
            // Tipo de archivo no permitido
            echo "Error: El tipo de archivo no es válido. Solo se permiten archivos PDF o DOCX.";
        }
    }

    // Redirigir a la página principal
    header('Location:/Cerveza/beer');
}

    // Función de actualizar el cual mostrará
function update()
{
    $id = $_POST["id"]; // Puedes cambiar a $_REQUEST si es necesario
    $cerveza = Beer::find($id);

    // Obtener datos del formulario
    $cerveza->nombre = $_POST["nombre"];
    $cerveza->tipo = $_POST["tipo"];
    $cerveza->graduacionAlcoholica = $_POST["graduacionAlcoholica"];
    $cerveza->pais = $_POST["pais"];
    $cerveza->precio = $_POST["precio"];

    // Manejar la imagen
    if ($_FILES["rutaImagen"]["error"] == UPLOAD_ERR_OK) {
        $imagenTmpName = $_FILES["rutaImagen"]["tmp_name"];
        $imagenContent = file_get_contents($imagenTmpName);
        $cerveza->rutaImagen = $imagenContent;
    }

    // Actualizar en la base de datos
    $cerveza->save();

    // Redirigir a la página principal
    header('Location:/beer');
}


    //Funcion en la que se Borrara una cerveza , pero sera el nombre quien indique que usuario se va a borrar

    function delete($args)
    { //Esto acctualiza un nuevo usuario

        //Primero coges el ide del usuario y luego se modifocara el usurio
        $nombre = (int)$args[0];
        $cerveza = Beer::find($nombre); //busca la infornacion deun unico usuario
        $cerveza->delete();
        header('Location:/beer'); ///esto llamara al update.php

    }

    
}
