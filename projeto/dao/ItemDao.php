<?php
    class ItemDao{
        public function inserir(Item $item){
            try{
                $sql = "INSERT INTO item(nome, categoria, atributo, valor) VALUES (:nome, :categoria, :atributo, :valor)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":nome", $item->getNome());
                $con_sql->bindValue(":categoria", $item->getCategoria());
                $con_sql->bindValue(":atributo", $item->getAtributo());
                $con_sql->bindValue(":valor", $item->getValor());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir Item</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM item";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $itemLista = array();
                foreach($lista as $l){
                    $itemLista[] = $this->listarItem($l);
                }
                return $itemLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar Itens: $e";
            }
        }

        public function listarItem($row){
            $item = new Item($row['id'], $row['nome'], $row['categoria'], $row['atributo'], $row['valor']);
            $item->setId($row['id']);
            $item->setNome($row['nome']);
            $item->setCategoria($row['categoria']);
            $item->setAtributo($row['atributo']);
            $item->setValor($row['valor']);
            return $item;
        }

        public function delete(Item $item) {
            try{
                $sql = "DELETE FROM item WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $item->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir Item: $e";
            }
        }

    }
?>