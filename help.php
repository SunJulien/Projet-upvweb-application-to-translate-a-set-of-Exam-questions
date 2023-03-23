<!DOCTYPE html>
<html>
<head>
    <title> help</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>

</head>
<body style="background-color: #f7f7f7">

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

            </div>
            <div class="col-sm-auto">

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
