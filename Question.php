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
                <nav>
                    <div style="background-color: lightgreen;">
                        <br>
                        <h1 style = "color: white;text-align: center;" >Translate a set of exam questions</h1>
                        <ul class="nav nav-tabs justify-content-center" >
                            <li class="nav-item">
                                <a class="nav-link" style = "color: white;" href="index.php">Welcome</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"  href="Question.php">Question</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style = "color: white;" href="xdebug.php">xdebug</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style = "color: white;" href="todo_list.php">todo_lists</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <br>
                <div class="card card-body">
                    <h2> Write the answer </h2>
                    <form action="handling.php" method="POST">
                        <table style="width: 100%;">
                            <tr>
                                <th><label for="question">Question :</label></th>
                                <th style="width: 90%"><input type="text" id="question" name="question" style="width: 100%"></th>
                            </tr>
                            <tr>
                                <th><label for="answer">Answer :</label></th>
                                <th style="width: 90%"><input type="text" id="answer" name="answer" style="width: 100%"></th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="QType" value="write">
                                    <input type="submit" value="Register">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
                <br>
                <div class="card card-body">
                    <h2> True or False </h2>
                    <form action="handling.php" method="POST">
                        <table style="width: 100%;">
                            <tr>
                                <th><label for="question">Question :</label></th>
                                <th style="width: 90%"><input type="text" id="question" name="question" style="width: 100%"></th>
                            </tr>
                            <tr>
                                <th><label for="True">True</label></th>
                                <td><input type="radio" id="True" name="answer" value="True"></td>
                            </tr>
                            <tr>
                                <th><label for="False">False</label></th>
                                <td><input type="radio" id="False" name="answer" value="False"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="QType" value="truefalse">
                                    <input type="submit" value="Register">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
                <br>
                <div class="card card-body">
                    <h2>One/Multiple answer</h2>
                    <form action="handling.php" method="POST">
                        <table style="width: 100%">
                            <tr>
                                <th style="width: 10%"><label for="question">Question :</label></th>
                                <th><input type="text" id="question" name="question" style="width: 95%"></th>
                            </tr>
                            <tr>
                                <th><label for="answer1">Answer 1 :</label></th>
                                <th><input type="text" id="answer1" name="answer1" style="width: 95%"></th>
                                <td><input type="radio" id="answer1" name="answer" value="1"></td>

                            </tr>
                            <tr>
                                <th><label for="answer2">Answer 2 :</label></th>
                                <th><input type="text" id="answer2" name="answer2" style="width: 95%"></th>
                                <td><input type="radio" id="answer2" name="answer" value="2"></td>

                            </tr>
                            <tr>
                                <th><label for="answer3">Answer 3 :</label></th>
                                <th><input type="text" id="answer3" name="answer3" style="width: 95%"></th>
                                <td><input type="radio" id="answer3" name="answer" value="3"></td>

                            </tr>
                            <tr>
                                <th><label for="answer4">Answer 4 :</label></th>
                                <th><input type="text" id="answer4" name="answer4" style="width: 95%"></th>
                                <td><input type="radio" id="answer4" name="answer" value="4"></td>

                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="QType" value="choice">
                                    <input type="submit" value="Register">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <br>
            </div>

            <div style="flex: 0.1; height: 100%;"></div>
            <div style="flex: 1; background-color: lightgreen; height: 100%;"></div>
            <div style="flex: 0.1; height: 100%;"></div>

        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>
