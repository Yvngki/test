<?php error_reporting(0) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php if($_GET['q'] == 'login' || $_GET['q'] == NULL){ ?>
    <div class="container d-flex bg-light justify-content-center align-items-center" style="height:100vh;padding:50px 0px">
        <form action="inc/login.php" method="post">
            <div class="card">
                <div class="card-header h4">
                    Login
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
                <a href="index.php?q=register">register</a>
            </div>
        </form>
    </div>

    <?php
    }
    ?>

    <?php 

    if($_GET['q'] == 'register'){
    ?>

<div class="container d-flex bg-light justify-content-center align-items-center" style="height:100vh;padding:50px 0px">
        <form action="inc/register.php" method="post">
            <div class="card">
                <div class="card-header h4">
                    Register
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="Username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <input type="submit" value="submit" class="btn btn-primary">
                </div>
                <a href="index.php?q=login">login</a>
            </div>
        </form>
    </div>
        <?php
    }
        ?>
    <script src="dist/js/bootstrap-bundle.js"></script>
</body>
</html>