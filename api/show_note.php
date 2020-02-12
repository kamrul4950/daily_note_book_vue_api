<?php
include '../Note.php';
if(isset($_REQUEST)){
    $id = $_REQUEST['id'];

    $note = new Note();
    $notes = $note->findNote($id);
    echo json_encode(['status'=>'success','data'=>$notes]);

}