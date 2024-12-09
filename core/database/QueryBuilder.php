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


    //usado na paginacao
    public function selectAll($table, $inicio = null, $count = null)
    {
        $sql = "select * from {$table}";

        if($inicio >= 0 && $count > 0){
            $sql .= " LIMIT {$inicio}, {$count}";
        }

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

    public function insertUser($table, $parametros)
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

    public function deleteUser($table, $id)
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


    //usado na paginacao
    public function countAll($table)
    {
        $sql = "select COUNT(*) from {$table}";

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();

            return intval($stmt->fetch(PDO::FETCH_NUM)[0]);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function searchPosts($table, $start, $limit, $search = '')
    {
        $sql = "SELECT * FROM {$table}";
        if (!empty($search)) {
            $sql .= " WHERE title LIKE :search OR author LIKE :search";
        }
        $sql .= " LIMIT {$start}, {$limit}";
        $statement = $this->pdo->prepare($sql);
        if (!empty($search)) {
            $statement->bindValue(':search', '%' . $search . '%');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }




    // Função de Login
    public function verificaLogin($email, $senha)
    {
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';

        try {
            // Prepara a consulta
            $stmt = $this->pdo->prepare($sql);
            
            // Executa a consulta com os parâmetros
            $stmt->execute([
                'email' => $email,
                'password' => $senha // Corrigido para 'password' que é o nome correto do parâmetro na consulta
            ]);

            // Recupera o usuário
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            // Retorna o usuário encontrado
            return $user;

        } catch (Exception $e) {
            // Em caso de erro, exibe a mensagem
            die($e->getMessage());
        }
    }

}