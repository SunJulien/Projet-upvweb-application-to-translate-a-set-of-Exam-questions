<!DOCTYPE html>
<html lang="en">
	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>
	</head>
	<body>
    <div style="display: flex; flex-direction: row; width: 100%;height: 100vh;">

        <div style="flex: 0.1; height: 100%;"></div>
        <div style="flex: 1; background-color: lightgreen; height: 100%;"></div>
        <div style="flex: 0.1; height: 100%;"></div>

        <div style="flex: 5;">
            <div id="nav-placeholder">
            </div>
            <script src="//code.jquery.com/jquery.min.js"></script>
            <script>
                $.get("navigation.php", function(data){
                    $("#nav-placeholder").replaceWith(data);
                });

            </script>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <img src="QTIlogo.png" alt="QTI Logo">
                    </div>
                    <div class="col-sm">
                        One of three columns
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button>Subir fichero</button>
                    </div>
                    <div class="col-sm">
                        <button>Editior Online</button>
                    </div>
                    <div class="col-sm">
                        <button>Ayuda</button>
                    </div>
                </div>
        </div>

        <div style="flex: 0.1; height: 100%;"></div>
        <div style="flex: 1; background-color: lightgreen; height: 100%;"></div>
        <div style="flex: 0.1; height: 100%;"></div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
