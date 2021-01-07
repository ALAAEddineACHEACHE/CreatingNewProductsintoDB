<?php

$product = null;

if(isset($_GET['update'])) {
    $productID = $_GET['update'];
    $result = mysqli_query($connexion, "SELECT  * FROM product WHERE id = $productID");
    if($row = mysqli_fetch_row($result)) {
        $product = [];
        $product['id'] = $row[0];
        $product['productName'] = $row[1];
        $product['price'] = $row[3];
        $product['quantity'] = $row[2];
    }
}

if(isset($_GET['insert'])) {
    $productName = $_GET['productName'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];
    $category = $_GET['category'];
    mysqli_query($connexion, "INSERT INTO product VALUES(null, '$productName', $quantity, $price, $category)");
    mysqli_close($id);
    header('Location: index.php');
}

if(isset($_GET['save'])) {
    $productID = $_GET['productId'];
    $productName = $_GET['productName'];
    $price = $_GET['price'];
    $quantity = $_GET['quantity'];
    mysqli_query($connexion, "UPDATE product SET name = '$productName', price = $price, qte = $quantity WHERE id = $productID");
    header('Location: index.php');
}

if(isset($_GET['delete'])) {
    $id_product = $_GET['delete'];
    mysqli_query($connexion, "DELETE FROM product WHERE id = $id_product");
    header('Location: index.php');
}


function chargerProduit() {
    $str = '';
    global $connexion;
    $result = mysqli_query($connexion, 'SELECT * FROM `product`', MYSQLI_STORE_RESULT);
        while($row = mysqli_fetch_row($result)) {
            $str .= '<tr>';
            $str .= '<td>' . $row[0] . '</td>';
            $str .= '<td>' . $row[1] . '</td>';
            $str .= '<td>' . $row[2] . '</td>';
            $str .= '<td>' . $row[3] . '</td>';
            $str .= '<td><a href="index.php?update=' . $row[0] . '">UPDATE</a> | <a onclick="return deleteConfirmation()" href="index.php?delete=' . $row[0] . '">DELETE</a></td>';
            $str .= '</tr>';
            $str .= '</tr>';
        }
    
    return $str;
}
?>