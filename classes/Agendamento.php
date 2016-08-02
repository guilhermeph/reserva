<?php

class Agendamento{

	private $id;
	private $horario_inicio;
	private $horario_fim;
	private $id_sala;
	private $id_usuario;

	public function getId(){
		return $this->id;
	}

	public function getHorario_inicio(){
		return $this->horario_inicio;
	}

	public function getHorario_fim(){
		return $this->horario_fim;
	}

	public function getId_sala(){
		return $this->id_sala;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function setHorario_inicio($horario_inicio){
		$this->horario_inicio = $horario_inicio;
	}

	public function setHorario_fim($horario_fim){
		$this->horario_fim = $horario_fim;
	}

	public function setId_sala($id_sala){
		$this->id_sala = $id_sala;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

}