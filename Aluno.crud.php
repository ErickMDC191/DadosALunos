<?php

require_once './Conexão.php';

function create($aluno){
        try {
    $con = getConnection();

    $stmt = $con->prepare("INSERT INTO DadosAlunos(aluno_nome, idade, nacionalidade) VALUES (:nome, :idade, :nacionalidade)");

    $stmt->bindParam(":aluno_nome", $DadosAlunos->nome);
    $stmt->bindParam(":idade", $DadosAlunos->idade);
    $stmt->bindParam(":nacionalidade", $DadosAlunos->nacionalidade);

    if ($stmt->execute())
        echo "Aluno cadastrado com sucesso";
} 
    catch (PDOException $error) {
        echo "Erro ao cadastrar o Aluno. Erro: {$error->getMessage()}";
        } finally {
        unset($con);
        unset($stmt);
        }
}

    function get(){
        try {
    $con = getConnection();

    $rs = $con->query("SELECT aluno_nome, idade, nacionalidade FROM DadosAlunos");

while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
    echo $row->aluno_nome . "<br>";
    echo $row->idade . "<br>";
    echo $row->nacionalidade . "<br>";
}
        } catch (PDOException $error) {
            echo "Erro ao listar os Alunos. Erro: {$error->getMessage()}";
        } finally {
        unset($con);
        unset($rs);
        }
    }

    function find($nome){
        try {
            $con = getConnection();

            $stmt = $con->prepare("SELECT aluno_nome, idade, nacionalidade FROM DadosAlunos WHERE aluno_nome LIKE :nome");
            $stmt->bindValue(":nome", "%{$nome}%");

        if($stmt->execute()) {
        if($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo $row->aluno_nome . "<br>";
                echo $row->idade . "<br>";
                echo $row->nacionalidade . "<br>";
                    }
                }
            }
        } catch (PDOException $error) {
            echo "Erro ao buscar o Aluno '{$nome}'. Erro: {$error->getMessage()}";
        } finally {
        unset($con);
        unset($stmt);
        }
    }

    function update($aluno){
        try {
            $con = getConnection();

            $stmt = $con->prepare("UPDATE DadosAlunos SET aluno_nome = :nome, idade = :idade, nacionalidade = :nacionalidade WHERE aluno_matricula = :matricula");
            
            $stmt->bindParam(":aluno_nome", $DadosAlunos->nome);
            $stmt->bindParam(":idade", $DadosAlunos->idade);
            $stmt->bindParam(":nacionalidade", $DadosAlunos->nacionalidade);
            $stmt->bindParam(":aluno_matricula", $DadosAlunos->matricula);

            if ($stmt->execute())
                echo " DadosAlunos atualizado com sucesso";
        } catch (PDOException $error) {
            echo "Erro ao atualizar DadosAlunos. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
        }
    }

    function delete($matricula){
        try {
        $con = getConnection();

        $stmt = $con->prepare("DELETE FROM DadosAlunos WHERE aluno_matricula = ?");
        $stmt->bindParam(1, $matricula);

        if ($stmt->execute())
            echo "Aluno deletado com sucesso";
        } catch (PDOException $error) {
            echo "Erro ao deletar o Aluno. Erro: {$error->getMessage()}";
        } finally {
            unset($con);
            unset($stmt);
    }
}