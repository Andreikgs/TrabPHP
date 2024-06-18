<?php
    include 'dao/ConnectionFactory.php';
    include 'dao/LoginDao.php';
    include 'model/Login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Projeto</title>
</head>
<body class="bg-warning-subtle">
    <div class="container-fluid">
        <?php
        include 'navBar.php';
        ?>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 mt-3 ">
                <h3 class="text-center">LOGIN</h3>
                <form action="controller/LoginController.php" method="post">
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="nome">NOME</label>
                        <input class="form-control " name="nome" type="text">
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="senha">Senha</label>
                        <input class="form-control " name="senha" type="password">
                    </div>
                    <div class="col-md-8 mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
                            <a href="index.php"><button class="btn btn-outline-danger" name="cadastrar" type="submit">
                                Cadastrar
                            </button></a>
                            <button class="btn btn-outline-success" name="validar" type="submit">
                                Logar
                            </button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</body>
</html>