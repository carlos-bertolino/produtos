<?php
// check if value was posted
if($_POST){
 
    // include database and object file
    include_once 'config/database.php';
    include_once 'objects/product.php';
 
    // get database connection
    $database = new Database();
    $db = $database->getConnection();
 
    // prepare product object
    $product = new Product($db);
     
    // set product id to be deleted
    $product->id = $_POST['object_id'];
     
    // delete the product
    if($product->delete()){
        echo "O objeto foi excluído.";
    }else{ // if unable to delete the product
        echo "Não é possível excluir o objeto.";
    }
}
?>