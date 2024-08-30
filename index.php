<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/syle.css" rel="stylesheet">
</head>
<body style="background-image: linear-gradient(rgba(90, 10, 11, 0.9),
rgba(90, 10, 11, 0.9)), url(img/fondo5.jpg);">
    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    
                </div>
                <p>
                    <?php
                        if(!isset($_GET["error"]))
                        {
                            echo "&nbsp;";
                        }
                        else
                        {
                        echo '<div class="alert alert-danger" role="alert">
                            Error en el Acceso.
                        </div>';
                        }
                    ?>
                </p>
                <form action="control.php" method="POST" class="col-12">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Usuario" id="user" name="user">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
                    </div>
                    <button class=" btn btn-danger" type="submit">Entrar</button>
                </form>

            </div>
        </div>
    </div>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>