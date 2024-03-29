<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
    $connection = new mysqli('localhost','root','','db6-7',3307);

    function add_product(){
        global $connection; //make connect as global variable
        if(isset($_POST['btn_add'])){
            $name     = $_POST['_name'];
            $category = $_POST['_category'];
            $price    = $_POST['_price'];

            if(!empty($name) && !empty($category) && !empty($price)){
                $sql_insert = "
                                    INSERT INTO `tbproduct` (`name`,`category`,`price`)
                                    VALUES                  ('$name','$category','$price');
                              ";
                $result     = $connection -> query($sql_insert);

                if($result){
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Inserting Success",
                                        text: "You inserted data successfully",
                                        icon: "success",
                                        button: "Aww yiss!",
                                      });
                                })
                            </script>
                    ';
                }
                else{
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Something went wrong",
                                        text: "Cannot insert data",
                                        icon: "error",
                                        button: "Confirm",
                                      });
                                })
                            </script>
                    ';
                }
            }
            else{
                echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Invaild Data",
                                    text: "All field must be filled",
                                    icon: "error",
                                    button: "Confirm",
                                  });
                            })
                        </script>
                ';
            }
        }
    }
    add_product();
    function show_product(){
        global $connection;
        $sql_show = "
                        SELECT * FROM `tbproduct` 
                        WHERE 1 
                        ORDER BY `id` DESC;
                    ";
        $result   = $connection -> query($sql_show);
        while($row = mysqli_fetch_assoc($result)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>'.$row['price'].'</td>
                    <form method="post">
                        <td>
                            <input type="hidden" name="remove_id" value='.$row['id'].'>
                            <button id="open_update" type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i>   Edit</button>
                            <button name="btn_remove" type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i>  Remove</button>
                        </td>
                    </form>
                </tr>
            ';
        }
    }
    function remove_product(){
        global $connection;

        if(isset($_POST['btn_remove'])){
            $remove_id = $_POST['remove_id'];

            $sql_remove = "
                                DELETE  FROM `tbproduct`
                                WHERE `id` = '$remove_id';
                          "; 

            $result     = $connection -> query($sql_remove);
            if($result){
                echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Removing Success",
                                        text: "You remove data successfully",
                                        icon: "success",
                                        button: "Confirm",
                                      });
                                })
                            </script>
                    ';

            }
        }
    }
    remove_product();
    function edit_product(){
        global $connection;

        if(isset($_POST['btn_update'])){
            $updated_id = $_POST['_id'];
            $name       = $_POST['_name'];
            $category   = $_POST['_category'];
            $price      = $_POST['_price'];

            if(!empty($name) && !empty($category) && !empty($price)){
                $sql_edit = "
                                UPDATE `tbproduct` 
                                SET `name` = '$name',`category` = '$category',`price`='$price'
                                WHERE `id` = '$updated_id';
                            ";
                $result = $connection -> query($sql_edit);
                if($result){
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Edit Success",
                                        text: "You edit data successfully",
                                        icon: "success",
                                        button: "Confirm",
                                      });
                                })
                            </script>
                    ';
                }
                else{
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Something went wrong",
                                        text: "Cannot edit data",
                                        icon: "error",
                                        button: "Confirm",
                                      });
                                })
                            </script>
                    ';
                }
            }
            else{
                echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Invaild Data",
                                    text: "All field must be filled",
                                    icon: "error",
                                    button: "Confirm",
                                  });
                            })
                        </script>
                ';
            }
        }
    }
    edit_product();
    