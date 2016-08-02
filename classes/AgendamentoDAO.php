<?php

class AgendamentoDAO{
	private $conexao;

	public function __construct($conexao){
		$this->conexao = $conexao;
	}

	public function verificaData(Sala $sala, Agendamento $agendamento){
		$stmt = $this->conexao->prepare("select * from agendamento where :data between horario_inicio and horario_fim and id_sala =:id_sala");

		$stmt->bindValue(':data', $agendamento->getHorario_inicio(), PDO::PARAM_STR);
		$stmt->bindValue(':id_sala', $sala->getId(), PDO::PARAM_INT);

		$stmt->execute();

		$resultado = $stmt->fetchAll();

		if (count($resultado) == 0) {
			return true;
		}else{
			return false;
		}

	}

	public function verificaDisponibilidade(Usuario $usuario, Agendamento $agendamento){

		$stmt = $this->conexao->prepare("select * from agendamento where :data between horario_inicio and horario_fim and id_usuario =:id_usuario");

		$stmt->bindValue(':data', $agendamento->getHorario_inicio(), PDO::PARAM_STR);
		$stmt->bindValue(':id_usuario', $usuario->getId(), PDO::PARAM_INT);

		$stmt->execute();

		$resultado = $stmt->fetchAll();


		if (count($resultado) == 0) {
			return true;
		}else{
			return false;
		}

	}

	public function agendaSala(Sala $sala, Usuario $usuario, Agendamento $agendamento){

			if ($this->verificaData($sala, $agendamento) && $this->verificaDisponibilidade($usuario, $agendamento)) {

				$stmt = $this->conexao->prepare("insert into agendamento (horario_inicio, horario_fim, id_sala, id_usuario) values (:horario_inicio, :horario_fim, :id_sala, :id_usuario)");

				$stmt->bindValue(':horario_inicio', $agendamento->getHorario_inicio());
				$stmt->bindValue(':horario_fim', $agendamento->getHorario_fim());
				$stmt->bindValue(':id_sala', $sala->getId());
				$stmt->bindValue(':id_usuario', $usuario->getId());

				return $stmt->execute();
			}

	}

	public function listaAgendamentos(){
		$sql = "select a.id,a.horario_inicio,a.horario_fim, s.nome as sala_nome, u.nome as usuario_nome from agendamento as a JOIN usuario as u join sala as s on u.id=a.id_usuario AND s.id=a.id_sala";
        $agendamentos = array();
        $resultado = $this->conexao->query($sql);
        foreach ($resultado as $agendamento_atual) {
            $agendamento = new Agendamento;

            $agendamento->setId($agendamento_atual['id']);
            $agendamento->setHorario_inicio($agendamento_atual['horario_inicio']);
            $agendamento->setHorario_fim($agendamento_atual['horario_fim']);
            $agendamento->setId_sala($agendamento_atual['sala_nome']);
            $agendamento->setId_usuario($agendamento_atual['usuario_nome']);

            array_push($agendamentos, $agendamento);

        }
        return $agendamentos;
	}

	public function autentica(Usuario $usuario){

		$agendamentos = array();

		$stmt = $this->conexao->prepare("select a.id as agendamento_id, a.id_usuario, u.id as usuario_id from agendamento as a join usuario as u where u.id = a.id_usuario and u.id =:uid");

		$stmt->bindValue(':uid', $usuario->getId());

		$stmt->execute();

		$result = $stmt->fetchAll();

		foreach ($result as $actual_result) {
			array_push($agendamentos, $actual_result['agendamento_id']);
		}

		return $agendamentos;

	}

	public function deletaAgendamento(Agendamento $agendamento, Usuario $usuario){

		$agendamentos = $this->autentica($usuario);

		if (in_array($agendamento->getId(), $agendamentos)) {
			$stmt = $this->conexao->prepare("delete from agendamento where id=:id");
	        $stmt->bindValue(':id', $agendamento->getId());
	        return $stmt->execute();
		} 
		
	}

}