<?php
include 'db.php';

function getEmployee($id){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM tbl_employee WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();

    echo json_encode($res);
    $stmt->close();
}

if(isset($_POST['id'])){
    $id = $_POST['id']; // important!
    getEmployee($id);
}

$conn->close();
?>