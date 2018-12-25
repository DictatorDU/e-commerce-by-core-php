<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if(isset($_GET["customer_id"]) && $_GET["customer_id"] != NULL){
  $customer_id_pro = $_GET["customer_id"];
  $customer_name = $_GET["customer_name"];
?>
<div class="grid_10">
<div class="box round first grid">
<h2>Orders of <?php if(isset($customer_name)){echo $customer_name;}?></h2>
<div class="block">
<table class="data display datatable" id="example">
	<thead>
		<tr>
      <th>No.</th>
      <th>Product Name</th>
      <th>Price (per)+vat</th>
      <th>Image</th>
      <th>Quantity</th>
      <th>Total price</th>
      <th>Date</th>
      <th>Status</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
      <?php
      include("classes\order.php");
      $orderObj->customer_id_pro($customer_id_pro);
      $i=0;
      foreach ($orderObj->customerOrdersame() as $value) {
        $i++;
      ?>
      <tr class="odd gradeX">
        <td><?php echo $i;?></td>
        <td><?php echo $value["product_name"]?></td>
        <td>$ <?php
         echo $value["price"]/$value["quantity"];
        ?></td>
        <td><img width="50px" src="<?php echo $value['img']?>" alt=""></td>
        <td><?php echo $value['quantity']?></td>
        <td>$ <?php echo $value['price']?></td>
        <td><?php echo $formatObj->formatDate($value['time_date']);?></td>
        <style media="screen">
          td .unshipt{color:red;}
          td .shipt{color:green;}
        </style>
        <td><?php
        if($value['status'] == 0){
          echo "<span class='unshipt'>Pending</span>";
        }else{
          echo "<span class='shipt'>Shipted</span>";
        }
        ?></td>
      <td><a href="order-view.php?order-view=<?php echo $value['customer_id'];?>&productname=<?php echo $value['product_name'];?>&product_id=<?php echo $value['id'];?>">View</a> || <a href="">Delete</a></td>
		</tr>
  <?php } ?>
	</tbody>
</table>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php }else{echo "<script>window.location='404.php';</script>";}?>
<?php include 'inc/footer.php';?>
