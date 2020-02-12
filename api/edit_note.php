<?php
include '../Note.php';
if(isset($_POST['title']) && isset($_POST['description']) && isset($_POST['athur_id']) && isset($_POST['id'])){
    $note = new Note();
    if($note->updateNote($_POST['title'],$_POST['description'],$_POST['athur_id'],$_POST['id'])){
        echo json_encode(['status'=>'success']);
    }else{
        echo json_encode(['statue'=>'error']);
    }
}else{
    echo json_encode(['status'=>'error']);
}