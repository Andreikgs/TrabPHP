<?php
    class BuildDao{
        public function inserir(Build $build){
            try{
                $sql = "INSERT INTO build(personagem_id, item_id) VALUES (:personagem_id, :item_id)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":personagem_id", $build->getPersonagemId());
                $con_sql->bindValue(":item_id", $build->getItemId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir Item</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT
	                    build.id as id,
                        personagem.nome AS personagem,
                        item.nome AS item
                        FROM build
                        JOIN
                        personagem ON build.personagem_id = personagem.id
                        JOIN
                        item ON build.item_id = item.id;";

                $result = ConnectionFactory::getConnection()->query($sql);
                $build = $result->fetchAll(PDO::FETCH_ASSOC);
                $BuildLista = array();
                foreach($build as $b){
                    $BuildLista[] = $this->listarBuild($b);
                }
                return $BuildLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar Itens: $e";
            }
        }

        public function listarBuild($row){
            $build = new Build();
            $build->setId($row['id']);
            $build->setNomePersonagem($row['personagem']);
            $build->setNomeItem($row['item']);
            return $build;
        }

        public function delete(Build $build) {
            try{
                $sql = "DELETE FROM build WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $build->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir Item: $e";
            }
        }

    }
?>