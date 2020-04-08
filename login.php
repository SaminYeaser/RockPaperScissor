<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rock Paper Scissor</title>


</head>
<?php require_once "bootstarp.php"?>
<body>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <h1 class="text-center">Rock Paper Scissor</h1>
            </div>
        </div>
    </div>
</div>

<div class="form">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <form method="post">
                    <div class="form-group">
                        <!--                            <label for="username">Username</label>-->
                        <input name="username" placeholder="Username" type="text" class="form-control" id="exampleInputEmail1">
                        <!--                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                    </div>
                    <div class="form-group">
                        <!--                            <label for="exampleInputPassword1">Password</label>-->
                        <input name="password" placeholder="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php


$hashPass = 'c403af0bede78cb556e7d13dbf9d34e9'; //samin
$failure = false;
if(isset($_POST['username']) && isset($_POST['username'])) {
    if (strlen($_POST['username']) < 1 || strlen($_POST['password']) < 1) {
        $failure = "Password or name is very short";
    } else {
        $check = hash('md5', $_POST['password']);

        if ($check == $hashPass) {
            header("Location: game.php?name=".urlencode($_POST['username']));
        } else {
            $failure =  "Wrong password";
        }
    }
}
if ( $failure !== false ) {
    // Look closely at the use of single and double quotes
    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
}
?>