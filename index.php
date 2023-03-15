<!DOCTYPE html>
<html lang="en">
	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>
	</head>
	<body>
    <div style="background-color: lightgreen;">
        <h1 style = "color: white;text-align: center;" >Translate a set of exam questions</h1>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style = "color: white;" href="info.php">info serveur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style = "color: white;" href="xdebug.php">xdebug</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" style = "color: white;" href="todo_list.php">todo_lists</a>
            </li>
        </ul>
    </div>
    <br>

    <form action="handling.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">

        <label for="email">Email :</label>
        <input type="email" id="email" name="email">

        <input type="submit" value="Enregistrer">
    </form>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
