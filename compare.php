<?php include("inc/header.php");?>
<style media="screen">
.shopleft, .shopleft {text-align: center;width: 610px;margin: 0 auto;float: none;}
</style>
<?php
if(isset($_GET["compare"]) && $_GET["compare"] == session_id()){
  include("classes/compare.php");
  $session_id = session_id();
  $compareObj->session_id($session_id);
  foreach ($compareObj->compareshow() as $value) {
    $chkSession = $value["session_id"];
  }
  if(!empty($chkSession)){
?>
<div class="main">
<div class="content">
<div class="cartoption">
		<div class="cartpage">
    <h2>Compare</h2>
    <?php
    if(isset($_GET["deletecompare"]) && $_GET["deletecompare"] != NULL){
      $compare_id = $_GET["deletecompare"];
      $compareObj->compare_id($compare_id);
      if($compareObj->delcompare()){
        echo "<script>window.location='compare.php?compare=$session_id'</script>";
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
      $session_id = session_id();
      $compareObj->session_id($session_id);
      $i=0;
      foreach ($compareObj->compareshow() as $value) {
        $i++;
        $chkSesssion = $value["session_id"];
        ?>
				<tr>
        <td><?php echo $i;?></td>
				<td><?php echo $value["product_name"];?></td>
				<td><img height="50px" src="admin/<?php echo $value["img"];?>" alt=""/></td>
				<td>$<?php echo $value["price"];?></td>
				<td><?php echo $value["brand"];?></td>
				<td>
          <a style="color:#333" href="preview.php?productId=<?php echo $value["product_id"];?>">Detials</a> ||
          <a href="?compare=<?php echo $session_id;?>&deletecompare=<?php echo $value["compare_id"];?>">X</a>
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
 <?php
 unset($_SESSION["upQuanSuc"]);
 unset($_SESSION["delProCart"]);
 ?>
<?php }else{header("location:error/.htaccess");}?>
 <?php include("inc/footer.php");?>
