<?php include("inc/header.php");?>
<?php
if(isset($_GET["buy_product"]) && $_GET["buy_product"] == session_id()){
  $session_id = $_GET["buy_product"];
  include("classes/cart.php");
  $cartObj->session_id($session_id);
  foreach ($cartObj->Proquery() as $value) {
    $chkSesssion = $value["session_id"]; }  ?>
<?php if(!empty($chkSesssion)){ ?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">
		<div class="cartpage">
		<table class="tblone">
			<tr>
				<th width="20%">Product Name</th>
				<th width="10%">Image</th>
				<th width="15%">Price</th>
				<th width="25%">Quantity</th>
				<th width="20%">Total Price</th>
				<th width="10%">Action</th>
			</tr>
        <?php
        $cartObj->Proquery();
        foreach ($cartObj->Proquery() as $value) { ?>
				<tr>
				<td><?php echo $value["product_name"];?></td>
				<td><img src="admin/<?php echo $value["img"];?>" alt=""/></td>
				<td>$<?php echo $value["price"];?></td>
				<td>
				<form action="" method="post">
          <input type="hidden" name="price" value="<?php echo $value["price"];?>">
          <input type="hidden" name="cart_id" value="<?php echo $value["cart_id"];?>">
          <select class="" name="total">
            <option value="<?php echo $value["quantity"];?>"><?php echo $value["quantity"];?></option>
            <option value='<?php if($value["quantity"] == 1){echo 2;}else{echo 1;}?>'><?php if($value["quantity"] == 1){echo 2;}else{echo 1;}?>
            </option>
          </select>
					<input type="submit" name="submit" value="Update"/>
				</form>
			</td>
                <?php
                if(isset($_POST["submit"])){
                  $cart_id = $_POST["cart_id"];
                  $count = $_POST["total"];
                  $totalPrice = $count * $_POST["price"];
                  if($count<0){
                    $zerroPro = "Please select at least one product.";
                  }else{
                    $cartObj->cart_id($cart_id);
                    $cartObj->count($count);
                    $cartObj->totalPrice($totalPrice);
                    $cartObj->Upquery();
                    if($cartObj->Upquery()){
                      $_SESSION["upQuanSuc"] = 1;
                      echo "<script>window.location='cart.php?buy_product=".$session_id."'</script>";
                    }
                  }
                }
                ?>
				<td>$<?php echo $value["total_price"];?></td>
				<td><a href="cart-del.php?delete=<?php echo $value["cart_id"];?>">X</a></td>
			</tr>
            <?php } ?>
            <h2>Your Cart</h2>
            <?php
            if(isset($_SESSION["upQuanSuc"])){
              echo "<span style='color:green'>You have succssfully Added new product.</span>";
            }
            if(isset($_SESSION["delProCart"])){
              echo "<span style='color:green'>You have succssfully delete your product.</span>";
            }
            ?>
						</table>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
                <?php
                $cartObj->Proquery();
                $sum = 0;
                foreach ($cartObj->Proquery() as $value) {
                  $sum = $sum + $value["total_price"];
                }
                ?>
								<th>Sub Total : </th>
								<td>$<?php echo $sum;?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>$<?php echo $sum/100*5;?> (5%)</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td style="color:green;font-size:20px;">$
                <?php
                $totalWvat = $sum+$sum/100*5;
                echo $totalWvat;
                ?>
              </td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
          <?php
          }else{
          echo "<img style='margin-left: 25%;' src='images/empty-cart-icon-1.jpg' alt='' />";}
          ?>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
 <?php
 unset($_SESSION["upQuanSuc"]);
 unset($_SESSION["delProCart"]);
 ?>
<?php }else{header("location:error/.htaccess");}?>
 <?php include("inc/footer.php");?>
