<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">        <title>upvsun website</title>

<nav>
    <div style="background-color: lightgreen;">
        <br>
        <h1 style = "color: white;text-align: center;font-size: 5em;">Editor online</h1>
        <ul class="nav nav-tabs justify-content-center" >
            <li class="nav-item">
                <a id="index" class="nav-link" style = "color: white;font-size: 2em;" href="index.php">Welcome</a>
            </li>
            <li class="nav-item">
                <a id="Question" class="nav-link" style = "color: white;font-size: 2em;" href="Question.php">Upload</a>
            </li>
            <li class="nav-item">
                <a id="todo_list" class="nav-link" style = "color: white;font-size: 2em;" href="todo_list.php">Write</a>
            </li>
            <li class="nav-item">
                <a id="Register" class="nav-link" style = "color: white;font-size: 2em;" href="Register.php">Register</a>
            </li>
            <li class="nav-item">
                <a id="Register" class="nav-link" style = "color: white;font-size: 2em;" href="Register.php">Help</a>
            </li>
        </ul>
    </div>
</nav>
<script src="//code.jquery.com/jquery.min.js"></script>
<script>
    function replaceClass(id, oldClass, newClass) {
        let elem = $(`#${id}`);
        if (elem.hasClass(oldClass)) {
            elem.removeClass(oldClass);
        }
        elem.addClass(newClass);
        elem.css("color", "#000000");
    }
    var url = jQuery(location).attr("href");

    switch(url) {
        case "http://158.42.180.106/index.php":
            replaceClass("index", "nav-link", "nav-link active");
            break;
        case "http://158.42.180.106/Question.php":
            replaceClass("Question", "nav-link", "nav-link active");
            break;
        case "http://158.42.180.106/todo_list.php":
            replaceClass("todo_list", "nav-link", "nav-link active");
            break;
        case "http://158.42.180.106/Register.php":
            replaceClass("Register", "nav-link", "nav-link active");
            break;
        default:
        // code block
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
