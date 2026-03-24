<?php
include 'db.php';

if(isset($_POST['id'], $_POST['name'], $_POST['email'], $_POST['phn'], $_POST['salary'], $_POST['address'])){

    $id      = $_POST['id'];
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phn     = $_POST['phn'];
    $salary  = $_POST['salary'];
    $address = $_POST['address'];

    $sql = "UPDATE tbl_employee 
            SET name='$name',
                email='$email',
                phn='$phn',
                salary='$salary',
                address='$address'
            WHERE id='$id'";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Employee Updated Successfully');</script>";
        echo "<script>window.location='manage.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>