<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
<div class="box round first grid">
<h2>Shipted Product</h2>
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
		<th>Customer Name</th>
    <th>Date</th>
    <th>Action</th>
	</tr>
</thead>
<tbody>
	<?php
	include("classes/shipted.php");
	$i = 0;
	foreach ($shiptObj->shiptedList() as $value) {
		$i++;
	?>
	<tr class="odd gradeX">
		<td><?php echo $i;?></td>
		<td><?php echo $value["product_name"];?></td>
		<td><?php
		$total = $value["total_price"];
		$qn = $value["quantity"];
		$per = $total/$qn;
		echo $per;
		?></td>
		<td><img height="50px" src="<?php echo $value['img'];?>" alt=""></td>
		<td><?php echo $value["quantity"];?></td>
		<td><?php echo $value["total_price"];?></td>
		<td><?php echo $value["name"];?></td>
		<td><?php echo $formatObj->formatDatetwo($value["time_date"]);?></td>
		<td><a href="shipted-view.php?shipt_view=<?php echo $value["shipt_id"]?>">View</a></td>
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
