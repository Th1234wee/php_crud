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
                    echo "<h1>Success</h1>";
                }
            }
        }
    }
    add_product();