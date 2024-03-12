<?php  
    include '../function.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include '../link/style.php';
        include '../link/icon.php';
    ?>
    <link rel="stylesheet" href="../CSS/show.css">
    <title>Product Management</title>
</head>
<body>
    <div class="container border border-5 p-4 d-flex justify-content-between mt-4">
        <h2>Product Management</h2>
        <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i>   Add Product</button>
    </div>
    <br><br>
    <div class="container">
        <table class="table align-middle" style="table-layout: fixed;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Coca</td>
                <td>Drink</td>
                <td>0.5$</td>
                <td>
                   <button class="btn btn-outline-warning"><i class="fa-solid fa-pen-to-square"></i>   Edit</button>
                   <button class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i>  Remove</button> 
                </td>
            </tr>
        </table>
    </div>
    <?php  
        include 'modal.php';
    ?>
</body>
</html>