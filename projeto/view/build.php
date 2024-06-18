<?php  
 include '../dao/ConnectionFactory.php';
 include '../dao/ItemDao.php';
 include '../dao/PersonagemDao.php';
 include '../dao/BuildDao.php';
 include '../model/Item.php';
 include '../model/Personagem.php';
 include '../model/Build.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Build</title>
</head>
<body class="bg-warning-subtle">
    <div class="container-fluid">
        <?php
            include 'viewNavBar.php';
        ?>
        <div class="row">
            <div class="col-4">
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sexo</th>
                            <th scope="col">Raca</th>
                            <th scope="col">Historia</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $personaDao = new PersonagemDao();
                            foreach($personaDao->read() as $per) :
                        ?>
                        <tr>
                            <td><?= $per->getId()?></td>
                            <td><?= $per->getNome()?></td>
                            <td><?= $per->getSexo()?></td>
                            <td><?= $per->getRaca()?></td>
                            <td><?= $per->getHistoria()?></td>
                            <td>
                                <a href="../controller/PersonagemController.php?del=<?= $per->getId() ?>"></a>
                              
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
                <h3 class="text-center">BUILD</h3>
                <form action="../controller/BuildController.php" method="post">
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="personagem_id">ID PERSONAGEM</label>
                        <input class="form-control " name="personagem_id" type="number" required>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="item_id">ID ITEM</label>
                        <input class="form-control " name="item_id" type="number" required>
                    </div>
                    <div class="col-md-8 mb-3 d-grid gap-2 d-md-flex justify-content-md-end ">
                        <a href="view/build.php">
                            <button class="btn btn-outline-success" name="cadastrar" type="submit">
                                Salvar
                            </button>
                        </a>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Personagem</th>
                            <th scope="col">Item</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $buildDao = new BuildDao();
                            foreach($buildDao->read() as $build) :
                        ?>
                        <tr>
                            <td><?= $build->getId()?></td>
                            <td><?= $build->getNomePersonagem()?></td>
                            <td><?= $build->getNomeItem()?></td>
                            <td>
                                <a href="../controller/BuildController.php?del=<?= $build->getId() ?>"><button class="btn btn-danger btn-sm" name="del" type="button">Excluir</button></a>
                              
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="col-4">
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
                                <a href="../controller/ItemController.php?del=<?= $item->getId() ?>"></a>
                              
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>