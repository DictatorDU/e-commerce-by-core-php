<?php include("inc/header.php");?>
<style media="screen">
.shopleft, .shopleft {text-align: center;width: 610px;margin: 0 auto;float: none;}
</style>
<?php
$customer_id = session::get("customerId");
if(isset($_GET["customerId"]) && $_GET["customerId"] == $customer_id){
  include("classes/wish.php");
  $wishObj->customer_id($customer_id);
  foreach ($wishObj->wishshow() as $value) {
    $chkcustomer_id = $value["customer_id"];
  }
  if(!empty($chkcustomer_id)){
?>
<div class="main">
<div class="content">
<div class="cartoption">
		<div class="cartpage">
    <h2>wish</h2>
    <?php
    if(isset($_GET["deletewish"]) && $_GET["deletewish"] != NULL){
      $wish_id = $_GET["deletewish"];
      $wishObj->wish_id($wish_id);
      if($wishObj->delwish()){
        echo "<script>window.location='wish-list.php?customerId=$customer_id'</script>";
      }
    }
    ?>
		<table class="tblone">
			<tr>
        <th>No.</th>
				<th width="20%">Product Name</th>
				<th width="10%">Image</th>
				<th width="15%">Price</th>
				<th width="25%">Brand</th>
				<th width="10%">Action</th>
			</tr>
      <?php
      $i=0;
      foreach ($wishObj->wishshow() as $value) {
        $i++;
        ?>
				<tr>
        <td><?php echo $i;?></td>
				<td><?php echo $value["product_name"];?></td>
				<td><img height="50px" src="admin/<?php echo $value["img"];?>" alt=""/></td>
				<td>$<?php echo $value["price"];?></td>
				<td><?php echo $value["brand"];?></td>
				<td>
          <a style="color:#333" href="preview.php?productId=<?php echo $value["product_id"];?>">Detials</a> ||
          <a href="?customerId=<?php echo $customer_id;?>&deletewish=<?php echo $value["wish_id"];?>">X</a>
        </td>
			</tr>
      <?php } ?>
			</table>
		</div>
    <?php
    }else{
    echo "<img style='margin-left: 25%;' src='images/empty-cart-icon-1.jpg' alt='' />";}
    ?>
		<div class="shopping">
			<div class="shopleft">
				<a href="index.php"> <img src="images/shop.png" alt="" /></a>
			</div>
		</div>

</div>
<div class="clear"></div>
</div>
</div>
<?php }else{header("location:error/.htaccess");}?>
 <?php include("inc/footer.php");?>
