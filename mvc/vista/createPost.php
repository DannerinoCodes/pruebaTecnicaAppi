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
            <hr>
            <h2 class="display-2 text-center">Nuevo post</h2>
            <hr>
            <div class="container text-center">
                {{errores}}
                <div>

                    <label class="{{class-users}}" for="users">Autor</label>
                    <select class="form-control" name="users">
                        {{users}}
                    </select>
                </div><br>
                <div>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Título" value='<?php echo $val->restoreValue('title'); ?>'>
                    <span>{{war-title}}</span>
                </div> <br>
                <div>
                    <textarea id="body" name="body" rows="3" class="form-control" value='<?php echo $val->restoreValue('body'); ?>'></textarea>
                    <span>{{war-body}}</span>
                </div><br>
                <div>
                    <button type="submit" name="createPost">Publicar</i></button>
                </div>
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