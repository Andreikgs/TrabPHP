<?php
    include '../dao/connectionFactory.php'; //conexao com banco
    include '../dao/ItemDao.php'; //data acces object
    include '../model/Item.php'; //Classe fabricante

    $item = new Item();
    $itemDao = new ItemDao();

    //Pegar os dados enviados
    $dadosRequest = filter_input_array(INPUT_POST);

    //se a operacao for salvar
    if(isset($_POST['cadastrar'])){
        $item->setNome($_POST['nome']);
        $item->setCategoria($_POST['categoria']);
        $item->setAtributo($_POST['atributo']);
        $item->setValor($_POST['valor']);
        $itemDao->inserir($item);
        header("location: ../view/item.php");
    }elseif(isset($_GET['del'])){
        $item->setId($_GET['del']);
        $itemDao->delete($item);
        header("location: ../view/item.php");
    }


?>