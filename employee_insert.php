<?php
// Insert Record Function
include ('db.php');
function insertEmployee()
{
    global $conn;

    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phn'];
    $salary  = $_POST['salary'];
    $address = $_POST['address'];

    $query = "INSERT INTO tbl_employee (name, email, phn, salary, address) 
              VALUES ('$name', '$email', '$phone', '$salary', '$address')";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        echo 'Employee Registered Successfully!';
        echo "<script>alert('Data filled Completed');</script>";
        echo "<script type=text/javascript>document.location='manage.php'</script>";
    }
    else
    {
        echo 'Please Check Your Query: ' . mysqli_error($con);
    }
}
if(isset($_POST['name'], $_POST['email'], $_POST['phn'], $_POST['salary'], $_POST['address'])){
    insertEmployee($_POST['name'], $_POST['email'], $_POST['phn'], $_POST['salary'], $_POST['address']);
}
?>