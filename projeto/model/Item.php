
<?php
class Item{
    private $id;
    private $nome;
    private $categoria;
    private $atributo;
    private $valor;

    public function __construct($nome = null) {
        $this->nome = $nome;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getAtributo(){
        return $this->atributo;
    }

    public function setAtributo($atributo){
        $this->atributo = $atributo;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function __toString(){
        return "Item: Nome: {$this->nome} - Categoria: {$this->categoria} - Atributo: {$this->atributo} - Valor: {$this->valor}";
    }
}
?>
