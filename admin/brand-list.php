<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Brand List</h2>
      <div class="block">
        <?php
        if(isset($_SESSION["edit_brand_suc"])){
          echo "<h4 style='color:green'>You have successfully changeed.</h4>";
        }
        if(isset($_SESSION["del_brand_suc"])){
          echo "<h4 style='color:green'>You have successfully deleted.</h4>";
        }
        ?>
       <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="text-align:center;">Serial No.</th>
							<th style="text-align:center;">Brand Name</th>
							<th style="text-align:center;">Action</th>
						</tr>
					</thead>
					<tbody>
            <?php
            class brandRead{
              private $tbl_name = "tbl_brand";
              public function query(){
                $sql = "SELECT * FROM $this->tbl_name ORDER BY brand_name ASC";
                $stmt = db::shopPrepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
              }
            }
            $brandReadObj = new brandRead();
            $brandReadObj->query();
            $i=0;
            foreach ($brandReadObj->query() as $value) {
              $i++;
            ?>
						<tr class="odd gradeX">
							<td style="text-align:center;"><?php echo $i;?></td>
							<td style="text-align:center;"><?php echo $value["brand_name"]?></td>
							<td style="text-align:center;">
                <a href="brand-edit.php?brand_id=<?php echo $value["id"];?>">Edit</a> ||
                <a onclick='return confirm("Are you sure to delete ?")' href="brand-delete.php?delete_brand=<?php echo $value["id"];?>">Delete</a>
              </td>
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
<?php
unset($_SESSION["edit_brand_suc"]);
unset($_SESSION["del_brand_suc"]);
?>
<?php include 'inc/footer.php';?>
