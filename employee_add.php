<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Employee</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
    body { 
        background: linear-gradient(135deg, #4e73df, #1cc88a); 
        min-height: 100vh; 
    }
    .card-header { 
        background: linear-gradient(45deg, #4e73df, #224abe);
        }
</style>
<body>

<!-- Add Employee Modal -->
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Register Employee</h5>
        </div>
        <div class="card-body">
            <div id="message"></div>
            <form id="employeeForm">
                <input type="text" id="emp_name" class="form-control mb-2" placeholder="Name">
                <input type="email" id="emp_email" class="form-control mb-2" placeholder="Email">
                <input type="text" id="emp_phone" class="form-control mb-2" placeholder="Phone">
                <input type="number" id="emp_salary" class="form-control mb-2" placeholder="Salary">
                <input type="text" id="emp_address" class="form-control mb-2" placeholder="Address">

                <button type="button" id="btn_register" class="btn btn-success w-100">
                    Save Employee
                </button>
                <a href="manage.php" class="btn btn-light btn-sm w-100 mt-1">
                    Back
                </a>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

    // Button Click Event
    $('#btn_register').click(function(){

        var name   = $('#emp_name').val();
        var email  = $('#emp_email').val();
        var phone  = $('#emp_phone').val();
        var salary = $('#emp_salary').val();
        var address= $('#emp_address').val();

        if(name=="" || email=="" || phone=="" || salary=="" || address=="")
        {
            $('#message').html('<div class="alert alert-danger">Please Fill in the Blanks</div>');
        }
        else
        {
            $.ajax({
                url : 'employee_insert.php',
                method: 'POST',
                data:{
                    name:name,
                    email:email,
                    phn:phone,
                    salary:salary,
                    address:address
                },
                success: function(data)
                {
                    $('#message').html('<div class="alert alert-success">'+data+'</div>');
                    $('#employeeForm')[0].reset();

                    // Hide modal properly in Bootstrap 5
                }
            });
        }

    });

});
</script>

</body>
</html>