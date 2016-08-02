<?php

class UsuarioDAO{
    
    private $conexao;
    
    public function __construct($conexao) {
        $this->conexao = $conexao;
    }
    
    public function buscaUsuario(Usuario $usuario) {
        
        $passwdMd5 = md5($usuario->getPasswd());
        
        $stmt = $this->conexao->prepare('Select * from usuario where username=:username and passwd =:passwd');
        $stmt->bindValue(':username', $usuario->getUsername());
        $stmt->bindValue(':passwd', $passwdMd5);
        
        $stmt->execute();
        
        $result = $stmt->fetch();
        
        return $result;
    }
    
    public function cadastraUsuario(Usuario $usuario){
        
        $senha = md5($usuario->getPasswd());
        
        $stmt = $this->conexao->prepare("insert into usuario (nome, username, passwd, type) values (:nome, :username, :passwd, 'comum')");
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':username', $usuario->getUsername());
        $stmt->bindValue(':passwd', $senha);
        
       return $stmt->execute();
    }

    public function listaUsuarios() {
        
        $sql = "Select * from usuario where type = 'comum'";
        $usuarios = array();
        $resultado = $this->conexao->query($sql);
        foreach ($resultado as $usuario_atual) {
            $usuario = new Usuario;

            $usuario->setId($usuario_atual['id']);
            $usuario->setNome($usuario_atual['nome']);
            $usuario->setUsername($usuario_atual['username']);

            array_push($usuarios, $usuario);

        }
        return $usuarios;
    }

    public function buscaAlteraUsuario(Usuario $usuario){
        $stmt = $this->conexao->prepare('Select * from usuario where id=:id');
        $stmt->bindValue(':id', $usuario->getId());

        $stmt->execute();

        return $result = $stmt->fetch();
    }

    public function alteraUsuario(Usuario $usuario){
        
        $senha = md5($usuario->getPasswd());

        $stmt = $this->conexao->prepare("update usuario set nome=:nome, username=:username, passwd=:passwd where id=:id");

        
        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':username', $usuario->getUsername());
        $stmt->bindValue(':passwd', $senha);
        $stmt->bindValue(':id', $usuario->getId());

        return $stmt->execute();

    }

    public function deletaUsuario(Usuario $usuario){
        $stmt = $this->conexao->prepare("delete from usuario where id=:id");
        $stmt->bindValue(':id', $usuario->getId());
        return $stmt->execute();
    }

    
}