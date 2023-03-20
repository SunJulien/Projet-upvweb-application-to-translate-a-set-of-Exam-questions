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
            <div style="flex: 5;">
                <div id="nav-placeholder">
                </div>
                <script src="//code.jquery.com/jquery.min.js"></script>
                <script>
                    $.get("navigation.php", function(data){
                        $("#nav-placeholder").replaceWith(data);
                    });
                </script>


            </div>
            <?php
            $servername = "localhost";
            $user = "example_user";
            $password = "password";
            $database = "question";
            $table = "question";

            // Create connection
            $conn = mysqli_connect($servername, $user, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT * FROM question";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo $row["id"]. " -Question: " . $row["libelle"]. " - answer1: " . $row["answer1"]. " - answer2: " . $row["answer2"]. " - answer3: " . $row["answer3"]. " - answer4: " . $row["answer4"]. " - Correct answer: " . $row["correct"]. "<br>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>

        </div>

        <div style="flex: 0.1; height: 100%;"></div>
        <div style="flex: 1; background-color: lightgreen; height: 100%;"></div>
        <div style="flex: 0.1; height: 100%;"></div>

    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
