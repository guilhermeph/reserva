<?php

class SalaDAO{
    
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public function cadastraSala(Sala $sala){
        
        $stmt = $this->conexao->prepare("insert into sala (nome, disponibilidade) values (:nome, 1)");
        $stmt->bindValue(':nome', $sala->getNome());
        
       return $stmt->execute();
    }

    public function listaSalas() {
        
        $sql = "Select * from sala";
        $salas = array();
        $resultado = $this->conexao->query($sql);
        foreach ($resultado as $sala_atual) {
            $sala = new Sala;

            $sala->setId($sala_atual['id']);
            $sala->setNome($sala_atual['nome']);
            $sala->setDisponibilidade($sala_atual['disponibilidade']);

            array_push($salas, $sala);

        }
        return $salas;
    }

    public function buscaSala(Sala $sala){
        $stmt = $this->conexao->prepare("select * from sala where id=:id");

        $stmt->bindValue(':id', $sala->getId());

        $stmt->execute();

        return $result = $stmt->fetch();
    }
    
}