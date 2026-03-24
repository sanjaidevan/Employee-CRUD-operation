<?php
// manage.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Employee Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    body { 
        background: linear-gradient(135deg, #4e73df, #1cc88a); 
        min-height: 100vh; 
    }
    .main-card { 
        border-radius: 15px; 
        overflow: hidden; 
    }
    .card-header { 
        background: linear-gradient(45deg, #4e73df, #224abe);
        }
    .table-container { 
        max-height: 400px; 
        overflow-y: auto; 
    }
    .modal-header { 
        background: linear-gradient(45deg, #4e73df, #224abe); 
    }
    .btn-custom { 
        background: linear-gradient(45deg, #1cc88a, #17a673); 
        border: none; 
        color: #fff; 
    }
    .toast-container { 
        position: fixed; 
        top: 20px; 
        right: 20px; 
        z-index: 9999; 
    }
</style>
</head>

<body>

<div class="container py-5">
    <div class="card shadow-lg main-card">
        <div class="card-header text-white d-flex justify-content-between align-items-center p-3">
            <h4 class="mb-0"><i class="bi bi-people-fill"></i> Employee Management</h4>
            <a href="employee_add.php" class="btn btn-light btn-sm">
                <i class="bi bi-person-plus-fill"></i> Register Employee
            </a>
        </div>
        <div class="card-body bg-white">
            <div class="table-container">
                <div id="employeeTable"></div>
            </div>
        </div>
    </div>
</div>

<!-- Toast -->
<div class="toast-container">
    <div id="liveToast" class="toast align-items-center text-bg-success border-0">
        <div class="d-flex">
            <div class="toast-body" id="toastMessage"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>



<script>

$(document).ready(function(){

    loadData();
    Delete_record();

});

/* ================= LOAD DATA ================= */
function loadData()
{
    $.ajax({
        url:"employee_fetch.php",
        method:"POST",
        success:function(data){
            $('#employeeTable').html(data);
        }
    });
}


/* ================= DELETE ================= */
function Delete_record()
{
    $(document).on('click','.deleteBtn',function()
    {
        var id = $(this).data('id');

        if(confirm("Delete this employee?"))
        {
            $.ajax({
                url:'employee_delete.php',
                method:'post',
                data:{id:id},
                success:function(data)
                {
                    alert(data);
                    loadData();
                }
            });
        }
    });
}

</script>

</body>
</html>