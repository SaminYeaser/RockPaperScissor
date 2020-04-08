<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once "bootstarp.php"?>
</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">The main game</h1>
            </div>
        </div>
    </div>
</div>

<div class="form">
    <div class="container">
        <div class="row">
            <div class="col-12 form-group">
                <form action="" method="post" class="text-center mt-10">
                    <select name="human" id="">
                        <option value="-1">Select</option>
                        <option value="0">Rock</option>
                        <option value="1">Paper</option>
                        <option value="2">Scissor</option>
                    </select>

            </div>
        </div>
    </div>
</div>
<div class="button">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <button formmethod="post" type="submit" name="play" value="Play" class="btn btn-primary">Play</button>
                <button formmethod="post" type="submit" name="logout" value="logout" class="btn btn-danger">Logout</button>
            </div>
        </div>
    </div>
</div>
</form>
</body>
</html>

<?php

    $name = array('Rock', 'Paper', 'Scissor');
    $human = isset($_POST['human']) ? $_POST['human']+0 : -1;
//    $computer = 0;

    $computer = rand(0, 2);
    function check($human, $computer)
    {
        if ($human == $computer) {
            return "Tie";
        } else if ($human == 'Paper' && $computer == 'Rock' || $human == 'Rock' && $computer == 'Scissor' || $human == 'Scissor' && $computer == 'Paper') {
            return  "You won!";
        } else if ($human == 'Rock' && $computer == 'Paper' || $human == 'Scissor' && $computer == 'Rock' || $human == 'Paper' && $computer =='Scissor') {
            return  "You loss!!";
        }
        return false;
    }

    $result = check($human, $computer);


    if (isset($_REQUEST['name'])) {
        echo "<p class='text-center'>Welcome</p>";
        echo "<h3 class='text-center'> " . $_REQUEST['name'] . " </h3>";
    }

    if ($human == -1) {
        echo "Please insert a strategy";
    } else {
        echo "Your play is: " . "<b>" .$name[$human]."</b>" . ".  Computer's play is: " ."<b>".$name[$computer]."</b>". ".  And the result is " ."<b>".check($name[$human], $name[$computer])."</b>";
    }

//if(!isset($_GET['username']) || strlen($_GET['username'])<1){
//    die('No one is here');
//}

    if (isset($_POST['logout'])) {
        header('location: index.php');
}
?>