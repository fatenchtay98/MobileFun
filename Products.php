<?php 
  session_start(); 
  $connect = mysqli_connect("localhost", "root", "", "mobilefun");  
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  
?>
<!DOCTYPE html>
<html>
    <head>
        <title> MobileFun Products</title>
        <link rel="stylesheet" href="css/styles.css" />
		<link rel="icon" href="pics/logo.jpg"/>
        <script src="store.js" async></script>
    </head>
	
<body>
    <center >
      <?php  if (isset($_SESSION['username'])) : ?>
    	<p style ="font-size: 20px;">Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="logout.php" name ="logout" style="color: Black; font-size: 20px; text-decoration: none;">Logout</a> </p>
    <?php endif ?>
   </center>

    
<video width="100%" height="550" controls autoplay>
  <source src="pics/video.mp4" type="video/mp4">
</video>

<section class="container content-section">
 <?php  
                $query = "SELECT * FROM products ORDER BY product_id ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
     
            <div class="shop-items">
                <div class="shop-item">
                  <span class="shop-item-title"> <?php echo $row["product_name"]; ?> </span>
                    <img class="shop-item-image" src="<?php echo $row["product_image"]; ?>">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$<?php echo $row["product_price"]; ?></span>
						<button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
				</div
        </section>
		<?php 
					 }
				}
				
				?>
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$0</span>
            </div>
            <button name="buy" class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>

				
			
 </body>
 </html>