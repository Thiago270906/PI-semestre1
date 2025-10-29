<?php
require_once 'app/config/dbconection.php';

class AlunoDAO{

    public static function cadastrarAluno(string $nome, int $idturma){

        $db = new Database();
        $conn = $db->getConnection();
        $sql = "INSERT INTO aluno (nome, idturma) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $nome, $idturma);
        $stmt->execute();
        $stmt->close();
    }

    $ano = date("y");
    $mes = date("m");
    if($mes <= 6){
        return 1;
    }else{
        return 2;
    }
    echo ($data);
}

?>