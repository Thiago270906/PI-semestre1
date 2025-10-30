<?php
require_once 'app/config/dbconection.php';

class TurmaDAO{
    private $db;
    public function __construct() {
        $this->db = new Database();
    }
    public function cadastrarTurma(Turma $turma){
        $conn = $this->db->getConnection();
        $sql = "INSERT INTO turma (periodo, curso) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$turma->getPeriodo(), $turma->getCurso()]);
        $stmt->close();
    }

    public function localizarTurma(Turma $turma){
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare('SELECT idturma FROM turma WHERE curso = ? AND periodo = ? LIMIT 1');
            $stmt->execute([$turma->getCurso(), $turma->getPeriodo()]);
            $turma = $stmt->fetchColumn();
            return $turma;
        } catch (Exception $e) {
            error_log('Localizar turma error: ' . $e->getMessage());
            return null;
        }
    }
}