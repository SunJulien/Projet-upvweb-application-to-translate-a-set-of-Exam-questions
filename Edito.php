<!DOCTYPE html>
<html lang="en">
<head>
    <title>upvsun Edito</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>
</head>
<body style="background-color: #f7f7f7">
    <script>

        function loadFile() {
            const input = document.getElementById("file");
            const file = input.files[0];
            const reader = new FileReader();
            // Récupération du nom du fichier
            let file_name = input.files[0].name;
            // Récupération de l'extension du fichier
            const file_name_split= file_name.split('.');

            if (file_name_split[1] != "txt"){
                // Affichage de l'extension
                alert("L'extension du fichier doit etre en .txt celui que vous avez choisie est en : ." + file_name_split[1]);
            }else{
                reader.readAsText(file);

                reader.onload = function () {
                    const text = reader.result;
                    const TextArea1 = document.getElementById("TextArea1");
                    const filename = document.getElementById("filename");
                    const theme = document.getElementById("theme");
                    TextArea1.value = text;
                    filename.value = file_name_split[0];
                    theme.value = file_name_split[0];
                };
            }
            reader.onerror = function () {
                console.log(reader.error);
            };
        }
        function clearBox() {
            const input = document.getElementById("TextArea1");
            input.value = "";
        }
    </script>
    <div class="container">
        <div id="nav-placeholder"></div>
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script>
            $.get("menu.php", function(data){
                $("#nav-placeholder").replaceWith(data);
            });
        </script>
        <div class="row justify-content-md-center" style="padding-top: 7em">
            <div class="col-sm">
                <h1>Convierte tus documentos</h1><br>
                <p>
                    Usa el formulario de la derecha para traducir y descargar los documentos.<br>
                    Dale nombre al fichero (sin extensión) y a la batería (NECESARIO).<br>
                    Luego pulsa el botón ReadFile.
                </p>
                <p>
                    <img src="Icon/man.png" alt="man icon" width="31" height="34">
                    Sun Julien
                </p>
                <p>
                    <img src="Icon/man.png" alt="man icon" width="31" height="34">
                    Antonio Martí Campoy
                </p>
                <p>
                    <img src="Icon/school.png" alt="man icon" width="31" height="40">
                    Universitat Politècnica de València
                </p>
            </div>
            <div class="col-sm-auto">
                <input type="file" id="file" name="file">
                <input type="submit" id="clearbox" name="clearbox" value="Clear" onclick="clearBox()" style="float: right">
                <input type="submit" id="readfile" name="readfile" value="Readfile" onclick="loadFile()" style="float: right">

                <form id="monFormulate" action="generate.php" method="POST" style="padding-top: 0.1em">
                    <textarea id="TextArea1" name="TextArea1" cols="55" rows="15" placeholder="Código de batería en lenguaje de marcas&#10;Puede escribir o importar un documento .txt&#10;Luego léalo con el botón readfile"></textarea><br><br>
                    <input type="text" id="filename" name="filename" style="width: 100%" placeholder="Nombre del archivo a generar"><br><br>
                    <input type="text" id="theme" name="theme" style="width: 100%" placeholder="Nombre de la bateria"><br><br>
                    <input type="submit" class="btn btn-secondary" style="font-size:1em;" value="Generate">
                </form><br><br>
                <script>
                    document.getElementById("monFormulate").addEventListener("submit", function(event) {
                        // Empêcher l'envoi du formulaire
                        event.preventDefault();
                        // Récupérer la valeur du champ "nom"
                        var TextArea1 = document.getElementById("TextArea1").value;
                        var filename = document.getElementById("filename").value;
                        var theme = document.getElementById("theme").value;

                        // Vérifier si le champ est vide
                        if (TextArea1.trim() == ''||filename.trim() == ''||theme.trim() == '') {
                            // Afficher un message d'erreur
                            alert("All field must be fill");
                            return false;
                        }
                        // Si tout est valide, envoyer le formulaire
                        this.submit();
                    });
                </script>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
