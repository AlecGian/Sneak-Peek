<?php

    include 'dbconnect.php';

    if(isset($_POST["add_to_cart"]))
    {
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if(!in_array($_GET["id"], $item_array_id))
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'item_id'			=>	$_GET["id"],
                    'item_name'			=>	$_POST["hidden_name"],
                    'item_price'		=>	$_POST["hidden_price"],
                    'item_quantity'		=>	$_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                
                
                     echo '<script>alert("Item Added to cart")</script>';
            }
            else
            {
                 echo '<script>alert("Item Already Added")</script>';
            }
        }
        else
        {
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }
    
    if(isset($_GET["action"]))
    {
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $value)
            {
                if($value["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="SneakPeek.php#home"</script>';
                }
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sneak Peek</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="SneakPeek/css/body.css">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<div id="home">

 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="SneakPeek.php"><img src="SneakPeek/assets/SneakPeek.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#nike">Nike</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#adidas">Adidas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="SneakPeek.php#air-jordan">Air Jordan</a>
                </li>
                <li>
                    <a href="cart.php" class="nav-link" href="#nike"> Cart</a>
                </li>
            </ul>
        </div>
    </nav>

  

 </div>
<!-- End Home -->


<br />
		<div class="container">
			<br />
			<br />
			
            
			
            <?php
    $query = "SELECT * FROM products WHERE id = 4";
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){

            ?>
<div class="col-sm-12 col-md-12 col-lg-12">
    <form method="post" action="details-polta.php?action=add&id=<?php echo $row["id"]; ?>">
    <div class="product-content product-wrap clearfix product-deatil">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div class="product-image">
                    <div id="myCarousel-2" class="carousel slide">
                        
                            <li data-target="#myCarousel-2" data-slide-to="0" class=""></li>
                    
                        <div class="carousel-inner">
                            
                            <div class="item active">
                            <img src="<?php echo $row["image"]; ?>" class="w-100" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-7 col-sm-12 col-xs-12">
             
                    
                    <h4 class="text-info"><?php echo $row["p_name"]; ?></h4>

						<h4 class="text-danger">P <?php echo $row["price"]; ?></h4>
                        <ul id="myTab" class="nav nav-pills">
                        <li class="active"><h4>Product Description: </h4></li>
                        <p><?php echo $row["description"]?></p>
                        <br>
                        <h4>
                            Size Available: 10
                        </h4>
                    </ul>
						<input type="text" name="quantity" value="1" class="form-control" />

						<input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>" />
                        
                        

						<h3><input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" /></h3>

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                </div>
                <hr />
                
            </div>
        </div>
    </div>

</div>
            <?php
            
        }
    }
?>




</body>
</html>







<!-- 1:19:36 -->