<?php 
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
// if(!empty($_GET["action"])){


// }
switch($_GET["action"]){
    case "add":
        if(!empty($_POST["quantity"])){
            $productByCode= $db_handle ->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
            $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
            //print_r($itemArray);
            //print_r($_SESSION["cart_item"]);
            //是否cart session 
            if(!empty($_SESSION["cart_item"])){


                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);

            }else{


                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "remove":

    break;
    case "empty":
        
		unset($_SESSION["cart_item"]);
	break;	
}
$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");

?>
<html>
    <head>
        <title>Simple PHP Shopping Cart</title>
        <link href="./css/style.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>
        <a id="btnEmpty" href="shop_cart.php?action=empty">Empty Cart</a>
    </body>
    <?php 
        if (!empty($product_array)) { 
            foreach($product_array as $key=>$value){
        ?>
            <div class="product-item">
                <form method="post" action="shop_cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
                    <div class="product-tile-footer">
                    <div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
                    <div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
                    <div class="cart-action">
                        <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                        <input type="submit" value="Add to Cart" class="btnAddAction" />
                    </div>
                    </div>
                </form>
            </div>
        <?php
            }
        }
    ?>
</html>