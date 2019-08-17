<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$nameFunction=isset($_GET['nameFunction']) ? $_GET['nameFunction'] : $_POST['nameFunction'];


    require("../models/crud_product_model.php");

    if ($nameFunction =='save') {
        $result = saveProduct($_POST['name'], $_POST['price']);
    } else {
        $result = getProduct();
    }
    echo json_encode($result);

    
?>