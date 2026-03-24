<?php
include 'db.php';

function deleteEmployee($id){
    global $conn;

    $stmt = $conn->prepare("DELETE FROM tbl_employee WHERE id=?");
    $stmt->bind_param("i", $id);

    echo $stmt->execute() ? "Employee Deleted Successfully!" : "Error: ".$stmt->error;
    $stmt->close();
}

if(isset($_POST['id'])){
    $id = $_POST['id']; // ← get the ID from POST
    deleteEmployee($id);
}
?>