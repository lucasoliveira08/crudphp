<?php

require_once("Crud.php");

class Produto extends Crud{
    private $table = "produto";

    public function listarProdutos(){
        $results = parent::select("SELECT * FROM {$this->table}");

        if(count($results) > 0){
            echo json_encode($results);
        }else{
            return;
        }
    }

    public function novoProduto($nomeProduto, $precoProduto, $qtdEstoque){
        $retorno = [];
        if(!empty($nomeProduto) && !empty($precoProduto) && !empty($qtdEstoque)){
                $results = parent::query("INSERT INTO {$this->table} VALUES(null, :nomeProduto, :precoProduto, :qtdEstoque)",[
                    ":nomeProduto" => $nomeProduto,
                    ":precoProduto" => $precoProduto,
                    ":qtdEstoque" => $qtdEstoque,
                ]);
                if($results){
                    $retorno["sucesso"] = 1; 
                } else{
                    $retorno["sucesso"] = 0;
                }
        } else{
            $retorno["vazio"] = 0;
        }

        echo json_encode($retorno);
    }

    public function listarProduto($id){
        $results = parent::select("SELECT * FROM {$this->table} WHERE idProduto = :id LIMIT 1",[
            ":id" => $id
        ]);

        if(count($results) > 0){
            $results = $results[0];
            echo json_encode($results);
        }else{
            return;
        }
    }

    public function editarProduto($idProduto, $nomeProduto, $precoProduto, $qtdEstoque){
        $retorno = [];
        if(!empty($idProduto) && !empty($nomeProduto) && !empty($precoProduto) && !empty($qtdEstoque)){
                $results = parent::query("UPDATE {$this->table} SET nomeProduto = :nomeProduto, precoProduto = :precoProduto, qtdEstoque = :qtdEstoque WHERE idProduto = :idProduto",[
                    ":nomeProduto" => $nomeProduto,
                    ":precoProduto" => $precoProduto,
                    ":qtdEstoque" => $qtdEstoque,
                    ":idProduto" => $idProduto
                ]);
                if($results){
                    $retorno["sucesso"] = 1; 
                } else{
                    $retorno["sucesso"] = 0;
                }
        } else{
            $retorno["vazio"] = 0;
        }

        echo json_encode($retorno);
    }

    public function deletarProduto($id){
        $results = parent::query("DELETE FROM {$this->table} WHERE idProduto = :idProduto",[
            ":idProduto" => $id
        ]);
        if($results){
           echo 1; 
        }else{
            echo 0;
        }
    }
}