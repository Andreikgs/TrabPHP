<?php  
 include '../dao/ConnectionFactory.php';
 include '../dao/ItemDao.php';
 include '../model/Item.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Item</title>
</head>
<body class="bg-warning-subtle">
    <div class="container-fluid">
        <?php
            include 'viewNavBar.php';
        ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="../controller/ItemController.php" method="post">
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="nome">NOME</label>
                        <input class="form-control " name="nome" type="text" required>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="categoria">CATEGORIA</label>
                        <select class="form-select" name="categoria" id="">
                        <option selected>Escolha a Categoria</option>
                        <option value="Ataque">ATAQUE</option>
                        <option value="Defesa">DEFESA</option>
                        </select>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="atributo">ATRIBUTO</label>
                        <input class="form-control " name="atributo" type="text" required>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="valor">VALOR</label>
                        <input class="form-control " name="valor" type="number" required>
                    </div>
                    <div class="col-md-8 mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
                        <a href="view/personagem.php">
                            <button class="btn btn-outline-success" name="cadastrar" type="submit">
                                Salvar
                            </button>
                        </a>
                            
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Atributo</th>
                            <th scope="col">Valor</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $itemDao = new ItemDao();
                            foreach($itemDao->read() as $item) :
                        ?>
                        <tr>
                            <td><?= $item->getId()?></td>
                            <td><?= $item->getNome()?></td>
                            <td><?= $item->getCategoria()?></td>
                            <td><?= $item->getAtributo()?></td>
                            <td><?= $item->getValor()?></td>
                            
                            <td>
                                <a href="../controller/ItemController.php?del=<?= $item->getId() ?>"><button class="btn btn-danger btn-sm" name="del" type="button">Excluir</button></a>
                              
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
</html>