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