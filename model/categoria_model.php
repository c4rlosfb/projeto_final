<?php

require 'config/Conexao.php';

class Categoria_model{
  function __construct(){
    $this->conexao = Conexao::getConnection();
    }

    function inserir($nome){
        $sql = "INSERT INTO categoria (nome) VALUES (?)";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("s", $nome);
        return $comando->execute();
    }

    function delete($id){
        $sql = "DELETE FROM categoria WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        return $comando->execute();
    }

    function atualizar($nome, $id){
        $sql = "UPDATE categoria SET nome = ? WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("si", $nome, $id);
        return $comando->execute();
    }

    function buscarTodos(){
        $sql = "SELECT * FROM categoria";
        $comando = $this->conexao->prepare($sql);
       if($comando->execute()){
           $resultado = $comando->get_result();
          return $resultado->fetch_all(MYSQLI_ASSOC);
       }
           return null;
    }

    function buscarPorId($id){
        $sql = "SELECT * FROM categoria WHERE idcategoria = ?";
        $comando = $this->conexao->prepare($sql);
        $comando->bind_param("i", $id);
        if($comando->execute()){
            $resultado = $comando->get_result();
            return $resultado->fetch_assoc();
        }
        return null;
    }


       
}
?>