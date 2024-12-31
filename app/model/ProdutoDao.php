<?php

namespace app\model;

use \PDO;

class ProdutoDao
{
    public function cadastrar(Produto $produto)
    {
        $sql = "insert into produtos (nome, descricao) values (?, ?)";

        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getDescricao());
        $stmt->execute();
    }

    public function listar()
    {
        $sql = "select * from produtos";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $lista = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $lista;
        } else {
            return [];
        }
    }

    public function atualizar(Produto $produto)
    {
        $sql = "update produtos set nome = ?, descricao = ? where id = ?";

        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $produto->getNome());
        $stmt->bindValue(2, $produto->getDescricao());
        $stmt->bindValue(3, $produto->getId());
        $stmt->execute();
    }

    public function excluir($id)
    {
        $sql = "delete from produtos where id = ?";
        $stmt = Conexao::getConexao()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}
