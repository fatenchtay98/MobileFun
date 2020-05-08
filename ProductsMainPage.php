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
        <title> Mobile Accessories </title>
		<link rel="icon" href="pics/logo.jpg"/>
        <link rel="stylesheet" href="css/styles.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel ="stylesheet" href="stylesheet.css">
    </head>
	
<body>

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

                    </div>
                </div>
               
                
                </div>
            
        </section>
		<?php 
					 }
					
				}
				

 
				?>
     
       
 <input class ="goback" type="button" value="Go Back!" onclick="history.back(-1)" />
 
 </body>
 </html>