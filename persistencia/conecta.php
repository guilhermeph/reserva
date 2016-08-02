<?php

$dsn = 'mysql:host=localhost;port=3306;dbname=reserva;charset=utf8';
$usuario = 'root';
$senha = 'asm15052014';

$opcoes = [
    PDO::ATTR_PERSISTENT => true,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $conexao = new PDO($dsn, $usuario, $senha, $opcoes);
    return $conexao;
} catch (PDOException $e) {
    exit('Erro: ' . $e->getMessage());
}