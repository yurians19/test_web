<?php

    function saveProduct($name, $price){
            $sql = "INSERT INTO `products`( `name`, `price`) VALUES('$name', '$price')";
            require("../../config/connectDB.php");
            if (mysqli_query($conn, $sql)) {
                $aResult['result'] = 'Se ha registrado exitosamente.';
            } else {
                $aResult['error'] = "Error al guardar";
            }
        return $aResult;
    }
    function getProduct(){
            $data = array();
            $sql = "SELECT * FROM products";
            require("../../config/connectDB.php");
            if ($result = $conn->query($sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while($row = $result->fetch_assoc()) {
                        $res = array(
                            'id' => $row["id"],        
                            'name' => $row["name"],        
                            'price' => $row["price"],        
                        );
                        array_push($data, $res);
                    }
                    $aResult['result'] = $data;
                } else {
                    $aResult['result'] = "0 results";
                }
                
            } else {
                $aResult['error'] = "Error";
            }
        return $aResult;
    }

?>