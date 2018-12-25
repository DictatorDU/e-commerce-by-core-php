<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
  <div class="box round first grid">
    <h2>Category List</h2>
      <div class="block">
        <?php
        if(isset($_SESSION["edit_cat_suc"])){
          echo "<h4 style='color:green'>You have successfully changeed.</h4>";
        }
        if(isset($_SESSION["del_cat_suc"])){
          echo "<h4 style='color:green'>You have successfully deleted.</h4>";
        }
        ?>
       <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th style="text-align:center;">Serial No.</th>
							<th style="text-align:center;">Category Name</th>
							<th style="text-align:center;">Action</th>
						</tr>
					</thead>
					<tbody>
            <?php
            class catRead{
              private $tbl_name = "tbl_cat";
              public function query(){
                $sql = "SELECT * FROM $this->tbl_name ORDER BY cat_name ASC";
                $stmt = db::shopPrepare($sql);
                $stmt->execute();
                return $stmt->fetchAll();
              }
            }
            $catReadObj = new catRead();
            $catReadObj->query();
            $i=0;
            foreach ($catReadObj->query() as $value) {
              $i++;
            ?>
						<tr class="odd gradeX">
							<td style="text-align:center;"><?php echo $i;?></td>
							<td style="text-align:center;"><?php echo $value["cat_name"]?></td>
							<td style="text-align:center;">
                <a href="catagory-edit.php?cat_id=<?php echo $value["id"];?>">Edit</a> ||
                <a onclick='return confirm("Are you sure to delete ?")' href="catagory-delete.php?delete_catagory=<?php echo $value["id"];?>">Delete</a>
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
unset($_SESSION["edit_cat_suc"]);
unset($_SESSION["del_cat_suc"]);
?>
<?php include 'inc/footer.php';?>
