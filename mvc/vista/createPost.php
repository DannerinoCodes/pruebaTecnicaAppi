    <?php $val = Validacion::getInstance(); ?>


    <?php include_once("navbar.php") ?>

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

    <?php include_once("footer.php") ?>