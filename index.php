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

    <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Type of question
        </button>
        <ul class="dropdown-menu">
            <li><button class="dropdown-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTrue/False" aria-expanded="false" aria-controls="collapseTrue/False">True/False</button></li>
            <li><button class="dropdown-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSimple" aria-expanded="false" aria-controls="collapseSimple">Choix Simple</button></li>
            <li><button class="dropdown-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMultiple" aria-expanded="false" aria-controls="collapseMultiple">Choix Multiple</button></li>
            <li><button class="dropdown-item" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRemplir" aria-expanded="false" aria-controls="collapseRemplir">Remplir</button></li>


        </ul>
    </div>
    <br>
    <style>
        td {
            text-align: center;
            padding-left: 2em;
        }
        th{
            padding-left: 2em;
        }

    </style>
    <div class="collapse" id="collapseTrue/False">
        <form action="handling.php" method="POST">
            <table>
                <tr>
                    <th><label for="answer">Answer</label></th>
                    <th><label for="question">Question :</label></th>
                    <th><input type="text" id="question" name="question"></th>
                </tr>
                <tr>
                    <td><input type="radio" id="True" name="answer" value="True"></td>
                    <th><label for="True">True</label></th>
                </tr>
                <tr>
                    <td><input type="radio" id="False" name="answer" value="False"></td>
                    <th><label for="False">False</label></th>
                </tr>
                <tr>
                    <td><input type="submit" value="Register"></td>
                </tr>
            </table>

        </form>
    </div>
    <br>
    <div class="collapse" id="collapseSimple">
        <form action="handling.php" method="POST">
            <table>
                <tr>
                    <th><label for="answer">Answer</label></th>
                    <th><label for="question">Question :</label></th>
                    <th><input type="text" id="question" name="question"></th>
                </tr>
                <tr>
                    <td><input type="radio" id="correct1" name="answer" value="1"></td>
                    <th><label for="answer1">Answer 1 :</label></th>
                    <th><input type="text" id="answer1" name="answer1"></th>
                </tr>
                <tr>
                    <td><input type="radio" id="correct2" name="answer" value="2"></td>
                    <th><label for="answer2">Answer 2 :</label></th>
                    <th><input type="text" id="answer2" name="answer2"></th>
                </tr>
                <tr>
                    <td><input type="radio" id="correct3" name="answer" value="3"></td>
                    <th><label for="answer3">Answer 3 :</label></th>
                    <th><input type="text" id="answer3" name="answer3"></th>
                </tr>
                <tr>
                    <td><input type="radio" id="correct4" name="answer" value="4"></td>
                    <th><label for="answer4">Answer 4 :</label></th>
                    <th><input type="text" id="answer4" name="answer4"></th>
                </tr>
                <tr>
                    <td><input type="submit" value="Register"></td>
                </tr>
            </table>

        </form>
    </div>






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
