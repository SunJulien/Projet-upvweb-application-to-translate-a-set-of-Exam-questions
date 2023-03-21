<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>
</head>
<body style="background-color: #f7f7f7">
    <?php
        if (isset($_POST) && !empty($_POST)){
            $filename = $HTTP_POST_FILES['file']['name'];
            $fichier = fopen($filename, 'r');
            $ligne = fgets($fichier);
            fclose($fichier);
        }
    ?>
    <div class="container">
        <div class="row justify-content-md-center" style="padding-top: 7em">
            <div class="col-sm">

                <h1>Convierte tus documentos</h1><br>
                <p>
                    Usa el formulario de la derecha para traducir y descargar los documentos.<br>
                    Dale nombre al fichero (sin extensión) y a la batería (NECESARIO).<br>
                    Luego pulsa el botón UPLOAD.
                </p>
                <p>
                    <img src="Icon/man.png" alt="man icon" width="41" height="44">
                    Antonio Martí Campoy
                </p>
                <p>
                    <img src="Icon/school.png" alt="man icon" width="41" height="50">
                    Universitat Politècnica de València
                </p>
            </div>
            <div class="col-sm-auto">
                <form action="#" method="post" enctype="multipart/form-data">
                    <input type="file" id="file" name="file">
                    <input type="submit" value="Upload">
                </form><br>
                <form action="#" method="post">
                    <textarea id="TextArea1" cols="50" rows="8" runat="server" placeholder="Código de la batería en lenguaje de marcas"></textarea><br><br>
                    <input type="text" id="correct" name="correct" style="width: 100%" placeholder="Nombre del archivo a generar"><br><br>
                    <input type="text" id="correct" name="correct" style="width: 100%" placeholder="Nombre de la bateria"><br><br>
                    <input type="submit" class="btn btn-secondary" value="Generate">
                </form>
            </div>
        </div>
    </div>
    <script>
        let textarea = document.getElementById('monTextarea');
        let texts = "<?php $ligne ?>";
        textarea.value = texts;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
