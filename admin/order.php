 ﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style media="screen">
.container_12, .container_16 {
  background: #2E5E79;
  /* padding-top: 0px; */
  margin-top: -20px;
}
#branding {
    font-weight: normal;
    margin-bottom: 6px;
    padding: 22px 10px 3px;
    text-align: left;
}
</style>
<div class="grid_10">
<div class="box round first grid">
    <h2>Order list</h2>
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
            if(isset($_GET["shipt"]) && $_GET["shipt"] != NULL){
              $order_id = $_GET["shipt"];
              $orderObj->order_id($order_id);
              if($orderObj->shipSelect()){
              foreach ($orderObj->shipSelect() as $value) {
                $order_id = $value["id"];
                $product_id = $value["product_id"];
                $product_name = $value["product_name"];
                $quantity = $value["quantity"];
                $price = $value["price"];
                $customer_id = $value["customer_id"];
                $time_date = $value["time_date"];
                $img = $value["img"];
              }
                include("classes/shipted.php");
                $shiptObj->order_id($order_id);
                $shiptObj->product_id($product_id);
                $shiptObj->product_name($product_name);
                $shiptObj->quantity($quantity);
                $shiptObj->price($price);
                $shiptObj->customer_id($customer_id);
                $shiptObj->time_date($time_date);
                $shiptObj->img($img);
                if($shiptObj->insertShipt()){
                   $orderObj->statusUpdate();
                   if($orderObj->statusUpdate()){
                     echo "<script>window.location='order.php';</script>";
                   }
                }else{
                  echo "Not inserted";
                }
              }
            }
            $i=0;
            foreach ($orderObj->selectquery() as $value) {
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
              }elseif($value['status'] == 1){
                echo "<span class='shipt'>Shipted</span>";
              }
              ?></td>
							<td>
                <a href="order-view.php?order-view=<?php echo $value['customer_id'];?>&productname=<?php echo $value['product_name'];?>&product_id=<?php echo $value['id'];?>">View</a> ||
                <a href="?shipt=<?php echo $value['id'];?>">Shipt</a></td>
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
<?php include 'inc/footer.php';?>
