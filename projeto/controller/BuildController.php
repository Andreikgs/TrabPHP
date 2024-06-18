<?php
    include '../dao/connectionFactory.php'; //conexao com banco
    include '../dao/BuildDao.php'; //data acces object
    include '../model/Build.php'; //Classe fabricante
    require_once '../model/Build.php';
    require_once '../model/Personagem.php';
    require_once '../model/Item.php';

    $build = new Build();
    $buildDao = new BuildDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrar'])){
        $build->setPersonagemId($_POST['personagem_id']);
        $build->setItemId($_POST['item_id']);
        $buildDao->inserir($build);
        header("location: ../view/build.php");
    }elseif(isset($_GET['del'])){
        $build->setId($_GET['del']);
        $buildDao->delete($build);
        header("location: ../view/build.php");
    }


?>