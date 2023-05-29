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
            let file_name = input.files[0].name;
            const file_name_split = file_name.split('.');
            if (file_name_split[1] != "txt") {
                alert("L'extension du fichier doit être en : \t.txt \nCelui que vous avez choisi est en : ." + file_name_split[1]);
            } else {
                reader.readAsArrayBuffer(file);
                reader.onload = function () {
                    const buffer = reader.result;
                    const codification = document.getElementById("inputGroupSelect01");
                    const decoder = new TextDecoder(codification.value);
                    const text = decoder.decode(buffer);
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
                <input type="file" id="file" name="file" onchange="loadFile()">
                <select class="custom-select float-end" id="inputGroupSelect01">
                    <option value="UTF-8" selected>UTF-8</option>
                    <option value="UTF-16">UTF-16</option>
                    <option value="ISO-8859-1">ISO-8859-1</option>
                    <option value="Windows-1252">Windows-1252</option>
                </select>
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
