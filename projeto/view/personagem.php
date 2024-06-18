<?php  
 include '../dao/ConnectionFactory.php';
 include '../dao/PersonagemDao.php';
 include '../model/Personagem.php';
 //include 'view/personagem.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Personagem</title>
</head>
<body class="bg-warning-subtle">
    <div class="container-fluid">
        <?php
            include 'viewNavBar.php';
        ?>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form action="../controller/PersonagemController.php" method="post">
                <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="nome">NOME</label>
                        <input class="form-control " name="nome" type="text" required>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="sexo">SEXO</label>
                        <select class="form-select" name="sexo" id="">
                        <option selected>Escolha seu Sexo</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                        <label class="form-label" for="raca">RAÇA</label>
                        <select class="form-select" name="raca" id="">
                        <option selected>Escolha sua Raça</option>
                        <option value="Humano">Humano</option>
                        <option value="Orc">Orc</option>
                        <option value="Elfo">Elfo</option>
                        <option value="Goblin">Goblin</option>
                        <option value="Ogro">Ogro</option>
                        </select>
                    </div>
                    <div class="col-md-5 p-2 mx-auto">
                    <label for="historia" class="form-label">HISTORIA</label>
                    <textarea class="form-control" name="historia" id="historia" rows="3"></textarea>
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
                                <a href="../controller/PersonagemController.php?del=<?= $per->getId() ?>"><button class="btn btn-danger btn-sm" name="del" type="button">Excluir</button></a>
                              
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