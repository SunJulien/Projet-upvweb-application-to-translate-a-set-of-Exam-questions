<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>
    </head>
    <body>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="index.php">index</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="info.php">info serveur</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="xdebug.php">xdebug</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="todo_list.php">todo_lists</a>
            </li>
        </ul>
        <?php
        $user = "example_user";
        $password = "password";
        $database = "example_database";
        $table = "todo_list";

        try {
          $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
          echo "<h2>TODO</h2><ol>";
          foreach($db->query("SELECT content FROM $table") as $row) {
            echo "<li>" . $row['content'] . "</li>";
          }
          echo "</ol>";
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
