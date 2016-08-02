<?php

// 1° passo, criação da Classe Usuário Com os Getters e os Setters
// 2° passo criar a estrutura da tabela usuários na base de dados
// 3° criar o arquivo de conexão com o Banco de Dados
// 4° Criar a index com um formulário de login do usuário
// 5° criar a Classe UsuarioDAO para mexer no banco relacionado ao usuario
// 6° Criar o arquivo para guardar a sessão do usuário
// 7° Criar a função de login do usuário
// 8° Criar o Autoload para as classes
// 9° Criação do arquivo mostraAlerta para mostrar as mensagens de sessões
// 10° Ajuste na Index repartindo em cabecalho
// 11° Criacao do formulario de cadastro de Usuario
// 12° Criacao da funcao de cadastrar usuario no UsuarioDAO
// 13° Criação do arquivo de formulário de adição de usuário
// 14° Criação do arquivo que faz a adição do usuário
// 15° Criação da função de lista de Usuários no UsuarioDAO
// 16° Criação do formulário para alteração do cadastro
// 17° Função para buscar o usuário no usuarioDAO e os dados irem preenchidos para o Formulário
// 18° Mudei a função de listar usuários para não listar o usuário admin
// 19° Criação da função de alteração de Usuários no UsuarioDAO
// 20° Criação da função de deletar Usuario no UsuarioDAO
// 21° Criação da Classe Sala 
// 22° Criação da tabela Sala no banco de dados
// 23° Criação do formulário de Cadastramento de Salas
// 24° Criação da listagem das salas com a opção de agendar a sala
// 25° Criação do formulário de agendamento de Salas
// 26° Criação da classe Agendamento e AngendamentoDAO
// 27° Criação da tabela agendamento no banco de dados
// 28° Criação da função de agendamento



class Usuario{
    
    private $id;
    private $nome;
    private $username;
    private $passwd;
    private $type;
    
    public function getId(){
        return $this->id;
    }
    
    public function getNome(){
        return $this->nome;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getPasswd(){
        return $this->passwd;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    
    public function setUsername($username){
        $this->username = $username;
    }
    
    public function setPasswd($passwd){
        $this->passwd = $passwd;
    }
    
    public function setType($type){
        $this->type = $type;
    }
    
}