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

    public function insert($table, $parametros)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUE (%s)',
            $table, 
            implode(', ', array_keys($parametros)), //pega os parametros da funcion no usercontroller
            ':' . implode(', :', array_keys($parametros)) //pega os valores da mesma função do usercontroller 
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parametros);

            return $stmt->fetchAll(PDO::FETCH_CLASS);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function delete($table, $id)
    {
        $sql = sprintf('DELETE FROM %s WHERE id = :id', $table); // %s e :id são placeholders
        try {
            // Preparando a consulta
            $stmt = $this->pdo->prepare($sql);
            
            // associa o valor da variável ao parâmetro
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Executando a consulta
            $stmt->execute();

            // Verificando se a exclusão deu certo
            return $stmt->rowCount() > 0; // Retorna true se uma linha foi excluída
        } catch (Exception $e) {
            die($e->getMessage()); // Em caso de erro, exibe a mensagem de erro
        }
    }

   public function edit($table, $id, $parametros)
    {
        // Constrói a string de SET dinamicamente
        $sets = implode(', ', array_map(fn($key) => "$key = :$key", array_keys($parametros)));

        // SQL para atualização
        $sql = sprintf(
            'UPDATE %s SET %s WHERE id = :id',
            $table,
            $sets
        );

        try {
            $stmt = $this->pdo->prepare($sql);

            // Adiciona o ID aos parâmetros para a cláusula WHERE
            $parametros['id'] = $id;

            // Executa a query
            $stmt->execute($parametros);

            // Retorna verdadeiro se a execução foi bem-sucedida
            return $stmt->rowCount(); // Retorna o número de linhas afetadas

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    /* Usando placeholders como %s o valor é substituído diretamente na string SQL antes de a consulta ser preparada ou executada.
    Quando você usa placeholders nomeados, como :id, você está apenas referenciando o valor que será associado posteriormente à consulta, a substituição ocorre somente quando você executa a consulta. 
    O segundo método é mais seguro, evita SQL Injection */
}