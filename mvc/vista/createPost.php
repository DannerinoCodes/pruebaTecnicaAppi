<?php $val = Validacion::getInstance(); ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Appi</title>
</head>

<body>


    <div class="navbar d-flex justify-content-around">
        <a class="nav-item nav-link" href="?pagina=posts">Posts</a>
        <a class="nav-item nav-link" href="?pagina=users">Usuarios</a>
        <a class="nav-item nav-link" href="?pagina=createPost">Nuevo Post</a>
    </div>

    <div>
        <form action="index.php?pagina=createPost" method="post">
            <h1>NUEVO POST</h1>
            {{errores}}
            <div>
                <!-- ESTE INPUT HAY QUE CAMBIARLO POR EL SELECT DE USERS. NO OLVIDAR. -->
                <label class="{{class-userId}}" for="userId">Usuario</label>
                <input type="text" id="userId" name="userId" value='<?php echo $val->restoreValue('userId'); ?>'>
                <span>{{war-userId}}</span>
            </div>
            <div>
                <label class="{{class-title}}" for="title">Título</label>
                <input type="text" id="title" name="title" value='<?php echo $val->restoreValue('title'); ?>'>
                <span>{{war-titulo}}</span>
            </div>
            <div>
                <label class=" {{class-body}}" for="body">Descripción</label>
                <input id="body" name="body" value='<?php echo $val->restoreValue('body'); ?>'>
                <span>{{war-body}}</span>
            </div><br>
            <div>
                <button type="submit" name="createPost">Publicar</i></button>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>