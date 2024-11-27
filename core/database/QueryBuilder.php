<?php

namespace App\Core\Database;

use PDO, Exception;

class QueryBuilder
{
    protected $pdo;


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $sql = "select * from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


    public function verificaErroUpload($arquivo){
        switch ($arquivo['error']){
            case 1:
                echo "Arquivo excede o tamanho máximo permitido.";
                die();
            case 2:
                echo "Arquivo excede tamanho máximo permitido no formulário.";
                die();
            case 3:
                echo "Upload não concluído.";
                die();
        }
    }


    public function uploadImage ($arquivo, $id){

        $pasta = "public/imagens/";
        $nomeArquivo = $arquivo['name'];

        try{

            if ($nomeArquivo != "" || $id==0){
                $ext = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));
                $nomeArquivo = uniqid();
                move_uploaded_file($arquivo['tmp_name'], $pasta . $nomeArquivo . "." . $ext);
                return $pasta . $nomeArquivo . "." . $ext;
            }

            else{
                $sql = sprintf ('SELECT %s FROM %s WHERE id=%s',"image","posts", $id);
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute();
                $post = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $post[0]['image'];
            }

        }

        catch (Exception $e){
            die($e->getMessage());
        }
    }



    public function update($table, $id, $parameters)
    {
        $sql = sprintf ('UPDATE %s SET %s WHERE id = %s',
        $table,
        implode(', ', array_map(function($param){
            return $param . ' = :' . $param;
        }, array_keys($parameters))),
        $id
    );
    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    } catch (Exception $e) {
        die($e->getMessage());
    }

    }

    public function delete($table, $id){
        $sql = sprintf ('DELETE FROM %s WHERE id=%s',
        $table,
        $id
    );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    } catch (Exception $e) {
        die($e->getMessage());
    }

    }

    public function insert($table, $parameters){
        $sql = sprintf('INSERT INTO %s (%s) VALUES (%s)',
        $table,
        implode(', ', array_keys($parameters)),
        ':' .
        implode(', :', array_keys($parameters))
    );

    try {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parameters);

        return $stmt->fetchAll(PDO::FETCH_CLASS);

    } catch (Exception $e) {
        die($e->getMessage());
    }
    }
}