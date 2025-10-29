<?php
require_once 'app/config/dbconection.php';

class TurmaDAO{
    public static function cadastrarTurma($periodo, $curso){
        $db = new Database();
        $conn = $db->getConnection();
        $sql = "INSERT INTO turma (periodo, curso) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $periodo, $curso);
        $stmt->execute();
        $stmt->close();
    }
}