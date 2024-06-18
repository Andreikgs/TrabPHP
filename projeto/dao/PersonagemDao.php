<?php
    class PersonagemDao{
        public function inserir(Personagem $per){
            try{
                $sql = "INSERT INTO personagem(nome, sexo, raca, historia) VALUES (:nome, :sexo, :raca, :historia)";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":nome", $per->getNome());
                $con_sql->bindValue(":sexo", $per->getSexo());
                $con_sql->bindValue(":raca", $per->getRaca());
                $con_sql->bindValue(":historia", $per->getHistoria());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "<p>Erro ao inserir Personagem</p> $e";
            }
        }

        public function read(){
            try{
                $sql = "SELECT * FROM personagem";
                $result = ConnectionFactory::getConnection()->query($sql);
                $lista = $result->fetchAll(PDO::FETCH_ASSOC);
                $personagemLista = array();
                foreach($lista as $l){
                    $personagemLista[] = $this->listarPersonagem($l);
                }
                return $personagemLista;
            }catch(PDOException $e){
                echo "Ocorreu um erro ao listar Personagem: $e";
            }
        }

        public function listarPersonagem($row){
            $personagem = new Personagem($row['id'], $row['nome'], $row['sexo'], $row['raca'], $row['historia']);
            $personagem->setId($row['id']);
            $personagem->setNome($row['nome']);
            $personagem->setSexo($row['sexo']);
            $personagem->setRaca($row['raca']);
            $personagem->setHistoria($row['historia']);
            return $personagem;
        }

        public function delete(Personagem $per) {
            try{
                $sql = "DELETE FROM personagem WHERE id = :id";
                $con_sql = ConnectionFactory::getConnection()->prepare($sql);
                $con_sql->bindValue(":id", $per->getId());
                return $con_sql->execute();
            }catch(PDOException $e){
                echo "erro ao excluir Personagem: $e";
            }
        }

    }
?>