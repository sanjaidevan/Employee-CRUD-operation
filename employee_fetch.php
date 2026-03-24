<?php
// employee_fetch.php
include 'db.php';

function displayEmployees() {
    global $conn; // use the global connection

    $sql = "SELECT * FROM tbl_employee ORDER BY id ASC";
    $result = mysqli_query($conn, $sql);

    $html = '<table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

    if(mysqli_num_rows($result) > 0){
        $cnt = 1;
        while($emp = mysqli_fetch_assoc($result)){
        $html .= '<tr>
                <td>'.$cnt.'</td>
                <td>'.$emp['name'].'</td>
                <td>'.$emp['email'].'</td>
                <td>'.$emp['phn'].'</td>
                <td>'.$emp['address'].'</td>
                <td>'.$emp['salary'].'</td>
                <td>
                    <a href="employee_edit.php?id='.$emp['id'].'" class="btn btn-sm btn-warning text-white">
                    <i class="bi bi-pencil"></i>
                    </a>

                    <button class="btn btn-danger btn-sm deleteBtn" data-id="'.$emp['id'].'">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
              </tr>';
        $cnt++;
}
    } else {
        $html .= '<tr><td colspan="7" class="text-center">No employees found</td></tr>';
    }

    $html .= '</tbody></table>';

    echo $html; // echo the final HTML
}

// Call the function so AJAX can receive it
displayEmployees();
?>