<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cervezas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cervezas</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/Cerveza">Lista de Cervezas</a>
                        </li>
                        <!-- Agrega más elementos de navegación según sea necesario -->
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <h1>Lista de cervezas</h1>
        <br>
        <div class="container">
            <a href="http://localhost/Cerveza/Views/beer/create.php" class="btn btn-dark">Agregar Cerveza</a>
            <hr>

            <div class="row">
                <?php foreach ($cervezas as $cerveza) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <img src="data:image/png;base64,<?= base64_encode($cerveza->rutaImagen) ?>" class="card-img-top" alt="Cerveza">
                            <div class="card-body">
                                <h5 class="card-title"><?= $cerveza->nombre ?></h5>
                                <a href="http://localhost/Cerveza/Views/beer/show.php?id=<?= $cerveza->id ?>" class="btn btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
