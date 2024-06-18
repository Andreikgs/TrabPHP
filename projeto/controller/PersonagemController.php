<?php
    include '../dao/connectionFactory.php'; //conexao com banco
    include '../dao/PersonagemDao.php'; //data acces object
    include '../model/Personagem.php'; //Classe fabricante

    $persona = new Personagem();
    $personaDao = new PersonagemDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrar'])){
        $persona->setNome($_POST['nome']);
        $persona->setSexo($_POST['sexo']);
        $persona->setRaca($_POST['raca']);
        $persona->setHistoria($_POST['historia']);
        $personaDao->inserir($persona);
        header("location: ../view/personagem.php");
    }elseif(isset($_GET['del'])){
        $persona->setId($_GET['del']);
        $personaDao->delete($persona);
        header("location: ../view/personagem.php");
    }


?>