
<?php
class Personagem{
    private $id;
    private $nome;
    private $sexo;
    private $raca;
    private $historia;

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

    public function getSexo(){
        return $this->sexo;
    }

    public function setSexo($sexo){
        $this->sexo = $sexo;
    }

    public function getRaca(){
        return $this->raca;
    }

    public function setRaca($raca){
        $this->raca = $raca;
    }

    public function getHistoria(){
        return $this->historia;
    }

    public function setHistoria($historia){
        $this->historia = $historia;
    }

    public function __toString(){
        return "Personagem: Nome: {$this->nome} - Sexo: {$this->sexo} - Raca: {$this->raca} - Historia: {$this->historia}";
    }
}
?>
