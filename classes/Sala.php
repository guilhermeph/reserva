<?php

class Sala{

	private $id;
	private $nome;
	private $disponibilidade;

	public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getDisponibilidade(){
        return $this->disponibilidade;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setDisponibilidade($disponibilidade){
        $this->disponibilidade = $disponibilidade;
    }

}