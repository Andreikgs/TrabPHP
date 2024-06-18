
<?php

require_once 'Personagem.php';
require_once 'Item.php';

class Build{
    private $id;
    private $personagem_id;
    private $item_id;
    private $nomePersonagem;
    private $nomeItem;

    public function __construct() {
        $this->nomePersonagem = new Personagem();
        $this->nomeItem = new Item();
    }

    public function getNomePersonagem() {
        return $this->nomePersonagem->getNome();
    }

    public function setNomePersonagem($nome) {
        $this->nomePersonagem->setNome($nome);
    }

    public function setNomeItem($nome) {
        $this->nomeItem->setNome($nome);
    }

    public function getNomeItem() {
        return $this->nomeItem->getNome();
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPersonagemId(){
        return $this->personagem_id;
    }

    public function setPersonagemId($personagem_id){
        $this->personagem_id = $personagem_id;
    }

    public function getItemId(){
        return $this->item_id;
    }

    public function setItemId($item_id){
        $this->item_id = $item_id;
    }

    public function __toString(){
        return "BUILD: ID: {$this->id} - Endereço: {$this->personagem_id} - Documento: {$this->item_id}";
    }
}
?>
