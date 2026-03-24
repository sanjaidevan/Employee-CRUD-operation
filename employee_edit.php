<?php
include 'db.php';

if(!isset($_GET['id'])){
    echo "Invalid Request";
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM tbl_employee WHERE id = $id";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) == 0){
    echo "Employee not found";
    exit();
}

$emp = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
body { 
    background: linear-gradient(135deg, #4e73df, #1cc88a); 
    min-height: 100vh; 
}
.card {
    margin-top: 80px;
}
.card-header { 
    background: linear-gradient(45deg, #4e73df, #224abe);
    color:white;
}
</style>
</head>

<body>

<div class="container">
    <div class="card shadow-lg">
        <div class="card-header">
            <h4><i class="bi bi-pencil"></i> Edit Employee</h4>
        </div>
        <div class="card-body">
            <form action="employee_update.php" method="POST">

                <input type="hidden" name="id" value="<?= $emp['id']; ?>">

                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" 
                           value="<?= htmlspecialchars($emp['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" 
                           value="<?= htmlspecialchars($emp['email']); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Phone</label>
                    <input type="text" name="phn" class="form-control" 
                           value="<?= htmlspecialchars($emp['phn']); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Salary</label>
                    <input type="number" name="salary" class="form-control" 
                           value="<?= htmlspecialchars($emp['salary']); ?>" required>
                </div>

                <div class="mb-3">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" 
                           value="<?= htmlspecialchars($emp['address']); ?>" required>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle"></i> Update Employee
                </button>

                <a href="index.php" class="btn btn-secondary">Back</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>