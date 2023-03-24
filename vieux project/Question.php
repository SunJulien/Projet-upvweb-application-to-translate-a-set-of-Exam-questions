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
                <br>
                <div class="card card-body">
                    <h2> true or false </h2>
                    <form action="handling.php" method="post">
                        <table style="width: 100%;">
                            <tr>
                                <th><label for="libelle">question:</label></th>
                                <th style="width: 90%"><input type="text" id="libelle" name="libelle" style="width: 100%"></th>
                            </tr>
                            <tr>
                                <th><label for="correct">true</label></th>
                                <td><input type="radio" id="correct" name="correct" value="1"></td>
                            </tr>
                            <tr>
                                <th><label for="correct">false</label></th>
                                <td><input type="radio" id="correct" name="correct" value="2"></td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="qtype" value="tf">
                                    <input type="hidden" name="answer1" value="true">
                                    <input type="hidden" name="answer2" value="false">
                                    <input type="submit" value="register">
                                </td>
                            </tr>
                        </table>
                    </form>

                </div>
                <br>
                <div class="card card-body">
                    <h2>one answer</h2>
                    <form action="handling.php" method="post">
                        <table style="width: 100%">
                            <tr>
                                <th style="width: 10%"><label for="libelle">question:</label></th>
                                <th><input type="text" id="libelle" name="libelle" style="width: 95%"></th>
                            </tr>
                            <tr>
                                <th><label for="answer1">answer 1:</label></th>
                                <th><input type="text" id="answer1" name="answer1" style="width: 95%"></th>
                                <td><input type="radio" id="correct" name="correct" value="1"></td>

                            </tr>
                            <tr>
                                <th><label for="answer2">answer 2:</label></th>
                                <th><input type="text" id="answer2" name="answer2" style="width: 95%"></th>
                                <td><input type="radio" id="correct" name="correct" value="2"></td>

                            </tr>
                            <tr>
                                <th><label for="answer3">answer 3:</label></th>
                                <th><input type="text" id="answer3" name="answer3" style="width: 95%"></th>
                                <td><input type="radio" id="correct" name="correct" value="3"></td>

                            </tr>
                            <tr>
                                <th><label for="answer4">answer 4:</label></th>
                                <th><input type="text" id="answer4" name="answer4" style="width: 95%"></th>
                                <td><input type="radio" id="correct" name="correct" value="4"></td>

                            </tr>
                            <tr>
                                <td>
                                    <input type="hidden" name="qtype" value="choice">
                                    <input type="submit" value="register">
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
