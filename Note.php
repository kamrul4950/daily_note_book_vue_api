<?php
include 'Connection.php';
class Note extends Connection {
    public function getNotes(){
        $sql = "SELECT * FROM notes";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function findNote($id){
        $sql = "SELECT *FROM notes where id=? limit 1";
        $stmt =$this->db->prepare($sql);
        $stmt->execute(array($id));
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function addNote($title,$description,$athur_id){
        $sql = "INSERT INTO notes (title,description,athur_id) VALUE (?,?,?)";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($title,$description,$athur_id))){
            return true;
        }
            return false;
    }

    public function updateNote($title,$description,$athur_id,$id){
        $sql = "UPDATE notes set title=?,description=?,	athur_id=? where id=?";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($title,$description,$athur_id,$id))){
            return true;
        }
            return false;
    }

    public function deleteNote($id){
        $sql = "DELETE FROM notes where id=?";
        $stmt = $this->db->prepare($sql);
        if($stmt->execute(array($id))){
            return true;
        }
            return false;
    }
}